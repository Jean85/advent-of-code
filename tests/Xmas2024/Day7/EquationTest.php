<?php

declare(strict_types=1);

namespace Tests\Xmas2024\Day7;

use Jean85\AdventOfCode\Xmas2024\Day7\Equation;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class EquationTest extends TestCase
{
    public static function equationDataProvider(): array
    {
        return [
            [true, '190: 10 19'],
            [true, '3267: 81 40 27'],
            [false, '83: 17 5'],
            [false, '156: 15 6'],
            [false, '7290: 6 8 6 15'],
            [false, '161011: 16 10 13'],
            [false, '192: 17 8 14'],
            [false, '21037: 9 7 18 13'],
            [true, '292: 11 6 16 20'],
        ];
    }

    #[DataProvider('equationDataProvider')]
    public function testIsCombinable(bool $expected, string $input): void
    {
        $equation = new Equation($input);

        $this->assertSame($expected, $equation->isCombinable());
    }
}
