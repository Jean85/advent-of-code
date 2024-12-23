<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day19;

use Jean85\AdventOfCode\Input;
use Jean85\AdventOfCode\SecondPartSolutionInterface;
use Jean85\AdventOfCode\SolutionInterface;

class Day19Solution implements SolutionInterface, SecondPartSolutionInterface
{
    public function solve(?string $input = null): string
    {
        $input ??= Input::read(__DIR__);
        [$possibleTowels, $designs] = explode(PHP_EOL . PHP_EOL, $input);
        $possibleTowels = explode(', ', $possibleTowels);
        $requestedDesigns = explode(PHP_EOL, $designs);

        $possibleDesigns = 0;
        foreach ($requestedDesigns as $design) {
            if ($this->isPossible($design, $possibleTowels)) {
                ++$possibleDesigns;
            }
        }

        return (string) $possibleDesigns;
    }

    public function solveSecondPart(?string $input = null): string
    {
        $map = $this->createMap($input);

        return (string) $this->rateTrailheads($map);
    }

    /**
     * @param string[] $possibleTowels
     */
    private function isPossible(string $design, array $possibleTowels): bool
    {
        /** @var array<string, bool> $cache */
        static $cache;
        $cache ??= [];

        if ($design === '') {
            return true;
        }

        if (isset($cache[$design])) {
            return $cache[$design];
        }

        foreach ($possibleTowels as $possibleTowel) {
            if (
                str_starts_with($design, $possibleTowel)
                && $this->isPossible(substr($design, strlen($possibleTowel)), $possibleTowels)
            ) {
                return $cache[$design] = true;
            }
        }

        return $cache[$design] = false;
    }
}
