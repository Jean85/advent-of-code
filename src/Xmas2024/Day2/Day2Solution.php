<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day2;

use Jean85\AdventOfCode\Input;
use Jean85\AdventOfCode\SecondPartSolutionInterface;
use Jean85\AdventOfCode\SolutionInterface;

class Day2Solution implements SolutionInterface, SecondPartSolutionInterface
{
    public function solve(?string $input = null): string
    {
        $input ??= Input::read(__DIR__);

        $solution = 0;

        foreach (explode("\n", $input) as $line) {
            if ((new Report($line))->isSafe()) {
                ++$solution;
            }
        }

        return (string) $solution;
    }

    public function solveSecondPart(?string $input = null): string
    {
        $input ??= Input::read(__DIR__);

        $reports = array_map(static fn(string $report) => new Report($report), explode("\n", $input));

        return (string) count(array_filter($reports, fn(Report $report) => $report->isSafeWithDampener()));
    }
}
