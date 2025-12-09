<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode;

class Coordinates
{
    public function __construct(
        public readonly int $x,
        public readonly int $y,
    ) {}

    public static function fromString(string $line): self
    {
        [$x, $y] = explode(',', $line);

        if (! is_numeric($x)) {
            throw new \InvalidArgumentException('X must be numeric, got: ' . $x);
        }

        if (! is_numeric($y)) {
            throw new \InvalidArgumentException('Y must be numeric, got: ' . $y);
        }

        return new self((int) $x, (int) $y);
    }

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
            Direction::UpLeft => $this->moveToward(Direction::Up)->moveToward(Direction::Left),
            Direction::UpRight => $this->moveToward(Direction::Up)->moveToward(Direction::Right),
            Direction::DownLeft => $this->moveToward(Direction::Down)->moveToward(Direction::Left),
            Direction::DownRight => $this->moveToward(Direction::Down)->moveToward(Direction::Right),
        };
    }

    public function __toString(): string
    {
        return $this->x . ',' . $this->y;
    }
}
