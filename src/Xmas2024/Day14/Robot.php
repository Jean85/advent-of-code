<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day14;

use Jean85\AdventOfCode\Coordinates;

class Robot
{
    public function __construct(
        public Coordinates $position,
        public Coordinates $velocity,
    ) {}

    public static function fromInput(string $input): self
    {
        preg_match('/p=(\d+),(\d+) v=(-?\d+),(-?\d+)/', $input, $matches);

        return new self(
            new Coordinates((int) $matches[1], (int) $matches[2]),
            new Coordinates((int) $matches[3], (int) $matches[4]),
        );
    }

    public function move(int $times = 1): void
    {
        $this->position = new Coordinates(
            $this->position->x + ($this->velocity->x * $times),
            $this->position->y + ($this->velocity->y * $times),
        );
    }
}
