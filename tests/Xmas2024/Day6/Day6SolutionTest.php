<?php

declare(strict_types=1);

namespace Tests\Xmas2024\Day6;

use Jean85\AdventOfCode\Xmas2024\Day6\Day6Solution;
use PHPUnit\Framework\TestCase;

class Day6SolutionTest extends TestCase
{
    private const string TEST_INPUT = '....#.....
.........#
..........
..#.......
.......#..
..........
.#..^.....
........#.
#.........
......#...';

    public function test(): void
    {
        $Day6Solution = new Day6Solution();

        $this->assertSame('41', $Day6Solution->solve(self::TEST_INPUT));
    }

    public function testRegression(): void
    {
        $Day6Solution = new Day6Solution();
        $input = '.#............
..#...........
.^............';

        $this->assertSame('2', $Day6Solution->solve($input));
    }

    public function testSecondPart(): void
    {
        $Day6Solution = new Day6Solution();

        $this->assertSame('6', $Day6Solution->solveSecondPart(self::TEST_INPUT));
    }
}
