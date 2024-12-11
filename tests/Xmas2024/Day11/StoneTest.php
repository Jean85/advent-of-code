<?php

declare(strict_types=1);

namespace Tests\Xmas2024\Day11;

use Jean85\AdventOfCode\Xmas2024\Day11\Stone;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class StoneTest extends TestCase
{
    #[DataProvider('stoneDataProvider')]
    public function testBlink(int $start, string $expected): void
    {
        $stone = new Stone($start, null);
        $this->assertSame((string) $start, $stone->__toString());

        $stone->blink();

        $this->assertSame($expected, $stone->__toString());
    }

    public static function stoneDataProvider(): array
    {
        return [
            [0, '1'],
            [1, '2024'],
            [10, '1 0'],
            [99, '9 9'],
            [999, '2021976'],
        ];
    }
}
