<?php

declare(strict_types=1);

namespace Tests\Xmas2024\Day12;

use Jean85\AdventOfCode\Coordinates;
use Jean85\AdventOfCode\Xmas2024\Day12\Plot;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class PlotTest extends TestCase
{
    #[DataProvider('plotDataProvider')]
    public function testCalculateArea(int $expectedPerimeter, array $coordinates): void
    {
        $plot = new Plot();
        foreach ($coordinates as $coordinate) {
            $plot->add($coordinate, 'A');
        }

        $this->assertSame(count($coordinates), $plot->calculateArea(), 'Area is wrong');
        $this->assertSame($expectedPerimeter, $plot->calculatePerimeter(), 'Perimeter is wrong');
    }

    public static function plotDataProvider(): array
    {
        return [
            [
                4,
                [new Coordinates(1, 1)],
            ],
            [
                10,
                [
                    new Coordinates(1, 1),
                    new Coordinates(2, 1),
                    new Coordinates(3, 1),
                    new Coordinates(4, 1),
                ],
            ],
            [
                8,
                [
                    new Coordinates(1, 1),
                    new Coordinates(1, 2),
                    new Coordinates(2, 1),
                    new Coordinates(2, 2),
                ],
            ],
        ];
    }
}
