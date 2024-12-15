<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day13;

use Jean85\AdventOfCode\Coordinates;
use Webmozart\Assert\Assert;

class ClawMachine
{
    public readonly Coordinates $buttonA;
    public readonly Coordinates $buttonB;
    public readonly Coordinates $prize;

    public function __construct(string $input, bool $prizeIsFurtherThanExpected = false)
    {
        $additionalDistance = 0;
        if ($prizeIsFurtherThanExpected) {
            $additionalDistance = 10_000_000_000_000;
        }

        preg_match('/Button A: X\+(\d+), Y\+(\d+)/', $input, $matches);
        $this->buttonA = new Coordinates((int) $matches[1], (int) $matches[2]);
        preg_match('/Button B: X\+(\d+), Y\+(\d+)/', $input, $matches);
        $this->buttonB = new Coordinates((int) $matches[1], (int) $matches[2]);
        preg_match('/Prize: X=(\d+), Y=(\d+)/', $input, $matches);
        $this->prize = new Coordinates($additionalDistance + (int) $matches[1], $additionalDistance + (int) $matches[2]);
    }

    public function calculateMinimumCost(): int
    {
        $press = $this->doCalculateMinimumCost($this->buttonA, $this->buttonB);
        if ($press === null) {
            return 0;
        }

        [$pressA, $pressB] = $press;
        Assert::same($this->distanceFromThePrize($pressA, $pressB), 0);

        return ((int) $pressA * 3) + (int) $pressB;
    }

    public function doCalculateMinimumCost(Coordinates $buttonA, Coordinates $buttonB): ?array
    {
        // vector for buttonA => Ya = M * Xa
        $m = $buttonA->y / $buttonA->x;
        // vector for buttonB passing through the prize => Yb = N * Xb + C
        $n = $buttonB->y / $buttonB->x;
        $c = $this->prize->y - ($n * $this->prize->x);

        // search for point Gamma of incidence between the two lines
        $gammaX = $c / ($m - $n);

        $pressA = round($gammaX / $buttonA->x, 8);
        $pressB = round(($this->prize->x - $gammaX) / $buttonB->x, 8);
        if (abs($pressA - round($pressA)) > 0.01) {
            return null;
        }
        if (abs($pressB - round($pressB)) > 0.01) {
            return null;
        }

        return [(int) round($pressA), (int) round($pressB)];
    }

    private function distanceFromThePrize(int $pressA, int $pressB): int
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
