<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day21;

use Jean85\AdventOfCode\Input;
use Jean85\AdventOfCode\SecondPartSolutionInterface;
use Jean85\AdventOfCode\SolutionInterface;

class Day21Solution implements SolutionInterface, SecondPartSolutionInterface
{
    public function solve(?string $input = null): string
    {
        $input ??= Input::read(__DIR__);
        $robotKeypad = new RobotKeypad(
            new RobotKeypad(
                new DoorKeypad()
            )
        );

        $total = 0;
        foreach (explode(PHP_EOL, $input) as $code) {
            $total += $this->calculateComplexity($code, $robotKeypad->calculateInstructions($code));
        }

        return (string) $total;
    }

    public function solveSecondPart(?string $input = null): string
    {
        $raceTrack = $this->createRaceTrack($input);

        return (string) $raceTrack->countPossibleAdvancedCheatsSavingAtLeast(100);
    }

    private function calculateComplexity(string $code, string $instructions): int
    {
        return strlen($instructions) * (int) substr($code, 0, -1);
    }
}
