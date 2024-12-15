<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day13;

use Jean85\AdventOfCode\Input;
use Jean85\AdventOfCode\SecondPartSolutionInterface;
use Jean85\AdventOfCode\SolutionInterface;

class Day13Solution implements SolutionInterface, SecondPartSolutionInterface
{
    public function solve(?string $input = null): string
    {
        $machines = $this->createMachines($input);

        $cost = 0;
        foreach ($machines as $machine) {
            $cost += $machine->calculateMinimumCost();
        }

        return (string) $cost;
    }

    public function solveSecondPart(?string $input = null): string
    {
        $machines = $this->createMachines($input, true);

        $cost = 0;
        foreach ($machines as $machine) {
            $cost += $machine->calculateMinimumCost();
        }

        return (string) $cost;
    }

    /**
     * @return list<ClawMachine>
     */
    private function createMachines(?string $input, bool $prizeIsFurtherThanExpected = false): array
    {
        $input ??= Input::read(__DIR__);
        $machines = [];

        foreach (explode("\n\n", $input) as $machineInput) {
            $machines[] = new ClawMachine($machineInput, $prizeIsFurtherThanExpected);
        }

        return $machines;
    }
}
