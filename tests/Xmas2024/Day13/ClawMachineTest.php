<?php

declare(strict_types=1);

namespace Tests\Xmas2024\Day13;

use Jean85\AdventOfCode\Coordinates;
use Jean85\AdventOfCode\Xmas2024\Day13\ClawMachine;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class ClawMachineTest extends TestCase
{
    public function testConstruct(): void
    {
        $input = 'Button A: X+94, Y+34
Button B: X+22, Y+67
Prize: X=8400, Y=5400';
        $clawMachine = new ClawMachine($input);

        $this->assertEquals(new Coordinates(94, 34), $clawMachine->buttonA);
        $this->assertEquals(new Coordinates(22, 67), $clawMachine->buttonB);
        $this->assertEquals(new Coordinates(8_400, 5_400), $clawMachine->prize);
    }

    #[DataProvider('clawMachineProvider')]
    public function testCalculateMinimumCost(int $expectedCost, string $input): void
    {
        $clawMachine = new ClawMachine($input);

        $this->assertSame($expectedCost, $clawMachine->calculateMinimumCost());
    }

    public static function clawMachineProvider(): array
    {
        return [
            [
                280,
                'Button A: X+94, Y+34
Button B: X+22, Y+67
Prize: X=8400, Y=5400',
            ],
            [
                0,
                'Button A: X+26, Y+66
Button B: X+67, Y+21
Prize: X=12748, Y=12176',
            ],
            [
                200,
                'Button A: X+17, Y+86
Button B: X+84, Y+37
Prize: X=7870, Y=6450',
            ],
            [
                0,
                'Button A: X+69, Y+23
Button B: X+27, Y+71
Prize: X=18641, Y=10279',
            ],
        ];
    }
}
