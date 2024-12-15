<?php

declare(strict_types=1);

namespace Tests\Xmas2024\Day14;

use Jean85\AdventOfCode\Xmas2024\Day14\Day14Solution;
use PHPUnit\Framework\TestCase;

class Day14SolutionTest extends TestCase
{
    private const string TEST_INPUT = 'p=0,4 v=3,-3
p=6,3 v=-1,-3
p=10,3 v=-1,2
p=2,0 v=2,-1
p=0,0 v=1,3
p=3,0 v=-2,-2
p=7,6 v=-1,-3
p=3,0 v=-1,-2
p=9,3 v=2,3
p=7,3 v=-1,2
p=2,4 v=2,-3
p=9,5 v=-3,-3';

    public function test(): void
    {
        $this->markTestIncomplete();
        $Day14Solution = new Day14Solution();

        $this->assertSame('12', $Day14Solution->solve(self::TEST_INPUT));
    }

    public function testSecondPart(): void
    {
        $this->markTestIncomplete();
        $Day14Solution = new Day14Solution();

        $this->assertSame('81', $Day14Solution->solveSecondPart(self::TEST_INPUT));
    }
}
