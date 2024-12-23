<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day18;

use Jean85\AdventOfCode\Coordinates;
use Jean85\AdventOfCode\Direction;
use Jean85\AdventOfCode\Map;

/**
 * @template-extends Map<Memory>
 */
class MemoryMap extends Map
{
    private readonly Coordinates $end;
    public function __construct(int $size)
    {
        parent::__construct();

        $this->end = new Coordinates($size, $size);
        $this->setDefaultElement(Memory::Plain);

        foreach (range(0, $size) as $i) {
            $this->add(new Coordinates(-1, $i), Memory::Obstacle);
            $this->add(new Coordinates($size + 1, $i), Memory::Obstacle);
            $this->add(new Coordinates($i, -1), Memory::Obstacle);
            $this->add(new Coordinates($i, $size + 1), Memory::Obstacle);
        }
    }

    public function calculateShortestPath(): int
    {
        /** @var Map<int> $costMap */
        $costMap = new Map();
        $costMap->setDefaultElement(PHP_INT_MAX);
        $start = new Coordinates(0, 0);
        $costMap->add($start, 0);

        $neighbours = [];
        $neighbours[0] = [$start];

        do {
            $current = $this->findBestNeighbour($neighbours);
            $newCost = 1 + $costMap->get($current);
            foreach (Direction::noDiagonals() as $direction) {
                $newCoord = $current->moveToward($direction);

                if ($newCoord == $this->end) {
                    return $newCost;
                }

                if ($this->get($newCoord) === Memory::Obstacle) {
                    continue;
                }

                if ($costMap->get($newCoord) <= $newCost) {
                    continue;
                }

                $neighbours[$newCost][] = $newCoord;
                $costMap->add($newCoord, $newCost);
            }
        } while (! empty($neighbours));

        throw new \RuntimeException('Unable to calculate shortest path');
    }

    public function print(): string
    {
        $output = '';
        foreach (range(0, $this->getMaxCoordinates()->y) as $y) {
            foreach (range(0, $this->getMaxCoordinates()->x) as $x) {
                $coordinates = new Coordinates($x, $y);
                $output .= $this->get($coordinates)->value;
            }

            $output .= PHP_EOL;
        }

        return trim($output);
    }

    private function findBestNeighbour(array &$neighbours): Coordinates
    {
        $firstKey = array_key_first($neighbours);
        $lowestCost = array_shift($neighbours[$firstKey]);

        if (empty($neighbours[$firstKey])) {
            unset($neighbours[$firstKey]);
        }

        return $lowestCost;
    }
}
