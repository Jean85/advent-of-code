<?php

declare(strict_types=1);

namespace Tests\Xmas2024\Day18;

use Jean85\AdventOfCode\Xmas2024\Day18\Day18Solution;
use PHPUnit\Framework\TestCase;

class Day18SolutionTest extends TestCase
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
        $this->markTestIncomplete();
        $Day18Solution = new Day18Solution();

        $this->assertSame('36', $Day18Solution->solve(self::TEST_INPUT));
    }

    public function testSecondPart(): void
    {
        $this->markTestIncomplete();
        $Day18Solution = new Day18Solution();

        $this->assertSame('81', $Day18Solution->solveSecondPart(self::TEST_INPUT));
    }
}
