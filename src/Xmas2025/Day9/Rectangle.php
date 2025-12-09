<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2025\Day9;

use Jean85\AdventOfCode\Coordinates;

class Rectangle
{
    public function __construct(
        public readonly Coordinates $a,
        public readonly Coordinates $b,
    ) {}

    public function getId(): string
    {
        $vertex = [$this->a->__toString(), $this->b->__toString()];
        sort($vertex);

        return implode('-', $vertex);
    }

    public function getArea(): int
    {
        return (1 + abs($this->a->x - $this->b->x))
            * (1 + abs($this->a->y - $this->b->y));
    }
}
