<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day15;

use Jean85\AdventOfCode\Coordinates;
use Jean85\AdventOfCode\Direction;
use Jean85\AdventOfCode\Input;
use Jean85\AdventOfCode\Map;
use Jean85\AdventOfCode\SecondPartSolutionInterface;
use Jean85\AdventOfCode\SolutionInterface;
use Webmozart\Assert\Assert;

class Day15Solution implements SolutionInterface, SecondPartSolutionInterface
{
    public function solve(?string $input = null): string
    {
        [$map, $robot, $instructions] = $this->createMap($input);

        foreach ($instructions as $direction) {
            if ($this->canMove($map, $robot, $direction)) {
                $robot = $robot->moveToward($direction);
            }
        }

        return (string) $this->countBoxCoordinates($map);
    }

    public function solveSecondPart(?string $input = null): string
    {
        [$map, $robot, $instructions] = $this->createMap($input);

        return (string) $this->rateTrailheads($map);
    }

    /**
     * @param Map<Terrain> $map
     */
    private function canMove(Map $map, Coordinates $robot, Direction $direction): bool
    {
        $nextTile = $map->get($robot->moveToward($direction));

        return match ($nextTile) {
            Terrain::Wall => false,
            Terrain::Plain => true,
            Terrain::Box => $this->pushBoxes($map, $robot, $direction),
            Terrain::Robot => throw new \InvalidArgumentException(),
        };
    }

    private function pushBoxes(Map $map, Coordinates $robot, Direction $direction): bool
    {
        $coordinates = $robot->moveToward($direction);
        $firstBox = $map->get($coordinates);
        Assert::same($firstBox, Terrain::Box);

        do {
            $coordinates = $coordinates->moveToward($direction);
            $nextTile = $map->get($coordinates);
        } while ($nextTile === Terrain::Box);

        if ($nextTile === Terrain::Wall) {
            return false;
        }

        $map->add($coordinates, Terrain::Box);
        $map->add($robot->moveToward($direction), Terrain::Plain);

        return true;
    }

    /**
     * @param Map<Terrain> $map
     */
    private function countBoxCoordinates(Map $map): int
    {
        $total = 0;

        foreach ($map->getAll() as [$coord, $tile]) {
            if ($tile === Terrain::Box) {
                $total += $coord->x + (100 * $coord->y);
            }
        }

        return $total;
    }

    /**
     * @return array{Map<Terrain>, Coordinates, list<Direction>}
     */
    private function createMap(?string $input): array
    {
        $input ??= Input::read(__DIR__);
        $map = new Map();
        $map->setDefaultElement(Terrain::Plain);

        [$mapInput, $instructionsInput] = explode("\n\n", $input);

        foreach (explode("\n", $mapInput) as $y => $line) {
            foreach (str_split($line) as $x => $char) {
                $tile = Terrain::from($char);
                $coordinates = new Coordinates($x, $y);
                if ($tile === Terrain::Robot) {
                    $tile = Terrain::Plain;
                    $robot = $coordinates;
                }

                $map->add($coordinates, $tile);
            }
        }

        Assert::notNull($robot);

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

        return [$map, $robot, $instructions];
    }
}
