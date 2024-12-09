<?php

declare(strict_types=1);

namespace Tests\Xmas2024\Day9;

use Jean85\AdventOfCode\Xmas2024\Day9\Day9Solution;
use PHPUnit\Framework\TestCase;

class Day9SolutionTest extends TestCase
{
    private const string TEST_INPUT = '2333133121414131402';

    public function test(): void
    {
        $Day9Solution = new Day9Solution();

        $this->assertSame('1928', $Day9Solution->solve(self::TEST_INPUT));
    }

    public function testSecondPart(): void
    {
        $this->markTestIncomplete();
        $Day9Solution = new Day9Solution();

        $this->assertSame('34', $Day9Solution->solveSecondPart(self::TEST_INPUT));
    }
}
