<?php

declare(strict_types=1);

namespace Tests\Xmas2024\Day11;

use Jean85\AdventOfCode\Xmas2024\Day11\Blinker;
use Jean85\AdventOfCode\Xmas2024\Day11\Stone;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class BlinkerTest extends TestCase
{
    #[DataProvider('stoneDataProvider')]
    public function testBlink(int $start, int $expectedCount, string $expectedString): void
    {
        $stone = new Stone($start, null);
        $blinker = new Blinker();

        $this->assertSame($expectedCount, $blinker->countStonesAfterBlinks($stone, 1));
        $blink = new STone($start, null);
        $blink->blink();
        $this->assertSame($expectedString, $blink->__toString());
    }

    public function testBlinkRegression(): void
    {
        $blinker = new Blinker();

        $this->assertSame(3, $blinker->countStonesAfterBlinks(new Stone(125, null), 4));
        $this->assertSame(6, $blinker->countStonesAfterBlinks(new Stone(17, null), 4));

        $this->assertSame(
            9,
            $blinker->countStonesAfterBlinks(new Stone(125, null), 4)
            + $blinker->countStonesAfterBlinks(new Stone(17, null), 4)
        );
    }

    public function testBlinkSequence(): void
    {
        $blinker = new Blinker();

        $this->assertSame(
            3,
            $blinker->countStonesAfterBlinks(new Stone(125, null), 1)
            + $blinker->countStonesAfterBlinks(new Stone(17, null), 1)
        );

        $this->assertSame(
            4,
            $blinker->countStonesAfterBlinks(new Stone(125, null), 2)
            + $blinker->countStonesAfterBlinks(new Stone(17, null), 2)
        );

        $this->assertSame(
            5,
            $blinker->countStonesAfterBlinks(new Stone(125, null), 3)
            + $blinker->countStonesAfterBlinks(new Stone(17, null), 3)
        );

        $this->assertSame(
            9,
            $blinker->countStonesAfterBlinks(new Stone(125, null), 4)
            + $blinker->countStonesAfterBlinks(new Stone(17, null), 4)
        );

        $this->assertSame(
            13,
            $blinker->countStonesAfterBlinks(new Stone(125, null), 5)
            + $blinker->countStonesAfterBlinks(new Stone(17, null), 5)
        );

        $this->assertSame(
            22,
            $blinker->countStonesAfterBlinks(new Stone(125, null), 6)
            + $blinker->countStonesAfterBlinks(new Stone(17, null), 6)
        );
    }

    public static function stoneDataProvider(): array
    {
        return [
            [0, 1, '1'],
            [1, 1, '2024'],
            [10, 2, '1 0'],
            [99, 2, '9 9'],
            [999, 1, '2021976'],
            [512_072, 2, '512 72'],
            [20, 2, '2 0'],
            [24, 2, '2 4'],
            [28_676_032, 2, '2867 6032'],
        ];
    }
}
