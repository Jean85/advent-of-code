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
    public function __construct(
        private readonly string $char,
    ) {
        parent::__construct();
        $this->setDefaultElement(' ');
    }

    public function calculateSides(): int
    {
        $sides = 0;

        foreach ($this->map as $x => $column) {
            foreach ($column as $y => $plot) {
                $coordinates = new Coordinates($x, $y);
                if ($this->get($coordinates->moveToward(Direction::Up)) === ' ') {
                    $sides += $this->calculateSingleFence($coordinates);
                }
            }
        }

        return $sides;
    }

    private function calculateSingleFence(Coordinates $insideTracker): int
    {
        $outsideTracker = $insideTracker->moveToward(Direction::Up);
        $this->add($outsideTracker, '#');

        $sides = 0;
        $stopAt = null;
        $stopDirection = null;
        $direction = Direction::Right;
        while ($stopAt != $insideTracker || $stopDirection != $direction) {
            if ($this->get($insideTracker->moveToward($direction)) !== $this->char) {
                // must turn clockwise
                $outsideTracker = $insideTracker->moveToward($direction);
                $this->add($outsideTracker, '#');
                $stopDirection ??= $direction;
                $direction = $direction->turnClockWise();
                ++$sides;
                $stopAt ??= $insideTracker;
            } elseif ($this->get($outsideTracker->moveToward($direction)) === $this->char) {
                // must turn counter-clockwise
                $stopAt ??= $insideTracker;
                $stopDirection ??= $direction;
                $insideTracker = $outsideTracker->moveToward($direction);
                $direction = $direction->turnCounterClockWise();
                ++$sides;
            } else {
                // move forward
                $insideTracker = $insideTracker->moveToward($direction);
                $outsideTracker = $outsideTracker->moveToward($direction);
                $this->add($outsideTracker, '#');
            }
        }

        return $sides;
    }

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

    public function calculateFenceDiscountedCost(): int
    {
        return $this->calculateArea() * $this->calculateSides();
    }
}
