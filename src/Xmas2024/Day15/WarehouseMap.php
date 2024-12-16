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
                $this->robot = $this->robot->moveToward($direction);
            }
        }
    }

    private function canMove(Coordinates $robot, Direction $direction): bool
    {
        $nextTile = $this->get($robot->moveToward($direction));

        return match ($nextTile) {
            Terrain::Wall => false,
            Terrain::Plain => true,
            Terrain::Box => $this->pushBoxes($robot, $direction),
            Terrain::Robot => throw new \InvalidArgumentException(),
        };
    }

    private function pushBoxes(Coordinates $robot, Direction $direction): bool
    {
        $coordinates = $robot->moveToward($direction);
        $firstBox = $this->get($coordinates);
        Assert::same($firstBox, Terrain::Box);

        do {
            $coordinates = $coordinates->moveToward($direction);
            $nextTile = $this->get($coordinates);
        } while ($nextTile === Terrain::Box);

        if ($nextTile === Terrain::Wall) {
            return false;
        }

        $this->add($coordinates, Terrain::Box);
        $this->add($robot->moveToward($direction), Terrain::Plain);

        return true;
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
