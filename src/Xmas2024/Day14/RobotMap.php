<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day14;

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
            $x = $robot->position->x % $this->maxX;
            $y = $robot->position->y % $this->maxY;

            if ($x < 0) {
                $x += $this->maxX;
            }

            if ($y < 0) {
                $y += $this->maxY;
            }

            if ($x > $middleX) {
                if ($y > $middleY) {
                    ++$quadrant1;
                } elseif ($y < $middleY) {
                    ++$quadrant2;
                }
            } elseif ($x < $middleX) {
                if ($y > $middleY) {
                    ++$quadrant3;
                } elseif ($y < $middleY) {
                    ++$quadrant4;
                }
            }
        }

        return $quadrant1 * $quadrant2 * $quadrant3 * $quadrant4;
    }
}
