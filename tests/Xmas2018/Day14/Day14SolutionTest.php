<?php

declare(strict_types=1);

namespace Tests\Xmas2018\Day14;

use Jean85\AdventOfCode\Xmas2018\Day14\Day14Solution;
use PHPUnit\Framework\TestCase;

class Day14SolutionTest extends TestCase
{
    /**
     * @dataProvider solveDataProvider
     */
    public function testSolve(int $bestAfter, string $expectedSolution)
    {
        $solution = new Day14Solution($bestAfter);

        $this->assertSame($expectedSolution, $solution->solve());
    }

    public function solveDataProvider()
    {
        return [
            [9, '5158916779'],
            [5, '0124515891'],
            [18, '9251071085'],
            [2018, '5941429882'],
        ];
    }

    /**
     * @dataProvider solveSecondPartDataProvider
     */
    public function testSolveSecondPart(string $stringToSearch, int $expectedSolution)
    {
        $solution = new Day14Solution($stringToSearch);

        $this->assertSame($expectedSolution, $solution->solveSecondPart());
    }

    public function solveSecondPartDataProvider()
    {
        return [
            ['01245', 5],
            ['51589', 9],
            ['92510', 18],
            ['59414', 2018],
        ];
    }
}
