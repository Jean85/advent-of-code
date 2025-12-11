<?php

declare(strict_types=1);

namespace Tests\Xmas2025\Day10;

use Jean85\AdventOfCode\Xmas2025\Day10\Day10Solution;
use PHPUnit\Framework\TestCase;

class Day10SolutionTest extends TestCase
{
    public const string TEST_INPUT = '[.##.] (3) (1,3) (2) (2,3) (0,2) (0,1) {3,5,4,7}
[...#.] (0,2,3,4) (2,3) (0,4) (0,1,2) (1,2,3,4) {7,5,12,7,2}
[.###.#] (0,1,2,3,4) (0,3,4) (0,1,2,4,5) (1,2) {10,11,11,5,10,5}';

    public function test(): void
    {
        $Day10Solution = new Day10Solution();

        $this->assertSame('7', $Day10Solution->solve(self::TEST_INPUT));
    }

    public function testSecondPart(): void
    {
        $Day10Solution = new Day10Solution();

        $this->assertSame('33', $Day10Solution->solveSecondPart(self::TEST_INPUT));
    }
}
