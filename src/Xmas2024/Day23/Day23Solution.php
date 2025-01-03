<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day23;

use Jean85\AdventOfCode\Input;
use Jean85\AdventOfCode\SecondPartSolutionInterface;
use Jean85\AdventOfCode\SolutionInterface;

class Day23Solution implements SolutionInterface, SecondPartSolutionInterface
{
    public function solve(?string $input = null): string
    {
        $input ??= Input::read(__DIR__);
        $lanParty = new LanParty($input);

        return (string) count($lanParty->findSetsWithComputerStartingWith('t'));
    }

    public function solveSecondPart(?string $input = null): string
    {
        $input ??= Input::read(__DIR__);
        $lanParty = new LanParty($input);

        return (string) count($lanParty->findSetsWithComputerStartingWith('t'));
    }
}
