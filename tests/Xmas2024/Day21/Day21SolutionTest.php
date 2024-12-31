<?php

declare(strict_types=1);

namespace Tests\Xmas2024\Day21;

use Jean85\AdventOfCode\Xmas2024\Day21\Day21Solution;
use PHPUnit\Framework\TestCase;

class Day21SolutionTest extends TestCase
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
        $Day21Solution = new Day21Solution();

        $this->assertSame('36', $Day21Solution->solve(self::TEST_INPUT));
    }

    public function testSecondPart(): void
    {
        $this->markTestIncomplete();
        $Day21Solution = new Day21Solution();

        $this->assertSame('81', $Day21Solution->solveSecondPart(self::TEST_INPUT));
    }
}
