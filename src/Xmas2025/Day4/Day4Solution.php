<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2025\Day4;

use Jean85\AdventOfCode\Input;
use Jean85\AdventOfCode\SolutionInterface;

class Day4Solution implements SolutionInterface
{
    public function solve(?string $input = null): string
    {
        $input ??= Input::read(__DIR__);

        return (string) PaperRollsMap::read($input)->countReachableRolls();
    }
}
