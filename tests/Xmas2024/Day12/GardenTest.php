<?php

declare(strict_types=1);

namespace Tests\Xmas2024\Day12;

use Jean85\AdventOfCode\Xmas2024\Day12\Garden;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class GardenTest extends TestCase
{
    public function testCalculateFenceCost(): void
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

    #[DataProvider('discountedDataProvider')]
    public function testCalculateFenceDiscountedCost(int $expectedCost, string $input): void
    {
        $garden = Garden::createFrom($input);

        $this->assertCount(3, $garden->getPlots());
        $this->assertSame($expectedCost, $garden->calculateFenceDiscountedCost());
    }

    public static function discountedDataProvider(): array
    {
        return [
            [
                236,
                'EEEEE
EXXXX
EEEEE
EXXXX
EEEEE',
            ],
            'with inner holes' => [
                368,
                'AAAAAA
AAABBA
AAABBA
ABBAAA
ABBAAA
AAAAAA',
            ],
        ];
    }
}
