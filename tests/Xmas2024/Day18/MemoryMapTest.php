<?php

declare(strict_types=1);

namespace Tests\Xmas2024\Day18;

use Jean85\AdventOfCode\Coordinates;
use Jean85\AdventOfCode\Xmas2024\Day18\Memory;
use Jean85\AdventOfCode\Xmas2024\Day18\MemoryMap;
use PHPUnit\Framework\TestCase;

class MemoryMapTest extends TestCase
{
    public function testShortestPath(): void
    {
        $memoryMap = new MemoryMap(6);
        $fallenBytes = [
            new Coordinates(5, 4),
            new Coordinates(4, 2),
            new Coordinates(4, 5),
            new Coordinates(3, 0),
            new Coordinates(2, 1),
            new Coordinates(6, 3),
            new Coordinates(2, 4),
            new Coordinates(1, 5),
            new Coordinates(0, 6),
            new Coordinates(3, 3),
            new Coordinates(2, 6),
            new Coordinates(5, 1),
            new Coordinates(1, 2),
            new Coordinates(5, 5),
            new Coordinates(2, 5),
            new Coordinates(6, 5),
            new Coordinates(1, 4),
            new Coordinates(0, 4),
            new Coordinates(6, 4),
            new Coordinates(1, 1),
            new Coordinates(6, 1),
            new Coordinates(1, 0),
            new Coordinates(0, 5),
            new Coordinates(1, 6),
            new Coordinates(2, 0),
        ];

        $fallenBytes = array_slice($fallenBytes, 0, 12);

        foreach ($fallenBytes as $byte) {
            $memoryMap->add($byte, Memory::Obstacle);
        }

        $this->assertSame(22, $memoryMap->calculateShortestPath());
    }
}
