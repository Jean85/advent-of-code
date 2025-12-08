<?php

declare(strict_types=1);

namespace Tests\Xmas2025\Day8;

use Jean85\AdventOfCode\Xmas2025\Day8\Day8Solution;
use PHPUnit\Framework\TestCase;

class Day8SolutionTest extends TestCase
{
    public const string TEST_INPUT = '162,817,812
57,618,57
906,360,560
592,479,940
352,342,300
466,668,158
542,29,236
431,825,988
739,650,466
52,470,668
216,146,977
819,987,18
117,168,530
805,96,715
346,949,466
970,615,88
941,993,340
862,61,35
984,92,344
425,690,689';

    public function test(): void
    {
        self::markTestSkipped('cannot stop to 10 iterations');
        $Day8Solution = new Day8Solution();

        $this->assertSame('40', $Day8Solution->solve(self::TEST_INPUT));
    }

    public function testSecondPart(): void
    {
        self::markTestIncomplete();
        $Day8Solution = new Day8Solution();

        $this->assertSame('40', $Day8Solution->solveSecondPart(self::TEST_INPUT));
    }
}
