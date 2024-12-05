<?php

declare(strict_types=1);

namespace Tests\Xmas2024\Day5;

use Jean85\AdventOfCode\Xmas2024\Day5\Day5Solution;
use PHPUnit\Framework\TestCase;

class Day5SolutionTest extends TestCase
{
    private const string TEST_INPUT = '47|53
97|13
97|61
97|47
75|29
61|13
75|53
29|13
97|29
53|29
61|53
97|53
61|29
47|13
75|47
97|75
47|61
75|61
47|29
75|13
53|13

75,47,61,53,29
97,61,53,29,13
75,29,13
75,97,47,61,53
61,13,29
97,13,75,29,47';

    public function test(): void
    {
        $Day5Solution = new Day5Solution();

        $this->assertSame('143', $Day5Solution->solve(self::TEST_INPUT));
    }

    public function testSecondPart(): void
    {
        $this->markTestIncomplete();
        $Day5Solution = new Day5Solution();

        $this->assertSame('48', $Day5Solution->solveSecondPart("xmul(2,4)&mul[3,7]!^don't()_mul(5,5)+mul(32,64](mul(11,8)undo()?mul(8,5))"));
    }
}
