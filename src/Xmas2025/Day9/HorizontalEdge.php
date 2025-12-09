<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2025\Day9;

use Jean85\AdventOfCode\Coordinates;

class HorizontalEdge implements Edge
{
    private readonly Coordinates $start;
    private readonly Coordinates $end;

    public function __construct(Coordinates $one, Coordinates $two)
    {
        if ($one->y !== $two->y) {
            throw new \InvalidArgumentException('Only horizontal edges are allowed, Y differs');
        }

        $vertex = [$one, $two];
        usort($vertex, static fn(Coordinates $a, Coordinates $b) => $a->x <=> $b->x);
        [$this->start, $this->end] = $vertex;
    }

    public function getMinX(): int
    {
        return $this->start->x;
    }

    public function getMaxX(): int
    {
        return $this->end->x;
    }

    public function getY(): int
    {
        return $this->start->y;
    }

    public function cutsTrough(Rectangle $rectangle): bool
    {
        return $this->getY() > min($rectangle->a->y, $rectangle->b->y)
            && $this->getY() < max($rectangle->a->y, $rectangle->b->y)
            && $this->getMinX() < max($rectangle->a->x, $rectangle->b->x)
            && $this->getMaxX() > min($rectangle->a->x, $rectangle->b->x)
        ;
    }
}
