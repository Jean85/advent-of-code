<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day3;

use Jean85\AdventOfCode\Input;
use Jean85\AdventOfCode\SecondPartSolutionInterface;
use Jean85\AdventOfCode\SolutionInterface;

class Day3Solution implements SolutionInterface, SecondPartSolutionInterface
{
    public function solve(?string $input = null): string
    {
        $input ??= Input::read(__DIR__);

        return (string) $this->doMul($input);
    }

    public function solveSecondPart(?string $input = null): string
    {
        $input ??= Input::read(__DIR__);

        $splitInstructions = explode('do()', $input);

        $solution = 0;

        foreach ($splitInstructions as $instructions) {
            $solution += $this->doMul(
                explode('don\'t()', $instructions)[0]
            );
        }

        return (string) $solution;
    }

    private function doMul(string $input): int
    {
        preg_match_all('/mul\((\d{1,3}),(\d{1,3})\)/', $input, $matches);

        $solution = 0;

        foreach ($matches[1] as $i => $match) {
            $solution += ((int) $match) * ((int) $matches[2][$i]);
        }

        return $solution;
    }
}
