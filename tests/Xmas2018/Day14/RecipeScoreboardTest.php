<?php

declare(strict_types=1);

namespace Tests\Xmas2018\Day14;

use Jean85\AdventOfCode\Xmas2018\Day14\RecipeScoreboard;
use PHPUnit\Framework\TestCase;

class RecipeScoreboardTest extends TestCase
{
    public function testSolve(): void
    {
        $solution = new RecipeScoreboard();

        foreach ($this->steps() as $step) {
            $this->assertSame($step, $solution->getActualSituation());

            $solution->tick();
        }
    }

    public function steps()
    {
        return [
            '(3)[7]',
            '(3)[7] 1  0 ',
            ' 3  7  1 [0](1) 0 ',
            ' 3  7  1  0 [1] 0 (1)',
            '(3) 7  1  0  1  0 [1] 2 ',
            ' 3  7  1  0 (1) 0  1  2 [4]',
            ' 3  7  1 [0] 1  0 (1) 2  4  5 ',
            ' 3  7  1  0 [1] 0  1  2 (4) 5  1 ',
            ' 3 (7) 1  0  1  0 [1] 2  4  5  1  5 ',
            ' 3  7  1  0  1  0  1  2 [4](5) 1  5  8 ',
            ' 3 (7) 1  0  1  0  1  2  4  5  1  5  8 [9]',
            ' 3  7  1  0  1  0  1 [2] 4 (5) 1  5  8  9  1  6 ',
            ' 3  7  1  0  1  0  1  2  4  5 [1] 5  8  9  1 (6) 7 ',
            ' 3  7  1  0 (1) 0  1  2  4  5  1  5 [8] 9  1  6  7  7 ',
            ' 3  7 [1] 0  1  0 (1) 2  4  5  1  5  8  9  1  6  7  7  9 ',
            ' 3  7  1  0 [1] 0  1  2 (4) 5  1  5  8  9  1  6  7  7  9  2 ',
        ];
    }
}