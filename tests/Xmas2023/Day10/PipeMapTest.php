<?php

declare(strict_types=1);

namespace Tests\Xmas2023\Day10;

use Jean85\AdventOfCode\Xmas2023\Coordinates;
use Jean85\AdventOfCode\Xmas2023\Day10\PipeMap;
use PHPUnit\Framework\TestCase;

class PipeMapTest extends TestCase
{
    public function testGetStart(): void
    {
        $map = PipeMap::create(Day10SolutionTest::SQUARE_MAP);

        $this->assertEquals(new Coordinates(1, 1), $map->getStart());
    }

    public function testGetMaxDistance(): void
    {
        $map = PipeMap::create(Day10SolutionTest::SQUARE_MAP);

        $this->assertEquals(4, $map->getMaxDistance());
    }
}
