<?php

declare(strict_types=1);

namespace Tests\Xmas2024\Day15;

use Jean85\AdventOfCode\Direction;
use Jean85\AdventOfCode\Xmas2024\Day15\WarehouseMap;
use PHPUnit\Framework\TestCase;

class WarehouseMapTest extends TestCase
{
    public function test(): void
    {
        $map = new WarehouseMap('########
#..O.O.#
##@.O..#
#...O..#
#.#.O..#
#...O..#
#......#
########');

        $instructions = '<^^>>>vv<v>>v<<';
        foreach (str_split($instructions) as $instruction) {
            $direction = match ($instruction) {
                '^' => Direction::Up,
                'v' => Direction::Down,
                '<' => Direction::Left,
                '>' => Direction::Right,
            };

            $map->execute([$direction]);
        }

        $this->assertSame(2_028, $map->countBoxCoordinates());
    }
}
