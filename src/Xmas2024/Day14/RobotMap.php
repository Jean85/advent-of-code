<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day14;

use Jean85\AdventOfCode\Coordinates;
use Jean85\AdventOfCode\Direction;
use Webmozart\Assert\Assert;

class RobotMap
{
    /** @var Robot[] */
    private array $robots = [];

    public function __construct(
        private readonly int $maxX,
        private readonly int $maxY,
        string $input
    ) {
        foreach (explode("\n", $input) as $line) {
            $this->robots[] = Robot::fromInput($line);
        }
    }

    public function moveRobots(int $times = 1): void
    {
        foreach ($this->robots as $robot) {
            $robot->move($times);
        }
    }

    public function calculateSafetyFactor(): int
    {
        // quadrants position are unimportant
        $quadrant1 = 0;
        $quadrant2 = 0;
        $quadrant3 = 0;
        $quadrant4 = 0;

        $middleX = ($this->maxX - 1) / 2;
        Assert::integer($middleX);
        $middleY = ($this->maxY - 1) / 2;
        Assert::integer($middleY);

        foreach ($this->robots as $robot) {
            $position = $this->wrapPosition($robot);

            if ($position->x > $middleX) {
                if ($position->y > $middleY) {
                    ++$quadrant1;
                } elseif ($position->y < $middleY) {
                    ++$quadrant2;
                }
            } elseif ($position->x < $middleX) {
                if ($position->y > $middleY) {
                    ++$quadrant3;
                } elseif ($position->y < $middleY) {
                    ++$quadrant4;
                }
            }
        }

        return $quadrant1 * $quadrant2 * $quadrant3 * $quadrant4;
    }

    public function printToFile(int $seconds): bool
    {
        $tempMap = [];
        foreach ($this->robots as $robot) {
            $position = $this->wrapPosition($robot);

            $tempMap[$position->x][$position->y] = $robot;
        }

        if (! $this->checkForOneWithAllNeighboursPopulated($tempMap)) {
            return false;
        }

        $output = '';

        foreach (range(0, $this->maxY - 1) as $y) {
            foreach (range(0, $this->maxX - 1) as $x) {
                if (isset($tempMap[$x][$y])) {
                    $output .= 'X';
                } else {
                    $output .= ' ';
                }
            }
            $output .= PHP_EOL;
        }

        file_put_contents($seconds . '.txt', $output);

        return true;
    }

    private function wrapPosition(Robot $robot): Coordinates
    {
        $x = $robot->position->x % $this->maxX;
        $y = $robot->position->y % $this->maxY;

        if ($x < 0) {
            $x += $this->maxX;
        }

        if ($y < 0) {
            $y += $this->maxY;
        }

        return new Coordinates($x, $y);
    }

    private function checkForOneWithAllNeighboursPopulated(array $tempMap): bool
    {
        foreach (range(0, $this->maxY - 1) as $y) {
            foreach (range(0, $this->maxX - 1) as $x) {
                if ($this->areAllNeighboursPopulated($tempMap, new Coordinates($x, $y))) {
                    return true;
                }
            }
        }

        return false;
    }

    public function areAllNeighboursPopulated(array $tempMap, Coordinates $position): bool
    {
        foreach (Direction::cases() as $direction) {
            $neighbour = $position->moveToward($direction);
            if (! isset($tempMap[$neighbour->x][$neighbour->y])) {
                return false;
            }
        }

        return true;
    }
}
