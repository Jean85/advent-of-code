<?php

declare(strict_types=1);

namespace Tests\Xmas2024\Day19;

use Jean85\AdventOfCode\Xmas2024\Day19\Day19Solution;
use PHPUnit\Framework\TestCase;

class Day19SolutionTest extends TestCase
{
    private const string TEST_INPUT = 'r, wr, b, g, bwu, rb, gb, br

brwrr
bggr
gbbr
rrbgbr
ubwu
bwurrg
brgr
bbrgwb';

    public function test(): void
    {
        $Day19Solution = new Day19Solution();

        $this->assertSame('6', $Day19Solution->solve(self::TEST_INPUT));
    }

    public function testSecondPart(): void
    {
        $Day19Solution = new Day19Solution();

        $this->assertSame('16', $Day19Solution->solveSecondPart(self::TEST_INPUT));
    }
}
