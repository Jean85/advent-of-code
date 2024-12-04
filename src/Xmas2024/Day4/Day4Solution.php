<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day4;

use Jean85\AdventOfCode\Coordinates;
use Jean85\AdventOfCode\Direction;
use Jean85\AdventOfCode\Input;
use Jean85\AdventOfCode\Map;
use Jean85\AdventOfCode\SecondPartSolutionInterface;
use Jean85\AdventOfCode\SolutionInterface;

class Day4Solution implements SolutionInterface, SecondPartSolutionInterface
{
    public function solve(?string $input = null): string
    {
        $map = $this->parseMap($input);

        return (string) $this->countWord($map, [
            Letter::X,
            Letter::M,
            Letter::A,
            Letter::S,
        ]);
    }

    public function solveSecondPart(?string $input = null): string
    {
        $input ??= Input::read(__DIR__);

        $solution = 0;

        return (string) $solution;
    }

    /**
     * @param Map<Letter> $map
     * @param list<Letter> $word
     */
    private function countWord(Map $map, array $word): int
    {
        $count = 0;

        $maxCoordinates = $map->getMaxCoordinates();

        foreach (range(0, $maxCoordinates->y) as $y) {
            foreach (range(0, $maxCoordinates->x) as $x) {
                $count += $this->searchWordAt($map, new Coordinates($x, $y), $word);
            }
        }

        return $count;
    }

    private function searchWordAt(Map $map, Coordinates $coord, array $word): int
    {
        if ($map->get($coord) !== $word[0]) {
            return 0;
        }

        array_shift($word);
        $count = 0;
        foreach (Direction::cases() as $direction) {
            if ($this->checkWordPresence($map, $coord->moveToward($direction), $direction, $word)) {
                ++$count;
            }
        }

        return $count;
    }

    /**
     * @param Map<Letter> $map
     * @param list<Letter> $word
     */
    private function checkWordPresence(Map $map, Coordinates $coord, Direction $direction, array $word): bool
    {
        while ($currentLetter = array_shift($word)) {
            if ($map->get($coord) !== $currentLetter) {
                return false;
            }

            $coord = $coord->moveToward($direction);
        }

        return true;
    }

    /**
     * @return Map<Letter>
     */
    private function parseMap(?string $input): Map
    {
        $input ??= Input::read(__DIR__);
        /** @var Map<Letter> $map */
        $map = new Map();
        $map->setDefaultElement(Letter::Other);

        foreach (explode("\n", $input) as $y => $line) {
            foreach (str_split($line) as $x => $char) {
                $coord = new Coordinates($x, $y);
                $map->add($coord, Letter::tryFrom($char) ?? Letter::Other);
            }
        }

        return $map;
    }
}
