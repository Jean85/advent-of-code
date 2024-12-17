<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day16;

use Jean85\AdventOfCode\Coordinates;
use Jean85\AdventOfCode\Direction;
use Stringable;

class Path implements Stringable
{
    private int $cost = 0;
    public function __construct(
        public Coordinates $position,
        public Direction $direction,
    ) {}

    public function getCost(): int
    {
        return $this->cost;
    }

    /**
     * @return $this
     */
    public function advance(): self
    {
        ++$this->cost;
        $this->position = $this->position->moveToward($this->direction);

        return $this;
    }

    public function turnLeft(): self
    {
        $path = new self($this->position, $this->direction->turnCounterClockWise());
        $path->cost = $this->cost + 1_000;

        return $path;
    }

    public function turnRight(): self
    {
        $path = new self($this->position, $this->direction->turnClockWise());
        $path->cost = $this->cost + 1_000;

        return $path;
    }

    public function __toString(): string
    {
        return $this->position->__toString() . ' ' . $this->direction->name . ' (' . $this->cost . ')';
    }

    public function eurhistic(Coordinates $end): int
    {
        return $this->cost + $this->position->getManhattanDistanceFrom($end);
    }
}
