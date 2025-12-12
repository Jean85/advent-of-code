<?php

declare(strict_types=1);

namespace Tests\Xmas2025\Day12;

use Jean85\AdventOfCode\Xmas2025\Day12\Day12Solution;
use PHPUnit\Framework\TestCase;

class Day12SolutionTest extends TestCase
{
    public const string TEST_INPUT = '0:
###
##.
##.

1:
###
##.
.##

2:
.##
###
##.

3:
##.
###
##.

4:
###
#..
###

5:
###
.#.
###

4x4: 0 0 0 0 2 0
12x5: 1 0 1 0 2 2
12x5: 1 0 1 0 3 2';

    public function test(): void
    {
        $Day12Solution = new Day12Solution();

        $this->assertSame('2', $Day12Solution->solve(self::TEST_INPUT));
    }

    public function testSecondPart(): void
    {
        self::markTestIncomplete();
        $Day12Solution = new Day12Solution();

        $this->assertSame('2', $Day12Solution->solveSecondPart($input));
    }
}
