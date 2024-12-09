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

        $antennaeList = $this->getAntennaeList($map);

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

    private function addAntiNode(Coordinates $antiNode, Map $map): bool
    {
        if (! $map->isWithinBound($antiNode)) {
            return false;
        }

        $this->antinodes[(string) $antiNode] = true;

        return true;
    }

    public function solveSecondPart(?string $input = null): string
    {
        $this->antinodes = [];
        $map = $this->parseInput($input);

        $antennaeList = $this->getAntennaeList($map);

        foreach ($antennaeList as $frequency => $antennae) {
            foreach ($antennae as $i => $firstAntenna) {
                foreach (array_slice($antennae, $i + 1) as $secondAntenna) {
                    $diffX = $secondAntenna->x - $firstAntenna->x;
                    $diffY = $secondAntenna->y - $firstAntenna->y;

                    $firstAntiNode = $firstAntenna;
                    while ($this->addAntiNode($firstAntiNode, $map)) {
                        $firstAntiNode = new Coordinates(
                            $firstAntiNode->x - $diffX,
                            $firstAntiNode->y - $diffY,
                        );
                    }

                    $secondAntiNode = $secondAntenna;
                    while ($this->addAntiNode($secondAntiNode, $map)) {
                        $secondAntiNode = new Coordinates(
                            $secondAntiNode->x + $diffX,
                            $secondAntiNode->y + $diffY,
                        );
                    }
                }
            }
        }

        return (string) count($this->antinodes);
    }

    /**
     * @return Map<string>
     */
    private function parseInput(?string $input): Map
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

    private function getAntennaeList(Map $map): array
    {
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

        return $antennaeList;
    }
}
