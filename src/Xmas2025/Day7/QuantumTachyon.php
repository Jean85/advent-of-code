<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2025\Day7;

use Jean85\AdventOfCode\Coordinates;
use Jean85\AdventOfCode\Direction;

class QuantumTachyon
{
    public function __construct(
        public readonly Coordinates $coordinates,
        public readonly int $superPositions = 1,
    ) {}

    public function merge(?self $other): self
    {
        return new self($this->coordinates, $this->superPositions + ($other?->superPositions ?? 0));
    }

    public function moveDown(): self
    {
        return new self($this->coordinates->moveToward(Direction::Down), $this->superPositions);
    }

    public function moveLeft(): self
    {
        return new self($this->coordinates->moveToward(Direction::Left), $this->superPositions);
    }

    public function moveRight(): self
    {
        return new self($this->coordinates->moveToward(Direction::Right), $this->superPositions);
    }
}
