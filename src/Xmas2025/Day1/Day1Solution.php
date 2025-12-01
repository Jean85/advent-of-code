<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2025\Day1;

use Jean85\AdventOfCode\Input;
use Jean85\AdventOfCode\SolutionInterface;

class Day1Solution implements SolutionInterface
{
    public function solve(?string $input = null): string
    {
        $input ??= Input::read(__DIR__);
        $start = 50;
        $password = 0;

        foreach (explode("\n", $input) as $line) {
            $steps = (int) substr($line, 1);
            $start += match ($line[0]) {
                'L' => -1 * $steps,
                'R' => $steps,
                default => throw new \InvalidArgumentException('Invalid direction: ' . $line),
            };

            $start %= 100;

            if ($start === 0) {
                ++$password;
            }
        }

        return (string) $password;
    }
}
