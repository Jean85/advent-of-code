<?php

declare(strict_types=1);

namespace Tests\Xmas2025\Day9;

use Jean85\AdventOfCode\Coordinates;
use Jean85\AdventOfCode\Xmas2025\Day9\Edge;
use Jean85\AdventOfCode\Xmas2025\Day9\HorizontalEdge;
use Jean85\AdventOfCode\Xmas2025\Day9\Rectangle;
use Jean85\AdventOfCode\Xmas2025\Day9\VerticalEdge;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class EdgeTest extends TestCase
{
    #[DataProvider('edgesDataProvider')]
    public function testCutsTrough(Edge $edge, Rectangle $rectangle): void
    {
        $this->assertTrue($edge->cutsTrough($rectangle));
    }

    /**
     * @return array{Edge, Rectangle}[]
     */
    public static function edgesDataProvider(): array
    {
        return [
            [
                new VerticalEdge(
                    new Coordinates(9, 5),
                    new Coordinates(9, 7),
                ),
                new Rectangle(
                    new Coordinates(11, 7),
                    new Coordinates(7, 1),
                ),
            ],
            [
                new HorizontalEdge(
                    new Coordinates(2, 3),
                    new Coordinates(7, 3),
                ),
                new Rectangle(
                    new Coordinates(2, 5),
                    new Coordinates(7, 1),
                ),
            ],
        ];
    }
}
