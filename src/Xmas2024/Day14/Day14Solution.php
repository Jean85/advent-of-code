<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day14;

use Jean85\AdventOfCode\Input;
use Jean85\AdventOfCode\SecondPartSolutionInterface;
use Jean85\AdventOfCode\SolutionInterface;

class Day14Solution implements SolutionInterface, SecondPartSolutionInterface
{
    public function solve(?string $input = null): string
    {
        $robotMap = new RobotMap(101, 103, $input ??= Input::read(__DIR__));

        $robotMap->moveRobots(100);

        return (string) $robotMap->calculateSafetyFactor();
    }

    public function solveSecondPart(?string $input = null): string
    {
        $robotMap = new RobotMap(101, 103, $input ??= Input::read(__DIR__));

        $robotMap->moveRobots(100);

        return (string) $robotMap->calculateSafetyFactor();
    }
}
