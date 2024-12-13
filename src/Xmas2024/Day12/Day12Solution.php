<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day12;

use Jean85\AdventOfCode\Input;
use Jean85\AdventOfCode\SecondPartSolutionInterface;
use Jean85\AdventOfCode\SolutionInterface;

class Day12Solution implements SolutionInterface, SecondPartSolutionInterface
{
    public function solve(?string $input = null): string
    {
        $input ??= Input::read(__DIR__);
        $garden = Garden::createFrom($input);

        return (string) $garden->calculateFenceCost();
    }

    public function solveSecondPart(?string $input = null): string
    {
        $input ??= Input::read(__DIR__);
        $garden = Garden::createFrom($input);

        return (string) $garden->calculateFenceDiscountedCost();
    }
}
