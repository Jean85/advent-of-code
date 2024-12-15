<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day14;

use Jean85\AdventOfCode\Input;
use Jean85\AdventOfCode\SecondPartSolutionInterface;
use Jean85\AdventOfCode\SolutionInterface;

class Day14Solution implements SolutionInterface, SecondPartSolutionInterface
{
    public function solve(?string $input = null): string
    {
        $robotMap = new RobotMap(101, 103, $input ?? Input::read(__DIR__));

        $robotMap->moveRobots(100);

        return (string) $robotMap->calculateSafetyFactor();
    }

    public function solveSecondPart(?string $input = null): string
    {
        $robotMap = new RobotMap(101, 103, $input ?? Input::read(__DIR__));

        $seconds = 0;
        do {
            $robotMap->moveRobots(1);
            if ($robotMap->printToFile(++$seconds)) {
                echo 'Possible tree at ' , $seconds . PHP_EOL;
                echo PHP_EOL;

                return 'FOUND';
            }

            if ($seconds % 1_000 === 0) {
                echo 'Seconds: ' . $seconds . PHP_EOL;
            }
        } while (true);
    }
}
