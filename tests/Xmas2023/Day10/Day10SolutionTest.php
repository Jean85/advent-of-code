<?php

declare(strict_types=1);

namespace Tests\Xmas2023\Day10;

use Jean85\AdventOfCode\Xmas2023\Day10\Day10Solution;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class Day10SolutionTest extends TestCase
{
    public const SQUARE_MAP = '.....
.S-7.
.|.|.
.L-J.
.....';
    public const MORE_COMPLEX_MAP = '..F7.
.FJ|.
SJ.L7
|F--J
LJ...';

    #[DataProvider('partOneDataProvider')]
    public function test(string $input, string $expected): void
    {
        $Day10Solution = new Day10Solution();

        $this->assertSame($expected, $Day10Solution->solve($input));
    }

    public static function partOneDataProvider(): array
    {
        return [
            [self::SQUARE_MAP, '4'],
            [self::MORE_COMPLEX_MAP, '8'],
        ];
    }

    public function testSecondPart(): void
    {
        $this->markTestIncomplete();
        $Day10Solution = new Day10Solution();

        $this->assertSame('2', $Day10Solution->solveSecondPart($this->getInput()));
    }
}
