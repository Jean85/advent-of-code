<?php

declare(strict_types=1);

namespace Tests\Xmas2024\Day3;

use Jean85\AdventOfCode\Xmas2024\Day3\Day3Solution;
use PHPUnit\Framework\TestCase;

class Day3SolutionTest extends TestCase
{
    private const string TEST_INPUT = 'xmul(2,4)%&mul[3,7]!@^do_not_mul(5,5)+mul(32,64]then(mul(11,8)mul(8,5))';

    public function test(): void
    {
        $Day3Solution = new Day3Solution();

        $this->assertSame('161', $Day3Solution->solve(self::TEST_INPUT));
    }

    public function testSecondPart(): void
    {
        $this->markTestIncomplete();
        $Day3Solution = new Day3Solution();

        $this->assertSame('31', $Day3Solution->solveSecondPart(self::TEST_INPUT));
    }
}
