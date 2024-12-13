<?php

declare(strict_types=1);

namespace Tests\Xmas2024\Day12;

use Jean85\AdventOfCode\Xmas2024\Day12\Garden;
use PHPUnit\Framework\TestCase;

class GardenTest extends TestCase
{
    public function test()
    {
        $input = 'RRRRIICCFF
RRRRIICCCF
VVRRRCCFFF
VVRCCCJFFF
VVVVCJJCFE
VVIVCCJJEE
VVIIICJJEE
MIIIIIJJEE
MIIISIJEEE
MMMISSJEEE
';
        $garden = Garden::createFrom($input);

        $this->assertCount(11, $garden->getPlots());
        $this->assertSame(1_930, $garden->calculateFenceCost());
    }
}
