<?php

declare(strict_types=1);

namespace Tests\Xmas2024\Day10;

use Jean85\AdventOfCode\Xmas2024\Day10\Day10Solution;
use PHPUnit\Framework\TestCase;

class Day10SolutionTest extends TestCase
{
    private const string TEST_INPUT = '89010123
78121874
87430965
96549874
45678903
32019012
01329801
10456732';

    public function test(): void
    {
        $Day10Solution = new Day10Solution();

        $this->assertSame('36', $Day10Solution->solve(self::TEST_INPUT));
    }

    public function testSecondPart(): void
    {
        $this->markTestIncomplete();
        $Day10Solution = new Day10Solution();

        $this->assertSame('34', $Day10Solution->solveSecondPart(self::TEST_INPUT));
    }
}
