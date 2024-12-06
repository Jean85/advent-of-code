<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day6;

use Jean85\AdventOfCode\Coordinates;
use Jean85\AdventOfCode\Direction;
use Jean85\AdventOfCode\Input;
use Jean85\AdventOfCode\Map;
use Jean85\AdventOfCode\SecondPartSolutionInterface;
use Jean85\AdventOfCode\SolutionInterface;
use Webmozart\Assert\Assert;

class Day6Solution implements SolutionInterface, SecondPartSolutionInterface
{
    public function solve(?string $input = null): string
    {
        [$map, $guard] = $this->parseInput($input);

        $solution = 0;
        $direction = Direction::Up;
        while ($this->isInsideTheMap($map, $guard)) {
            $currentTerrain = $map->get($guard);
            if ($currentTerrain === Terrain::Plain) {
                $map->add($guard, Terrain::Visited);
                ++$solution;
            }

            $nextCoordinates = $guard->moveToward($direction);
            if ($map->get($nextCoordinates) === Terrain::Obstacle) {
                $direction = match ($direction) {
                    Direction::Up => Direction::Right,
                    Direction::Right => Direction::Down,
                    Direction::Down => Direction::Left,
                    Direction::Left => Direction::Up,
                    default => throw new \InvalidArgumentException('Strange direction: ' . $direction->name),
                };
            }

            $guard = $guard->moveToward($direction);
        }

        return (string) $solution;
    }

    public function solveSecondPart(?string $input = null): string
    {
        [$map, $guard] = $this->parseInput($input);

        $solution = 0;

        return (string) $solution;
    }

    /**
     * @return array{Map<Terrain>, Coordinates}
     */
    private function parseInput(?string $input): array
    {
        $input ??= Input::read(__DIR__);
        $map = new Map();
        $map->setDefaultElement(Terrain::Plain);

        foreach (explode("\n", $input) as $y => $line) {
            foreach (str_split($line) as $x => $part) {
                $coordinates = new Coordinates(x: $x, y: $y);
                if ($part === '^') {
                    $guard = $coordinates;
                }

                $map->add($coordinates, Terrain::tryFrom($part) ?? Terrain::Plain);
            }
        }

        Assert::notNull($guard ?? null, 'Guard missing');

        return [$map, $guard];
    }

    private function isInsideTheMap(Map $map, Coordinates $guard): bool
    {
        return $guard->x >= 0
            && $guard->y >= 0
            && $guard->x <= $map->getMaxCoordinates()->x
            && $guard->y <= $map->getMaxCoordinates()->y
        ;
    }
}
