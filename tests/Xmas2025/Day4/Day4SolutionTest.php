<?php

declare(strict_types=1);

namespace Tests\Xmas2025\Day4;

use Jean85\AdventOfCode\Xmas2025\Day4\Day4Solution;
use PHPUnit\Framework\TestCase;

class Day4SolutionTest extends TestCase
{
    private const string TEST_INPUT = '..@@.@@@@.
@@@.@.@.@@
@@@@@.@.@@
@.@@@@..@.
@@.@@@@.@@
.@@@@@@@.@
.@.@.@.@@@
@.@@@.@@@@
.@@@@@@@@.
@.@.@@@.@.';

    public function test(): void
    {
        $Day4Solution = new Day4Solution();

        $this->assertSame('13', $Day4Solution->solve(self::TEST_INPUT));
    }

    public function testSecondPart(): void
    {
        $this->markTestIncomplete();
        $Day4Solution = new Day4Solution();

        $this->assertSame('3121910778619', $Day4Solution->solveSecondPart(self::TEST_INPUT));
    }
}
