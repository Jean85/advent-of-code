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
        foreach ($instructions as $direction) {
            if ($this->canMove($this->robot, $direction)) {
                $this->pushBoxes($this->robot, $direction);
                $this->robot = $this->robot->moveToward($direction);
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
            Terrain::Robot => throw new \InvalidArgumentException(),
        };
    }

    private function pushBoxes(Coordinates $coordinates, Direction $direction): void
    {
        $nextCoordinates = $coordinates->moveToward($direction);
        $nextTile = $this->get($nextCoordinates);

        if ($nextTile === Terrain::Plain) {
            return;
        }

        if ($nextTile === Terrain::Wall) {
            throw new \RuntimeException('WTF? A wall? Did you call canMove first?');
        }

        if ($nextTile === Terrain::Box) {
            $this->pushBoxes($nextCoordinates, $direction);
        }

        $this->add($nextCoordinates->moveToward($direction), Terrain::Box);
        $this->add($nextCoordinates, Terrain::Plain);
    }

    public function countBoxCoordinates(): int
    {
        $total = 0;

        foreach ($this->getAll() as [$coord, $tile]) {
            if ($tile === Terrain::Box) {
                $total += $coord->x + (100 * $coord->y);
            }
        }

        return $total;
    }
}
