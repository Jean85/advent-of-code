<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day8;

use Jean85\AdventOfCode\Coordinates;
use Jean85\AdventOfCode\Input;
use Jean85\AdventOfCode\Map;
use Jean85\AdventOfCode\SecondPartSolutionInterface;
use Jean85\AdventOfCode\SolutionInterface;

class Day8Solution implements SolutionInterface, SecondPartSolutionInterface
{
    /** @var array<string, string> */
    private array $antinodes;

    public function solve(?string $input = null): string
    {
        $this->antinodes = [];
        $map = $this->parseInput($input);

        $solution = 0;
        $maxCoordinates = $map->getMaxCoordinates();
        $antennaeList = [];

        foreach (range(0, $maxCoordinates->y) as $y) {
            foreach (range(0, $maxCoordinates->x) as $x) {
                $coord = new Coordinates($x, $y);
                $antenna = $map->get($coord);
                if ($antenna === '.') {
                    continue;
                }

                $antennaeList[$antenna][] = $coord;
            }
        }

        foreach ($antennaeList as $frequency => $antennae) {
            foreach ($antennae as $i => $firstAntenna) {
                foreach (array_slice($antennae, $i + 1) as $secondAntenna) {
                    $diffX = $secondAntenna->x - $firstAntenna->x;
                    $diffY = $secondAntenna->y - $firstAntenna->y;

                    $firstAntiNode = new Coordinates(
                        $firstAntenna->x - $diffX,
                        $firstAntenna->y - $diffY,
                    );

                    $secondAntiNode = new Coordinates(
                        $secondAntenna->x + $diffX,
                        $secondAntenna->y + $diffY,
                    );

                    $this->addAntiNode($firstAntiNode, $map);
                    $this->addAntiNode($secondAntiNode, $map);
                }
            }
        }

        return (string) count($this->antinodes);
    }

    private function addAntiNode(Coordinates $antiNode, Map $map): void
    {
        if (! $map->isWithinBound($antiNode)) {
            return;
        }

        $this->antinodes[(string) $antiNode] = true;
    }

    public function solveSecondPart(?string $input = null): string
    {
        $map = $this->parseInput($input, true);

        $solution = 0;

        return (string) $solution;
    }

    /**
     * @return Map<string>
     */
    private function parseInput(?string $input, bool $allowConcatenation = false): Map
    {
        $input ??= Input::read(__DIR__);

        $map = new Map();
        foreach (explode("\n", $input) as $y => $line) {
            foreach (str_split($line) as $x => $char) {
                $map->add(new Coordinates($x, $y), $char);
            }
        }

        return $map;
    }
}
