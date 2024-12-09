<?php

declare(strict_types=1);

namespace Tests\Xmas2024\Day8;

use Jean85\AdventOfCode\Xmas2024\Day8\Day8Solution;
use PHPUnit\Framework\TestCase;

class Day8SolutionTest extends TestCase
{
    private const string TEST_INPUT = '............
........0...
.....0......
.......0....
....0.......
......A.....
............
............
........A...
.........A..
............
............';

    public function test(): void
    {
        $Day8Solution = new Day8Solution();

        $this->assertSame('14', $Day8Solution->solve(self::TEST_INPUT));
    }

    public function testSecondPart(): void
    {
        $this->markTestIncomplete();
        $Day8Solution = new Day8Solution();

        $this->assertSame('11387', $Day8Solution->solveSecondPart(self::TEST_INPUT));
    }
}
