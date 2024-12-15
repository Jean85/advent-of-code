<?php

declare(strict_types=1);

namespace Tests\Xmas2024\Day14;

use Jean85\AdventOfCode\Xmas2024\Day14\RobotMap;
use PHPUnit\Framework\TestCase;

class RobotMapTest extends TestCase
{
    public function testCalculateSafetyFactor(): void
    {
        $input = 'p=0,4 v=3,-3
p=6,3 v=-1,-3
p=10,3 v=-1,2
p=2,0 v=2,-1
p=0,0 v=1,3
p=3,0 v=-2,-2
p=7,6 v=-1,-3
p=3,0 v=-1,-2
p=9,3 v=2,3
p=7,3 v=-1,2
p=2,4 v=2,-3
p=9,5 v=-3,-3';
        $robotMap = new RobotMap(11, 7, $input);

        $robotMap->moveRobots(100);

        $this->assertSame(12, $robotMap->calculateSafetyFactor());
    }
}
