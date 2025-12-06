<?php

declare(strict_types=1);

namespace Tests\Xmas2025\Day6;

use Jean85\AdventOfCode\Xmas2025\Day6\Day6Solution;
use PHPUnit\Framework\TestCase;

class Day6SolutionTest extends TestCase
{
    private const string TEST_INPUT = '123 328  51 64 
 45 64  387 23 
  6 98  215 314
*   +   *   +  ';

    public function test(): void
    {
        $Day6Solution = new Day6Solution();

        $this->assertSame('4277556', $Day6Solution->solve(self::TEST_INPUT));
    }

    public function testSecondPart(): void
    {
        $Day6Solution = new Day6Solution();

        $this->assertSame('3263827', $Day6Solution->solveSecondPart(self::TEST_INPUT));
    }
}
