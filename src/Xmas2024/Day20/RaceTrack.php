<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day20;

use Jean85\AdventOfCode\Coordinates;
use Jean85\AdventOfCode\Direction;
use Jean85\AdventOfCode\Map;

/**
 * @template-extends Map<Terrain>
 */
class RaceTrack extends Map
{
    private readonly Coordinates $start;
    private readonly Coordinates $end;

    private readonly int $shortestFairPath;
    private Map $warmedUpCostMap;

    public function __construct(string $input)
    {
        parent::__construct();
        $this->setDefaultElement(Terrain::Wall);

        foreach (explode("\n", $input) as $y => $line) {
            foreach (str_split($line) as $x => $char) {
                $coordinates = new Coordinates($x, $y);
                $tile = Terrain::from($char);
                $this->add($coordinates, $tile);
                if ($tile === Terrain::Start) {
                    $this->start = $coordinates;
                }
                if ($tile === Terrain::End) {
                    $this->end = $coordinates;
                }
            }
        }
    }

    public function countPossibleCheatsSavingAtLeast(int $picosecondsToSave): int
    {
        // let's warmup the fair track
        $this->calculateShortestFairPath();

        $neighbours = [];
        $neighbours[0] = [$this->start];

        return $this->cheatingDijkstra($this->warmedUpCostMap, $neighbours, $picosecondsToSave, function (Coordinates $current): \Generator {
            foreach (Direction::noDiagonals() as $direction) {
                yield $current->moveToward($direction)->moveToward($direction);
            }
        });
    }

    public function countPossibleAdvancedCheatsSavingAtLeast(int $picosecondsToSave): int
    {
        // let's warmup the fair track
        $this->calculateShortestFairPath();

        $neighbours = [];
        $neighbours[0] = [$this->start];

        return $this->cheatingDijkstra($this->warmedUpCostMap, $neighbours, $picosecondsToSave, function (Coordinates $current): \Generator {
            foreach (range(-20, +20) as $x) {
                foreach (range(-20, +20) as $y) {
                    $newCheatingPosition = new Coordinates($x, $y);
                    $manhattanDistance = $newCheatingPosition->getManhattanDistanceFrom($current);
                    if (20 < $manhattanDistance || $manhattanDistance === 0) {
                        continue;
                    }

                    yield $newCheatingPosition;
                }
            }
        });
    }

    private function cheatingDijkstra(Map $costMap, array $neighbours, int $picosecondsToSave, callable $generateCheatingPosition): int
    {
        $validCheats = 0;

        do {
            $current = $this->findBestNeighbour($neighbours);
            $currentCost = $costMap->get($current);
            $newCost = 1 + $currentCost;
            if (($newCost + $picosecondsToSave) > $this->shortestFairPath) {
                break;
            }

            foreach (Direction::noDiagonals() as $direction) {
                $newCoord = $current->moveToward($direction);

                if ($newCoord == $this->end) {
                    // at the end without cheating
                    continue;
                }

                if ($this->get($newCoord) === Terrain::Wall) {
                    continue;
                }

                if ($costMap->get($newCoord) < $newCost) {
                    continue;
                }

                $neighbours[$newCost][] = $newCoord;
                $costMap->add($newCoord, $newCost);
            }

            foreach ($generateCheatingPosition($current) as $newCheatingCoord) {
                $cheatingCost = $currentCost + $current->getManhattanDistanceFrom($newCheatingCoord);
                if ($newCheatingCoord == $this->end) {
                    ++$validCheats;
                    continue;
                }

                if ($this->get($newCheatingCoord) === Terrain::Wall) {
                    continue;
                }

                $precalculatedCost = $costMap->get($newCheatingCoord);
                if ($precalculatedCost <= $cheatingCost) {
                    continue;
                }

                if ($precalculatedCost >= ($cheatingCost + $picosecondsToSave)) {
                    ++$validCheats;
                    continue;
                }

                try {
                    $clonedCostMap = clone $costMap;
                    $clonedCostMap->add($newCheatingCoord, $newCost);
                    if ($this->shortestFairPath > ($picosecondsToSave + $cheatingCost + $this->dijkstra($clonedCostMap, [$newCost => [$newCheatingCoord]], $picosecondsToSave))) {
                        ++$validCheats;
                    }
                } catch (\RuntimeException) {
                }
            }
        } while (! empty($neighbours));

        return $validCheats;
    }

    public function calculateShortestFairPath(): int
    {
        if (isset($this->shortestFairPath)) {
            return $this->shortestFairPath;
        }

        /** @var Map<int> $costMap */
        $costMap = new Map();
        $costMap->setDefaultElement(PHP_INT_MAX);
        $costMap->add($this->start, 0);

        $neighbours = [];
        $neighbours[0] = [$this->start];

        $this->warmedUpCostMap = $costMap;

        return $this->shortestFairPath = $this->dijkstra($costMap, $neighbours);
    }

    private function dijkstra(Map $costMap, array $neighbours, int $maxCost = PHP_INT_MAX): int
    {
        do {
            $current = $this->findBestNeighbour($neighbours);
            $newCost = 1 + $costMap->get($current);

            if ($newCost > $maxCost) {
                continue;
            }

            foreach (Direction::noDiagonals() as $direction) {
                $newCoord = $current->moveToward($direction);

                if ($newCoord == $this->end) {
                    return $newCost;
                }

                if ($this->get($newCoord) === Terrain::Wall) {
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
