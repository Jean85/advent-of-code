<?php

declare(strict_types=1);

namespace Tests\Xmas2024\Day13;

use Jean85\AdventOfCode\Xmas2024\Day13\Day13Solution;
use PHPUnit\Framework\TestCase;

class Day13SolutionTest extends TestCase
{
    private const string TEST_INPUT = 'Button A: X+94, Y+34
Button B: X+22, Y+67
Prize: X=8400, Y=5400

Button A: X+26, Y+66
Button B: X+67, Y+21
Prize: X=12748, Y=12176

Button A: X+17, Y+86
Button B: X+84, Y+37
Prize: X=7870, Y=6450

Button A: X+69, Y+23
Button B: X+27, Y+71
Prize: X=18641, Y=10279';

    public function test(): void
    {
        $Day13Solution = new Day13Solution();

        $this->assertSame('480', $Day13Solution->solve(self::TEST_INPUT));
    }

    public function testSecondPart(): void
    {
        $this->markTestIncomplete();
        $Day13Solution = new Day13Solution();

        $this->assertSame('81', $Day13Solution->solveSecondPart(self::TEST_INPUT));
    }
}
