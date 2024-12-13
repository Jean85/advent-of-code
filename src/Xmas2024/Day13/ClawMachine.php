<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day13;

use Jean85\AdventOfCode\Coordinates;

class ClawMachine
{
    public readonly Coordinates $buttonA;
    public readonly Coordinates $buttonB;
    public readonly Coordinates $prize;

    public function __construct(string $input)
    {
        preg_match('/Button A: X\+(\d+), Y\+(\d+)/', $input, $matches);
        $this->buttonA = new Coordinates((int) $matches[1], (int) $matches[2]);
        preg_match('/Button B: X\+(\d+), Y\+(\d+)/', $input, $matches);
        $this->buttonB = new Coordinates((int) $matches[1], (int) $matches[2]);
        preg_match('/Prize: X=(\d+), Y=(\d+)/', $input, $matches);
        $this->prize = new Coordinates((int) $matches[1], (int) $matches[2]);
    }

    public function calculateMinimumCost(): int
    {
        $pressA = 0;
        $pressB = min(
            (int) ($this->prize->x / $this->buttonB->x),
            (int) ($this->prize->y / $this->buttonB->y),
        );

        $distance = $this->distanceFromThePrize($pressA, $pressB);
        while (0 !== $distance) {
            if ($distance > 0) {
                if ($pressB === 0) {
                    // prize not reachable
                    return 0;
                }

                --$pressB;
            } else {
                ++$pressA;
            }

            $distance = $this->distanceFromThePrize($pressA, $pressB);
        }

        return ($pressA * 3) + $pressB;
    }

    private function distanceFromThePrize(int $pressA, mixed $pressB): int
    {
        $position = new Coordinates(
            $this->buttonA->x * $pressA + $this->buttonB->x * $pressB,
            $this->buttonA->y * $pressA + $this->buttonB->y * $pressB,
        );

        if ($position == $this->prize) {
            return 0;
        }

        if (
            $position->x > $this->prize->x
            || $position->y > $this->prize->y
        ) {
            return 1;
        }

        return -1;
    }
}
