<?php

declare(strict_types=1);

namespace Tests\Xmas2025\Day2;

use Jean85\AdventOfCode\Xmas2025\Day2\Day2Solution;
use PHPUnit\Framework\TestCase;

class Day2SolutionTest extends TestCase
{
    private const string TEST_INPUT = '11-22,95-115,998-1012,1188511880-1188511890,222220-222224,1698522-1698528,446443-446449,38593856-38593862,565653-565659,824824821-824824827,2121212118-2121212124';

    public function test(): void
    {
        $Day2Solution = new Day2Solution();

        $this->assertSame('1227775554', $Day2Solution->solve(self::TEST_INPUT));
    }

    public function testSecondPart(): void
    {
        $this->markTestIncomplete();
        $Day2Solution = new Day2Solution();

        $this->assertSame('6', $Day2Solution->solveSecondPart(self::TEST_INPUT));
    }
}
