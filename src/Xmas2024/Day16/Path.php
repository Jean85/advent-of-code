<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day16;

use Jean85\AdventOfCode\Coordinates;
use Jean85\AdventOfCode\Direction;
use Stringable;

class Path implements Stringable
{
    private int $cost = 0;
    private int $turns = 0;
    private array $positionHistory = [];

    public function __construct(
        public Coordinates $position,
        public Direction $direction,
    ) {
        $this->positionHistory[] = $this->position;
    }

    public function getCost(): int
    {
        return $this->cost;
    }

    public function getTurns(): int
    {
        return $this->turns;
    }

    public function getPositionHistory(): array
    {
        return $this->positionHistory;
    }

    /**
     * @return $this
     */
    public function advance(): self
    {
        ++$this->cost;
        $this->position = $this->position->moveToward($this->direction);
        $this->positionHistory[] = $this->position;

        return $this;
    }

    public function turnLeft(): self
    {
        $path = clone $this;
        $path->direction = $this->direction->turnCounterClockWise();
        $path->cost += 1_000;
        ++$path->turns;

        return $path;
    }

    public function turnRight(): self
    {
        $path = clone $this;
        $path->direction = $this->direction->turnClockWise();
        $path->cost += 1_000;
        ++$path->turns;

        return $path;
    }

    public function __toString(): string
    {
        return $this->position->__toString() . ' ' . $this->direction->name . ' (' . $this->cost . ')';
    }
}
