<?php

declare(strict_types=1);

namespace Tests\Xmas2024\Day4;

use Jean85\AdventOfCode\Xmas2024\Day4\Day4Solution;
use PHPUnit\Framework\TestCase;

class Day4SolutionTest extends TestCase
{
    private const string TEST_INPUT = 'MMMSXXMASM
MSAMXMSMSA
AMXSXMAAMM
MSAMASMSMX
XMASAMXAMM
XXAMMXXAMA
SMSMSASXSS
SAXAMASAAA
MAMMMXMMMM
MXMXAXMASX';

    public function test(): void
    {
        $Day4Solution = new Day4Solution();

        $this->assertSame('18', $Day4Solution->solve(self::TEST_INPUT));
    }

    public function testSecondPart(): void
    {
        $this->markTestIncomplete();
        $Day4Solution = new Day4Solution();

        $this->assertSame('48', $Day4Solution->solveSecondPart("xmul(2,4)&mul[3,7]!^don't()_mul(5,5)+mul(32,64](mul(11,8)undo()?mul(8,5))"));
    }
}
