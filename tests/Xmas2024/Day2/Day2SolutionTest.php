<?php

declare(strict_types=1);

namespace Tests\Xmas2024\Day2;

use Jean85\AdventOfCode\Xmas2024\Day2\Day2Solution;
use PHPUnit\Framework\TestCase;

class Day2SolutionTest extends TestCase
{
    private const string TEST_INPUT = '7 6 4 2 1
1 2 7 8 9
9 7 6 2 1
1 3 2 4 5
8 6 4 4 1
1 3 6 7 9';

    public function test(): void
    {
        $Day2Solution = new Day2Solution();

        $this->assertSame('2', $Day2Solution->solve(self::TEST_INPUT));
    }

    public function testSecondPart(): void
    {
        $this->markTestIncomplete();
        $Day2Solution = new Day2Solution();

        $this->assertSame('31', $Day2Solution->solveSecondPart(self::TEST_INPUT));
    }
}
