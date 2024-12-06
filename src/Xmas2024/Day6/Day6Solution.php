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

            [$guard, $direction] = $this->moveGuard($guard, $direction, $map);
        }

        return (string) $solution;
    }

    public function solveSecondPart(?string $input = null): string
    {
        [$map, $guard] = $this->parseInput($input);
        $originalStartingPoint = clone $guard;

        $direction = Direction::Up;
        while ($this->isInsideTheMap($map, $guard)) {
            $currentTerrain = $map->get($guard);
            if ($currentTerrain === Terrain::Plain) {
                $map->add($guard, Terrain::Visited);
            }

            [$guard, $direction] = $this->moveGuard($guard, $direction, $map);
        }

        $solution = 0;
        $maxCoordinates = $map->getMaxCoordinates();
        foreach (range(0, $maxCoordinates->x) as $x) {
            foreach (range(0, $maxCoordinates->y) as $y) {
                $coord = new Coordinates($x, $y);
                if ($map->get($coord) !== Terrain::Visited) {
                    continue;
                }

                $mapWithObstacle = clone $map;
                $mapWithObstacle->add($coord, Terrain::Obstacle);

                if ($this->guardIsInALoop($mapWithObstacle, $originalStartingPoint)) {
                    ++$solution;
                }
            }
        }

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

    /**
     * @param Map<Terrain> $map
     *
     * @return array{Coordinates, Direction}
     */
    private function moveGuard(Coordinates $guard, Direction $direction, Map $map): mixed
    {
        $nextCoordinates = $guard->moveToward($direction);
        if ($map->get($nextCoordinates) === Terrain::Obstacle) {
            $direction = match ($direction) {
                Direction::Up => Direction::Right,
                Direction::Right => Direction::Down,
                Direction::Down => Direction::Left,
                Direction::Left => Direction::Up,
                default => throw new \InvalidArgumentException('Strange direction: ' . $direction->name),
            };
        } else {
            $guard = $nextCoordinates;
        }

        return [$guard, $direction];
    }

    /**
     * @param Map<Terrain> $map
     */
    private function guardIsInALoop(Map $map, Coordinates $guard): bool
    {
        $traceMap = [];

        $direction = Direction::Up;
        while ($this->isInsideTheMap($map, $guard)) {
            if ($traceMap[$direction->name][$guard->x][$guard->y] ?? false) {
                return true;
            }

            $traceMap[$direction->name][$guard->x][$guard->y] = true;
            [$guard, $direction] = $this->moveGuard($guard, $direction, $map);
        }

        return false;
    }
}
