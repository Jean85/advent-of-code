<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2023\Day10;

use Jean85\AdventOfCode\Xmas2023\Coordinates;
use Jean85\AdventOfCode\Xmas2023\Direction;
use Jean85\AdventOfCode\Xmas2023\Map;

/**
 * @template-extends Map<Pipe>
 */
class PipeMap extends Map
{
    private Coordinates $start;

    public static function create(string $input): self
    {
        $map = new self();
        $y = 0;
        foreach (explode(PHP_EOL, $input) as $row) {
            $x = 0;
            foreach (str_split($row) as $char) {
                $coordinates = new Coordinates($x++, $y);
                $tile = Pipe::from($char);

                if ($tile === Pipe::S) {
                    $map->start = $coordinates;
                }

                $map->add($coordinates, $tile);
            }
            ++$y;
        }

        return $map;
    }

    public function getStart(): Coordinates
    {
        return $this->start;
    }

    public function getMaxDistance(): int
    {
        [$currentPosition, $currentDirection] = $this->determineFirstStep();
        $steps = 1;

        do {
            $currentDirection = $this->get($currentPosition)->moving($currentDirection);
            $currentPosition = $currentPosition->moveToward($currentDirection);
            ++$steps;
        } while ($currentPosition != $this->start);

        return $steps / 2;
    }

    /**
     * @return array{Coordinates, Direction}
     */
    private function determineFirstStep(): array
    {
        $options = [
            new Coordinates($this->start->x, $this->start->y + 1),
            new Coordinates($this->start->x, $this->start->y - 1),
            new Coordinates($this->start->x + 1, $this->start->y),
            new Coordinates($this->start->x - 1, $this->start->y),
        ];

        foreach (Direction::cases() as $direction) {
            $newCoordinate = $this->start->moveToward($direction);
            try {
                $newDirection = $this->get($newCoordinate)->moving($direction);

                return [$newCoordinate, $newDirection];
            } catch (\Throwable) { // pipe does not work from this direction!
                continue;
            }
        }
    }
}
