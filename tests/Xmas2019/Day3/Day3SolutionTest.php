<?php

declare(strict_types=1);

namespace Tests\Xmas2019\Day3;

use Jean85\AdventOfCode\Xmas2019\Day3\Day3Solution;
use PHPUnit\Framework\TestCase;

class Day3SolutionTest extends TestCase
{
    /**
     * @dataProvider closestWireInstructionsProvider
     */
    public function testGetClosestCrossing(int $expected, array $instructions1, array $instructions2): void
    {
        $solution = new Day3Solution();

        $this->assertSame($expected, $solution->getClosestCrossing($instructions1, $instructions2));
    }

    public function closestWireInstructionsProvider(): array
    {
        return [
            [
                6,
                ['R8', 'U5', 'L5', 'D3'],
                ['U7', 'R6', 'D4', 'L4'],
            ],
            [
                159,
                ['R75', 'D30', 'R83', 'U83', 'L12', 'D49', 'R71', 'U7', 'L72'],
                ['U62', 'R66', 'U55', 'R34', 'D71', 'R55', 'D58', 'R83'],
            ],
            [
                135,
                ['R98', 'U47', 'R26', 'D63', 'R33', 'U87', 'L62', 'D20', 'R33', 'U53', 'R51'],
                ['U98', 'R91', 'D20', 'R16', 'D67', 'R40', 'U7', 'R15', 'U6', 'R7'],
            ],
        ];
    }

    /**
     * @dataProvider shortestWireInstructionsProvider
     */
    public function testGetShortestCrossing(int $expected, array $instructions1, array $instructions2): void
    {
        $solution = new Day3Solution();

        $this->assertSame($expected, $solution->getShortestCrossing($instructions1, $instructions2));
    }

    public function shortestWireInstructionsProvider()
    {
        return [
            [
                30,
                ['R8', 'U5', 'L5', 'D3'],
                ['U7', 'R6', 'D4', 'L4'],
            ],
            [
                610,
                ['R75', 'D30', 'R83', 'U83', 'L12', 'D49', 'R71', 'U7', 'L72'],
                ['U62', 'R66', 'U55', 'R34', 'D71', 'R55', 'D58', 'R83'],
            ],
            [
                410,
                ['R98', 'U47', 'R26', 'D63', 'R33', 'U87', 'L62', 'D20', 'R33', 'U53', 'R51'],
                ['U98', 'R91', 'D20', 'R16', 'D67', 'R40', 'U7', 'R15', 'U6', 'R7'],
            ],
        ];
    }
}
