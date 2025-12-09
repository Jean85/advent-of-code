<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2025\Day9;

use Jean85\AdventOfCode\Coordinates;

class VerticalEdge implements Edge
{
    private readonly Coordinates $start;
    private readonly Coordinates $end;

    public function __construct(Coordinates $one, Coordinates $two)
    {
        if ($one->x !== $two->x) {
            throw new \InvalidArgumentException('Only vertical edges are allowed, X differs');
        }

        $vertex = [$one, $two];
        usort($vertex, static fn(Coordinates $a, Coordinates $b) => $a->y <=> $b->y);
        [$this->start, $this->end] = $vertex;
    }

    public function getX(): int
    {
        return $this->start->x;
    }

    public function getMinY(): int
    {
        return $this->start->y;
    }

    public function getMaxY(): int
    {
        return $this->end->y;
    }

    public function cutsTrough(Rectangle $rectangle): bool
    {
        return $this->getX() > min($rectangle->a->x, $rectangle->b->x)
            && $this->getX() < max($rectangle->a->x, $rectangle->b->x)
            && $this->getMinY() < max($rectangle->a->y, $rectangle->b->y)
            && $this->getMaxY() > min($rectangle->a->y, $rectangle->b->y)
        ;
    }
}
