<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2025\Day11;

use Jean85\AdventOfCode\Input;
use Jean85\AdventOfCode\SecondPartSolutionInterface;
use Jean85\AdventOfCode\SolutionInterface;

class Day11Solution implements SolutionInterface, SecondPartSolutionInterface
{
    public function solve(?string $input = null): string
    {
        $input ??= Input::read(__DIR__);
        $deviceMap = DeviceMap::parse($input);

        $deviceMap->countPossiblePaths();

        return (string) $deviceMap->getPossiblePaths();
    }

    public function solveSecondPart(?string $input = null): string
    {
        $input ??= Input::read(__DIR__);
    }
}
