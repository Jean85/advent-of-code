<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day7;

use Jean85\AdventOfCode\Input;
use Jean85\AdventOfCode\SecondPartSolutionInterface;
use Jean85\AdventOfCode\SolutionInterface;

class Day7Solution implements SolutionInterface, SecondPartSolutionInterface
{
    public function solve(?string $input = null): string
    {
        $equations = $this->parseInput($input);

        $solution = 0;
        foreach ($equations as $equation) {
            if ($equation->isCombinable()) {
                $solution += $equation->testValue;
            }
        }

        return (string) $solution;
    }

    public function solveSecondPart(?string $input = null): string
    {
        $equations = $this->parseInput($input);

        $solution = 0;

        return (string) $solution;
    }

    /**
     * @return Equation[]
     */
    private function parseInput(?string $input): array
    {
        $input ??= Input::read(__DIR__);

        $equations = [];
        foreach (explode("\n", $input) as $line) {
            $equations[] = new Equation($line);
        }

        return $equations;
    }
}
