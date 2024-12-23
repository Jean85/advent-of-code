<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day18;

use Jean85\AdventOfCode\Coordinates;
use Jean85\AdventOfCode\Input;
use Jean85\AdventOfCode\SecondPartSolutionInterface;
use Jean85\AdventOfCode\SolutionInterface;

class Day18Solution implements SolutionInterface, SecondPartSolutionInterface
{
    public function solve(?string $input = null): string
    {
        $map = $this->createMap($input);

        return (string) $map->calculateShortestPath();
    }

    public function solveSecondPart(?string $input = null): string
    {
        $map = $this->createMap($input);

        $additionalFallingBytes = $this->getOthersFallingBytes();
        $start = 1_024;
        $end = array_key_last($additionalFallingBytes);

        do {
            $middle = $start + (int) floor(($end - $start) / 2);

            $cleanMap = clone $map;
            foreach (array_slice($additionalFallingBytes, 0, $middle) as $byte) {
                $cleanMap->add($byte, Memory::Obstacle);
            }

            try {
                $cleanMap->calculateShortestPath();
                $start = $middle;
            } catch (\RuntimeException) {
                $end = $middle;
                continue;
            }
        } while ($end - $start > 1);

        return (string) $additionalFallingBytes[$start];
    }

    private function createMap(?string $input): MemoryMap
    {
        $input ??= Input::read(__DIR__);
        $memoryMap = new MemoryMap(70);

        $fallingBytes = [];
        foreach (explode("\n", $input) as $line) {
            [$x, $y] = explode(',', $line);
            $fallingBytes[] = new Coordinates((int) $x, (int) $y);
        }

        $fallingBytes = array_slice($fallingBytes, 0, 1_024);
        foreach ($fallingBytes as $byte) {
            $memoryMap->add($byte, Memory::Obstacle);
        }

        return $memoryMap;
    }

    /**
     * @return list<Coordinates>
     */
    private function getOthersFallingBytes(): array
    {
        $input = Input::read(__DIR__);

        $fallingBytes = [];
        foreach (explode("\n", $input) as $line) {
            [$x, $y] = explode(',', $line);
            $fallingBytes[] = new Coordinates((int) $x, (int) $y);
        }

        return array_values(array_slice($fallingBytes, 1_024));
    }
}
