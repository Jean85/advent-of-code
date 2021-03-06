<?php

declare(strict_types=1);

namespace Tests\Xmas2019\Day1;

use Jean85\AdventOfCode\Xmas2019\Day1\Day1Solution;
use PHPUnit\Framework\TestCase;

class Day1SolutionTest extends TestCase
{
    /**
     * @dataProvider fuelDataProvider
     */
    public function testCalculateFuel(int $expectedFuel, int $moduleWeight): void
    {
        $solution = new Day1Solution();

        $this->assertEquals($expectedFuel, $solution->calculateFuel($moduleWeight));
    }

    public function fuelDataProvider(): array
    {
        return [
            [2, 12],
            [2, 14],
            [654, 1969],
            [33583, 100756],
        ];
    }

    /**
     * @dataProvider recursiveFuelDataProvider
     */
    public function testCalculateWithAdditionalFuel(int $expectedFuel, int $module): void
    {
        $solution = new Day1Solution();

        $this->assertEquals($expectedFuel, $solution->calculateWithAdditionalFuel($module));
    }

    public function recursiveFuelDataProvider(): array
    {
        return [
            [2, 14],
            [966, 1969],
            [50346, 100756],
        ];
    }
}
