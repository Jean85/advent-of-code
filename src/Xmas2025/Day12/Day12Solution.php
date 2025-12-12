<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2025\Day12;

use Jean85\AdventOfCode\Input;
use Jean85\AdventOfCode\SecondPartSolutionInterface;
use Jean85\AdventOfCode\SolutionInterface;

class Day12Solution implements SolutionInterface, SecondPartSolutionInterface
{
    public function solve(?string $input = null): string
    {
        $input ??= Input::read(__DIR__);
        $splitInputs = explode(PHP_EOL . PHP_EOL, $input);
        $xmasTrees = XmasTree::parseAll(array_pop($splitInputs));

        $validSpaces = 0;
        foreach ($xmasTrees as $xmasTree) {
            if ($xmasTree->canFitGifts()) {
                ++$validSpaces;
            }
        }

        return (string) $validSpaces;
    }

    public function solveSecondPart(?string $input = null): string
    {
        $input ??= Input::read(__DIR__);
    }
}
