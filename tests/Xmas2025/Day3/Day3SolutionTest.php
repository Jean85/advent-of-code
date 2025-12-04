<?php

declare(strict_types=1);

namespace Tests\Xmas2025\Day3;

use Jean85\AdventOfCode\Xmas2025\Day3\Day3Solution;
use PHPUnit\Framework\TestCase;

class Day3SolutionTest extends TestCase
{
    private const string TEST_INPUT = '987654321111111
811111111111119
234234234234278
818181911112111';

    public function test(): void
    {
        $Day3Solution = new Day3Solution();

        $this->assertSame('357', $Day3Solution->solve(self::TEST_INPUT));
    }

    public function testSecondPart(): void
    {
        $Day3Solution = new Day3Solution();

        $this->assertSame('3121910778619', $Day3Solution->solveSecondPart(self::TEST_INPUT));
    }
}
