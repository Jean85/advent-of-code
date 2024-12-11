<?php

declare(strict_types=1);

namespace Tests\Xmas2024\Day11;

use Jean85\AdventOfCode\Xmas2024\Day11\Day11Solution;
use PHPUnit\Framework\TestCase;

class Day11SolutionTest extends TestCase
{
    private const string TEST_INPUT = '125 17';

    public function test(): void
    {
        $Day11Solution = new Day11Solution();

        $this->assertSame('55312', $Day11Solution->solve(self::TEST_INPUT));
    }

    public function testSecondPart(): void
    {
        $this->markTestIncomplete();
        $Day11Solution = new Day11Solution();

        $this->assertSame('81', $Day11Solution->solveSecondPart(self::TEST_INPUT));
    }
}
