<?php

namespace Tests\Day1;

use Jean85\AdventOfCode\Day1\Day1Solution;
use PHPUnit\Framework\TestCase;

class Day1SolutionTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     * @param string $input
     * @param array $expectedNumbers
     * @param int $expectedSum
     */
    public function testSolution(string $input, array $expectedNumbers, int $expectedSum)
    {
        $solution = new Day1Solution($input);

        $this->assertSame($expectedNumbers, $solution->getMatchingNumbers());
        $this->assertSame($expectedSum, $solution->solve());
    }

    public function dataProvider()
    {
        yield ['1122', [1, 2], 3];
        yield ['1111', [1, 1, 1, 1], 4];
        yield ['1234', [], 0];
        yield ['91212129', [9], 9];
    }
}