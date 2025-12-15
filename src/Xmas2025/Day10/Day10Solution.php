<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2025\Day10;

use Jean85\AdventOfCode\Input;
use Jean85\AdventOfCode\SecondPartSolutionInterface;
use Jean85\AdventOfCode\SolutionInterface;

class Day10Solution implements SolutionInterface, SecondPartSolutionInterface
{
    public function solve(?string $input = null): string
    {
        $input ??= Input::read(__DIR__);

        $machines = Machine::parseAll($input);

        $minimumButtonPresses = 0;
        foreach ($machines as $machine) {
            $minimumButtonPresses += count($machine->calcMinButtonPressesForLights());
        }

        return (string) $minimumButtonPresses;
    }

    public function solveSecondPart(?string $input = null): string
    {
        $input ??= Input::read(__DIR__);

        $machines = Machine::parseAll($input);

        $minimumButtonPresses = 0;
        foreach ($machines as $machine) {
            $minimumButtonPresses += $machine->countMinButtonPressesForJoltage();
        }

        return (string) $minimumButtonPresses;
    }
}
