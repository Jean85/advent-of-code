<?php

declare(strict_types=1);

namespace Tests\Xmas2025\Day1;

use Jean85\AdventOfCode\Xmas2025\Day1\Day1Solution;
use PHPUnit\Framework\TestCase;

class Day1SolutionTest extends TestCase
{
    private const string TEST_INPUT = 'L68
L30
R48
L5
R60
L55
L1
L99
R14
L82';

    public function test(): void
    {
        $day1Solution = new Day1Solution();

        $this->assertSame('3', $day1Solution->solve(self::TEST_INPUT));
    }

    public function testSecondPart(): void
    {
        $this->markTestIncomplete();
        $day1Solution = new Day1Solution();

        $this->assertSame('31', $day1Solution->solveSecondPart(self::TEST_INPUT));
    }
}
