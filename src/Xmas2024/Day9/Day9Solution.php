<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day9;

use Jean85\AdventOfCode\Input;
use Jean85\AdventOfCode\SecondPartSolutionInterface;
use Jean85\AdventOfCode\SolutionInterface;

class Day9Solution implements SolutionInterface, SecondPartSolutionInterface
{
    public function solve(?string $input = null): string
    {
        $input ??= Input::read(__DIR__);
        $fileSystem = new FileSystem($input);

        $fileSystem->defrag();

        return (string) $fileSystem->calculateChecksum();
    }

    public function solveSecondPart(?string $input = null): string
    {
        $map = $this->parseInput($input);

        return (string) count($this->antinodes);
    }
}
