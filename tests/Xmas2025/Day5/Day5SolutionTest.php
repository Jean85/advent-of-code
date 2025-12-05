<?php

declare(strict_types=1);

namespace Tests\Xmas2025\Day5;

use Jean85\AdventOfCode\Xmas2025\Day5\Day5Solution;
use PHPUnit\Framework\TestCase;

class Day5SolutionTest extends TestCase
{
    private const string TEST_INPUT = '3-5
10-14
16-20
12-18

1
5
8
11
17
32';

    public function test(): void
    {
        $Day5Solution = new Day5Solution();

        $this->assertSame('3', $Day5Solution->solve(self::TEST_INPUT));
    }

    public function testSecondPart(): void
    {
        $Day5Solution = new Day5Solution();

        $this->assertSame('14', $Day5Solution->solveSecondPart(self::TEST_INPUT));
    }
}
