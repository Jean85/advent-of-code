<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2025\Day3;

use Jean85\AdventOfCode\Input;
use Jean85\AdventOfCode\SecondPartSolutionInterface;
use Jean85\AdventOfCode\SolutionInterface;

class Day3Solution implements SolutionInterface, SecondPartSolutionInterface
{
    public function solve(?string $input = null): string
    {
        $input ??= Input::read(__DIR__);

        $banks = BatteryBank::create($input);
        $result = 0;
        foreach ($banks as $bank) {
            $result += $bank->findTwoBatteriesWithBestJoltage();
        }

        return (string) $result;
    }

    public function solveSecondPart(?string $input = null): string
    {
        $input ??= Input::read(__DIR__);

        return (string) $result;
    }
}
