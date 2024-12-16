<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day15;

use Jean85\AdventOfCode\Coordinates;
use Jean85\AdventOfCode\Direction;
use Jean85\AdventOfCode\Input;
use Jean85\AdventOfCode\SecondPartSolutionInterface;
use Jean85\AdventOfCode\SolutionInterface;

class Day15Solution implements SolutionInterface, SecondPartSolutionInterface
{
    public function solve(?string $input = null): string
    {
        [$map, $instructions] = $this->createMap($input);

        $map->execute($instructions);

        return (string) $map->countBoxCoordinates();
    }

    public function solveSecondPart(?string $input = null): string
    {
        $input = str_replace(
            [
                Terrain::Wall->value,
                Terrain::Plain->value,
                Terrain::Robot->value,
                Terrain::Box->value,
            ],
            [
                Terrain::Wall->value . Terrain::Wall->value,
                Terrain::Plain->value . Terrain::Plain->value,
                Terrain::Robot->value . Terrain::Plain->value,
                Terrain::LeftBox->value . Terrain::RightBox->value,
            ],
            $input
        );

        [$map, $instructions] = $this->createMap($input);

        $map->execute($instructions);

        return (string) $map->countBoxCoordinates();
    }

    /**
     * @return array{WarehouseMap, Coordinates, list<Direction>}
     */
    private function createMap(?string $input): array
    {
        $input ??= Input::read(__DIR__);

        [$mapInput, $instructionsInput] = explode("\n\n", $input);
        $map = new WarehouseMap($mapInput);

        return [$map, $this->parseInstructions($instructionsInput)];
    }

    /**
     * @return list<Direction>
     */
    private function parseInstructions(string $instructionsInput): array
    {
        $instructions = [];

        foreach (explode("\n", $instructionsInput) as $line) {
            foreach (str_split($line) as $char) {
                $instructions[] = match ($char) {
                    '^' => Direction::Up,
                    'v' => Direction::Down,
                    '<' => Direction::Left,
                    '>' => Direction::Right,
                };
            }
        }

        return $instructions;
    }
}
