<?php

declare(strict_types=1);

namespace Tests\Xmas2018\Day17;

use Jean85\AdventOfCode\Xmas2018\Day17\ClayInput;
use Jean85\AdventOfCode\Xmas2018\Day17\Underground;
use PHPUnit\Framework\TestCase;

class UndergroundTest extends TestCase
{
    public function testGetActualSituation(): void
    {
        $underground = new Underground(ClayInput::getTestInput());
        $expectedSituation = '.....+......
...........#
#..#.......#
#..#..#.....
#..#..#.....
#.....#.....
#.....#.....
#######.....
............
............
...#.....#..
...#.....#..
...#.....#..
...#######..
';

        $this->assertSame($expectedSituation, $underground->getActualSituation(), 'Map not matching' . PHP_EOL . $underground->getActualSituation());
    }
}
