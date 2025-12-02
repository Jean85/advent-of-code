<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2025\Day2;

use Jean85\AdventOfCode\Input;
use Jean85\AdventOfCode\SolutionInterface;

class Day2Solution implements SolutionInterface
{
    public function solve(?string $input = null): string
    {
        $input ??= Input::read(__DIR__);
        $ranges = Range::parse($input);

        $result = 0;

        foreach ($ranges as $range) {
            foreach ($range->getWrongIds() as $wrongId) {
                $result += $wrongId;
            }
        }

        return (string) $result;
    }
}
