<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day1;

use Jean85\AdventOfCode\Input;
use Jean85\AdventOfCode\SecondPartSolutionInterface;
use Jean85\AdventOfCode\SolutionInterface;

class Day1Solution implements SolutionInterface, SecondPartSolutionInterface
{
    public function solve(?string $input = null): string
    {
        $input ??= Input::read(__DIR__);
        
        $firstColumn = [];
        $secondColumn = [];
        
        foreach (explode(PHP_EOL, $input) as $line) {
            \Safe\preg_match('/(\d+)\s+(\d+)/', $line, $matches);
            $firstColumn[] = (int) $matches[1];
            $secondColumn[] = (int) $matches[2];
        }
        
        sort($firstColumn);
        sort($secondColumn);

        $result = 0;
        foreach ($firstColumn as $i => $id1) {
            $result += abs($id1 - $secondColumn[$i]);
        }
        
        return (string) $result;
    }

    public function solveSecondPart(?string $input = null): string
    {
        $input ??= Input::read(__DIR__);

        return (string) '';
    }
}
