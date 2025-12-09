<?php

declare(strict_types=1);

namespace Tests\Xmas2025\Day9;

use Jean85\AdventOfCode\Xmas2025\Day9\Day9Solution;
use PHPUnit\Framework\TestCase;

class Day9SolutionTest extends TestCase
{
    public const string TEST_INPUT = '7,1
11,1
11,7
9,7
9,5
2,5
2,3
7,3';

    public function test(): void
    {
        $Day9Solution = new Day9Solution();

        $this->assertSame('50', $Day9Solution->solve(self::TEST_INPUT));
    }

    public function testSecondPart(): void
    {
        $Day9Solution = new Day9Solution();

        $this->assertSame('24', $Day9Solution->solveSecondPart(self::TEST_INPUT));
    }
}
