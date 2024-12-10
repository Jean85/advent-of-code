<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day10;

use Jean85\AdventOfCode\Coordinates;
use Jean85\AdventOfCode\Direction;
use Jean85\AdventOfCode\Input;
use Jean85\AdventOfCode\Map;
use Jean85\AdventOfCode\SecondPartSolutionInterface;
use Jean85\AdventOfCode\SolutionInterface;
use Webmozart\Assert\Assert;

class Day10Solution implements SolutionInterface, SecondPartSolutionInterface
{
    public function solve(?string $input = null): string
    {
        $map = $this->createMap($input);

        return (string) $this->countTrailheads($map);
    }

    public function solveSecondPart(?string $input = null): string
    {
        $map = $this->createMap($input);

        return (string) $this->rateTrailheads($map);
    }

    private function countTrailheads(Map $map): int
    {
        $maxCoordinates = $map->getMaxCoordinates();
        $total = 0;

        foreach (range(0, $maxCoordinates->y) as $y) {
            foreach (range(0, $maxCoordinates->x) as $x) {
                $coordinates = new Coordinates($x, $y);
                if ($map->get($coordinates) !== 0) {
                    continue;
                }

                $reachables = [];
                foreach ($this->getReachablesFrom($map, $coordinates) as $tops) {
                    $reachables[$tops->__toString()] = $tops;
                }

                $total += count($reachables);
            }
        }

        return $total;
    }

    private function rateTrailheads(Map $map): int
    {
        $maxCoordinates = $map->getMaxCoordinates();
        $total = 0;

        foreach (range(0, $maxCoordinates->y) as $y) {
            foreach (range(0, $maxCoordinates->x) as $x) {
                $coordinates = new Coordinates($x, $y);
                if ($map->get($coordinates) !== 0) {
                    continue;
                }

                $total += count($this->getReachablesFrom($map, $coordinates));
            }
        }

        return $total;
    }

    /**
     * @return Coordinates[]
     */
    private function getReachablesFrom(Map $map, Coordinates $coordinates): array
    {
        $reachables = [];
        $currentHeight = $map->get($coordinates);

        if ($currentHeight === 9) {
            return [$coordinates];
        }

        $directions = [
            Direction::Right,
            Direction::Left,
            Direction::Up,
            Direction::Down,
        ];

        foreach ($directions as $direction) {
            $nextStep = $coordinates->moveToward($direction);
            if (1 !== ($map->get($nextStep) - $currentHeight)) {
                continue;
            }

            $reachables = [...$reachables, ...$this->getReachablesFrom($map, $nextStep)];
        }

        return $reachables;
    }

    /**
     * @return Map<int>
     */
    private function createMap(?string $input): Map
    {
        $input ??= Input::read(__DIR__);
        $map = new Map();
        $map->setDefaultElement(999);
        foreach (explode("\n", $input) as $y => $line) {
            foreach (str_split($line) as $x => $char) {
                Assert::integerish($char);
                $map->add(new Coordinates($x, $y), (int) $char);
            }
        }

        return $map;
    }
}
