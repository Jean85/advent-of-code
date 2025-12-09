<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2025\Day9;

use Jean85\AdventOfCode\Coordinates;
use Jean85\AdventOfCode\Input;
use Jean85\AdventOfCode\SecondPartSolutionInterface;
use Jean85\AdventOfCode\SolutionInterface;

class Day9Solution implements SolutionInterface, SecondPartSolutionInterface
{
    public function solve(?string $input = null): string
    {
        $input ??= Input::read(__DIR__);

        $tiles = [];

        foreach (explode(PHP_EOL, $input) as $line) {
            $tiles[] = Coordinates::fromString($line);
        }

        $rectangles = [];
        $tiles2 = $tiles;

        foreach ($tiles as $tile1) {
            foreach ($tiles2 as $tile2) {
                if ($tile1 === $tile2) {
                    continue;
                }

                $rectangle = new Rectangle($tile1, $tile2);

                $rectangles[$rectangle->getId()] = $rectangle;
            }
        }

        return (string) max(
            array_map(static fn(Rectangle $rectangle) => $rectangle->getArea(), $rectangles)
        );
    }

    public function solveSecondPart(?string $input = null): string
    {
        $input ??= Input::read(__DIR__);
    }
}
