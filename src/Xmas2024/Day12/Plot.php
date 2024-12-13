<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day12;

use Jean85\AdventOfCode\Coordinates;
use Jean85\AdventOfCode\Direction;
use Jean85\AdventOfCode\Map;

/**
 * @template-extends Map<string>
 */
class Plot extends Map
{
    public function calculateArea(): int
    {
        $area = 0;

        foreach ($this->map as $x => $column) {
            foreach ($column as $y => $plot) {
                ++$area;
            }
        }

        return $area;
    }

    public function calculatePerimeter(): int
    {
        $perimeter = 0;

        foreach ($this->map as $x => $column) {
            foreach ($column as $y => $plot) {
                $perimeter += $this->countEmptyAdjacentSlots(new Coordinates($x, $y));
            }
        }

        return $perimeter;
    }

    private function countEmptyAdjacentSlots(Coordinates $coordinates): int
    {
        return (int) $this->isEmpty($coordinates->moveToward(Direction::Up))
            + (int) $this->isEmpty($coordinates->moveToward(Direction::Down))
            + (int) $this->isEmpty($coordinates->moveToward(Direction::Left))
            + (int) $this->isEmpty($coordinates->moveToward(Direction::Right))
        ;
    }

    private function isEmpty(Coordinates $coordinates): bool
    {
        return ! isset($this->map[$coordinates->x][$coordinates->y]);
    }

    public function calculateFenceCost(): int
    {
        return $this->calculateArea() * $this->calculatePerimeter();
    }
}
