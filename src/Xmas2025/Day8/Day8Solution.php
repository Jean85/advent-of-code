<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2025\Day8;

use Jean85\AdventOfCode\Input;
use Jean85\AdventOfCode\SecondPartSolutionInterface;
use Jean85\AdventOfCode\SolutionInterface;

class Day8Solution implements SolutionInterface, SecondPartSolutionInterface
{
    public function solve(?string $input = null): string
    {
        $input ??= Input::read(__DIR__);

        $map = CircuitMap::parse($input);

        $i = 1_000;
        do {
            $map->connectTwoNearestBoxes();
        } while (--$i);

        return (string) $map->multiplyTopThreeCircuits();
    }

    public function solveSecondPart(?string $input = null): string
    {
        $input ??= Input::read(__DIR__);

        $map = CircuitMap::parse($input);

        return (string) $map->countSplitsWithQuantum();
    }
}
