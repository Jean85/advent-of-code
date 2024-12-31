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
        $raceTrack = $this->createRaceTrack($input);

        return (string) $raceTrack->countPossibleCheatsSavingAtLeast(100);
    }

    public function solveSecondPart(?string $input = null): string
    {
        $raceTrack = $this->createRaceTrack($input);

        return (string) $raceTrack->countPossibleAdvancedCheatsSavingAtLeast(100);
    }

    private function createRaceTrack(?string $input): RaceTrack
    {
        $input ??= Input::read(__DIR__);

        return new RaceTrack($input);
    }
}
