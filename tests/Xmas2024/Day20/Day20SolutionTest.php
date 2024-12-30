<?php

declare(strict_types=1);

namespace Tests\Xmas2024\Day20;

use Jean85\AdventOfCode\Xmas2024\Day20\Day20Solution;
use PHPUnit\Framework\TestCase;

class Day20SolutionTest extends TestCase
{
    public const string TEST_INPUT = '###############
#...#...#.....#
#.#.#.#.#.###.#
#S#...#.#.#...#
#######.#.#.###
#######.#.#...#
#######.#.###.#
###..E#...#...#
###.#######.###
#...###...#...#
#.#####.#.###.#
#.#...#.#.#...#
#.#.#.#.#.#.###
#...#...#...###
###############';

    public function test(): void
    {
        $this->markTestIncomplete();
        $Day20Solution = new Day20Solution();

        $this->assertSame('36', $Day20Solution->solve(self::TEST_INPUT));
    }

    public function testSecondPart(): void
    {
        $this->markTestIncomplete();
        $Day20Solution = new Day20Solution();

        $this->assertSame('81', $Day20Solution->solveSecondPart(self::TEST_INPUT));
    }
}
