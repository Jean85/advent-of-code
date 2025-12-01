<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2025\Day1;

use Jean85\AdventOfCode\Input;
use Jean85\AdventOfCode\SecondPartSolutionInterface;
use Jean85\AdventOfCode\SolutionInterface;

class Day1Solution implements SolutionInterface, SecondPartSolutionInterface
{
    public function solve(?string $input = null): string
    {
        $input ??= Input::read(__DIR__);
        $start = 50;
        $password = 0;

        foreach (explode("\n", $input) as $line) {
            $start += $this->getSteps($line);

            $start %= 100;

            if ($start === 0) {
                ++$password;
            }
        }

        return (string) $password;
    }

    public function solveSecondPart(?string $input = null): string
    {
        $input ??= Input::read(__DIR__);
        $start = 50;
        $password = 0;

        foreach (explode("\n", $input) as $line) {
            echo 'Dial at ' . $start . ' - adding ' . $line . ' password ' . $password . PHP_EOL;
            $steps = $this->getSteps($line);

            do {
                if ($steps > 0) {
                    --$steps;
                    ++$start;
                } else {
                    ++$steps;
                    --$start;
                }

                $start %= 100;

                if ($start === 0) {
                    ++$password;
                }
            } while ($steps !== 0);
        }

        return (string) $password;
    }

    private function getSteps(string $line): int
    {
        $steps = (int) substr($line, 1);

        return match ($line[0]) {
            'L' => -1 * $steps,
            'R' => $steps,
            default => throw new \InvalidArgumentException('Invalid direction: ' . $line),
        };
    }
}
