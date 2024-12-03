<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode;

use Jean85\AdventOfCode\Direction;

class Coordinates
{
    public function __construct(
        public readonly int $x,
        public readonly int $y,
    ) {}

    public function getManhattanDistanceFrom(self $other): int
    {
        return abs($this->x - $other->x) + abs($this->y - $other->y);
    }

    public function moveToward(Direction $direction): self
    {
        return match ($direction) {
            Direction::Up => new self($this->x, $this->y - 1),
            Direction::Down => new self($this->x, $this->y + 1),
            Direction::Left => new self($this->x - 1, $this->y),
            Direction::Right => new self($this->x + 1, $this->y),
        };
    }
}
