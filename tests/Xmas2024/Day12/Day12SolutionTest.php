<?php

declare(strict_types=1);

namespace Tests\Xmas2024\Day12;

use Jean85\AdventOfCode\Xmas2024\Day12\Day12Solution;
use PHPUnit\Framework\TestCase;

class Day12SolutionTest extends TestCase
{
    private const string TEST_INPUT = 'RRRRIICCFF
RRRRIICCCF
VVRRRCCFFF
VVRCCCJFFF
VVVVCJJCFE
VVIVCCJJEE
VVIIICJJEE
MIIIIIJJEE
MIIISIJEEE
MMMISSJEEE';

    public function test(): void
    {
        $Day12Solution = new Day12Solution();

        $this->assertSame('1930', $Day12Solution->solve(self::TEST_INPUT));
    }

    public function testSecondPart(): void
    {
        $this->markTestIncomplete();
        $Day12Solution = new Day12Solution();

        $this->assertSame('81', $Day12Solution->solveSecondPart(self::TEST_INPUT));
    }
}
