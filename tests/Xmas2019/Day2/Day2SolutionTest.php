<?php

namespace Tests\Xmas2019\Day2;

use Jean85\AdventOfCode\Xmas2019\Day2\Day2Solution;
use PHPUnit\Framework\TestCase;

class Day2SolutionTest extends TestCase
{
    /**
     * @dataProvider stepDataProvider
     */
    public function testStep(array $before, array $after): void
    {
        $solution = new Day2Solution();

        $this->assertTrue($solution->step($before, 0));
        $this->assertEquals($after, $before);
    }

    public function stepDataProvider()
    {
        return [
            [
                [1, 0, 0, 0, 99],
                [2, 0, 0, 0, 99],
            ],
            [
                [2, 3, 0, 3, 99],
                [2, 3, 0, 6, 99],
            ],
            [
                [2, 4, 4, 5, 99, 0],
                [2, 4, 4, 5, 99, 9801],
            ],
        ];
    }

    /**
     * @dataProvider runDataProvider
     */
    public function testRun(array $memory, array $expected)
    {
        $solution = new Day2Solution();

        $solution->run($memory);

        $this->assertEquals($expected, $memory);
    }

    public function runDataProvider(): array
    {
        return [
            [
                [1, 1, 1, 4, 99, 5, 6, 0, 99],
                [30, 1, 1, 4, 2, 5, 6, 0, 99],
            ],
            [
                [1,    9, 10, 3,  2, 3, 11, 0, 99, 30, 40, 50],
                [3500, 9, 10, 70, 2, 3, 11, 0, 99, 30, 40, 50],
            ],
        ];
    }
}
