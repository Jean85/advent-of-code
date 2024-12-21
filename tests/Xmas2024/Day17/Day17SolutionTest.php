<?php

declare(strict_types=1);

namespace Tests\Xmas2024\Day17;

use Jean85\AdventOfCode\Xmas2024\Day17\Day17Solution;
use PHPUnit\Framework\TestCase;

class Day17SolutionTest extends TestCase
{
    private const string TEST_INPUT = 'Register A: 729
Register B: 0
Register C: 0

Program: 0,1,5,4,3,0';

    public function test(): void
    {
        $Day17Solution = new Day17Solution();

        $this->assertSame('4,6,3,5,6,3,5,2,1,0', $Day17Solution->solve(self::TEST_INPUT));
    }

    public function testSecondPart(): void
    {
        $this->markTestIncomplete();
        $Day17Solution = new Day17Solution();

        $this->assertSame('81', $Day17Solution->solveSecondPart(self::TEST_INPUT));
    }
}
