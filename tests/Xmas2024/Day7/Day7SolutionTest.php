<?php

declare(strict_types=1);

namespace Tests\Xmas2024\Day7;

use Jean85\AdventOfCode\Xmas2024\Day7\Day7Solution;
use PHPUnit\Framework\TestCase;

class Day7SolutionTest extends TestCase
{
    private const string TEST_INPUT = '190: 10 19
3267: 81 40 27
83: 17 5
156: 15 6
7290: 6 8 6 15
161011: 16 10 13
192: 17 8 14
21037: 9 7 18 13
292: 11 6 16 20';

    public function test(): void
    {
        $Day7Solution = new Day7Solution();

        $this->assertSame('3749', $Day7Solution->solve(self::TEST_INPUT));
    }

    public function testSecondPart(): void
    {
        $this->markTestIncomplete();
        $Day7Solution = new Day7Solution();

        $this->assertSame('6', $Day7Solution->solveSecondPart(self::TEST_INPUT));
    }
}
