<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day15;

use Jean85\AdventOfCode\Coordinates;
use Jean85\AdventOfCode\Direction;
use Jean85\AdventOfCode\Map;
use Webmozart\Assert\Assert;

/**
 * @template-extends Map<Terrain>
 */
class WarehouseMap extends Map
{
    private Coordinates $robot;

    public function __construct(string $mapInput)
    {
        parent::__construct();
        $this->setDefaultElement(Terrain::Plain);

        foreach (explode("\n", $mapInput) as $y => $line) {
            foreach (str_split($line) as $x => $char) {
                $tile = Terrain::from($char);
                $coordinates = new Coordinates($x, $y);
                if ($tile === Terrain::Robot) {
                    $tile = Terrain::Plain;
                    $this->robot = $coordinates;
                }

                $this->add($coordinates, $tile);
            }
        }

        Assert::notNull($this->robot, 'Robot not found');
    }

    /**
     * @param list<Direction> $instructions
     */
    public function execute(array $instructions): void
    {
        foreach ($instructions as $i => $direction) {
            if ($this->canMove($this->robot, $direction)) {
                $this->robot = $this->robot->moveToward($direction);
                $this->pushBoxes($this->robot, $direction);
                Assert::same($this->get($this->robot)->name, Terrain::Plain->name);
            }
        }
    }

    private function canMove(Coordinates $robot, Direction $direction): bool
    {
        $nextCoordinates = $robot->moveToward($direction);

        return match ($this->get($nextCoordinates)) {
            Terrain::Wall => false,
            Terrain::Plain => true,
            Terrain::Box => $this->canMove($nextCoordinates, $direction),
            Terrain::LeftBox => match ($direction) {
                Direction::Up => $this->canMove($nextCoordinates, $direction)
                    && $this->canMove($nextCoordinates->moveToward($direction->turnClockWise()), $direction),
                Direction::Down => $this->canMove($nextCoordinates, $direction)
                    && $this->canMove($nextCoordinates->moveToward($direction->turnCounterClockWise()), $direction),
                Direction::Left,
                Direction::Right => $this->canMove($nextCoordinates, $direction),
                default => throw new \Exception('To be implemented'),
            },
            Terrain::RightBox => match ($direction) {
                Direction::Up => $this->canMove($nextCoordinates, $direction)
                    && $this->canMove($nextCoordinates->moveToward($direction->turnCounterClockWise()), $direction),
                Direction::Down => $this->canMove($nextCoordinates, $direction)
                    && $this->canMove($nextCoordinates->moveToward($direction->turnClockWise()), $direction),
                Direction::Left,
                Direction::Right => $this->canMove($nextCoordinates, $direction),
                default => throw new \Exception('To be implemented'),
            },
            Terrain::Robot => throw new \InvalidArgumentException(),
        };
    }

    private function pushBoxes(Coordinates $coordinates, Direction $direction): void
    {
        $tileToPush = $this->get($coordinates);
        $nextCoordinates = $coordinates->moveToward($direction);

        switch ($tileToPush) {
            case Terrain::Plain:
                return;
            case Terrain::Wall:
                throw new \RuntimeException('A wall is not pushable - did you call canMove first?');
            case Terrain::Robot:
                throw new \RuntimeException('WTF? A robot? Did we clone ourselves?');
            case Terrain::LeftBox:
                $rightBoxCoord = match ($direction) {
                    Direction::Up => $coordinates->moveToward($direction->turnClockWise()),
                    Direction::Down => $coordinates->moveToward($direction->turnCounterClockWise()),
                    default => null,
                };

                if ($rightBoxCoord) {
                    $nextRightBoxCoord = $rightBoxCoord->moveToward($direction);
                    $this->pushBoxes($nextRightBoxCoord, $direction);
                    $this->add($nextRightBoxCoord, Terrain::RightBox);
                    $this->add($rightBoxCoord, Terrain::Plain);
                }

                break;
            case Terrain::RightBox:
                $leftBoxCoord = match ($direction) {
                    Direction::Up => $coordinates->moveToward($direction->turnCounterClockWise()),
                    Direction::Down => $coordinates->moveToward($direction->turnClockWise()),
                    default => null,
                };

                if ($leftBoxCoord) {
                    $nextLeftBoxCoord = $leftBoxCoord->moveToward($direction);
                    $this->pushBoxes($nextLeftBoxCoord, $direction);
                    $this->add($nextLeftBoxCoord, Terrain::LeftBox);
                    $this->add($leftBoxCoord, Terrain::Plain);
                }

                break;
            case Terrain::Box:
                // noop
        }

        $this->pushBoxes($nextCoordinates, $direction);

        $this->add($nextCoordinates, $tileToPush);
        $this->add($coordinates, Terrain::Plain);
    }

    public function countBoxCoordinates(): int
    {
        $total = 0;

        foreach ($this->getAll() as [$coord, $tile]) {
            if (in_array($tile, [Terrain::Box, Terrain::LeftBox], true)) {
                $total += $coord->x + (100 * $coord->y);
            }
        }

        return $total;
    }

    public function print(): string
    {
        $output = '';
        foreach (range(0, $this->getMaxCoordinates()->y) as $y) {
            foreach (range(0, $this->getMaxCoordinates()->x) as $x) {
                $coordinates = new Coordinates($x, $y);
                if ($coordinates == $this->robot) {
                    $output .= Terrain::Robot->value;
                } else {
                    $output .= $this->get($coordinates)->value;
                }
            }
            $output .= PHP_EOL;
        }

        return trim($output);
    }
}
