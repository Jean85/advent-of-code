<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day16;

use Jean85\AdventOfCode\Input;
use Jean85\AdventOfCode\SecondPartSolutionInterface;
use Jean85\AdventOfCode\SolutionInterface;

class Day16Solution implements SolutionInterface, SecondPartSolutionInterface
{
    public function solve(?string $input = null): string
    {
        $input ??= Input::read(__DIR__);
        $map = new ReindeerMaze($input);

        return (string) $map->calculateShortestPath();
    }

    public function solveSecondPart(?string $input = null): string
    {
        $input ??= Input::read(__DIR__);
        $map = new ReindeerMaze($input);

        return (string) $map->calculateShortestPath2();
    }
}
