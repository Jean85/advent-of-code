<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2025\Day7;

use Jean85\AdventOfCode\Input;
use Jean85\AdventOfCode\SecondPartSolutionInterface;
use Jean85\AdventOfCode\SolutionInterface;

class Day7Solution implements SolutionInterface, SecondPartSolutionInterface
{
    public function solve(?string $input = null): string
    {
        $input ??= Input::read(__DIR__);

        $map = TachyonMap::parse($input);

        return (string) $map->countSplits();
    }

    public function solveSecondPart(?string $input = null): string
    {
        $input ??= Input::read(__DIR__);

        $map = TachyonMap::parse($input);

        return (string) $map->countSplitsWithQuantum();
    }
}
