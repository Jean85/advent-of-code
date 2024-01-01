<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2023\Day10;

use Jean85\AdventOfCode\SecondPartSolutionInterface;
use Jean85\AdventOfCode\SolutionInterface;
use Jean85\AdventOfCode\Xmas2023\Input;

class Day10Solution implements SolutionInterface, SecondPartSolutionInterface
{
    public function solve(string $input = null): string
    {
        $input ??= Input::read(__DIR__);
        $map = PipeMap::create($input);

        return (string) $map->getMaxDistance();
    }

    public function solveSecondPart(string $input = null): string
    {
        $input ??= Input::read(__DIR__);

        return (string) $this->getSolution($input);
    }
}
