<?php

declare(strict_types=1);

namespace Tests\Xmas2025\Day10;

use Jean85\AdventOfCode\Xmas2025\Day10\Machine;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class MachineTest extends TestCase
{
    #[DataProvider('machineDataProvider')]
    public function testMachine(int $expected, string $input): void
    {
        $machine = Machine::parse($input);

        $this->assertSame($expected, $machine->countMinButtonPressesForJoltage());
    }

    /**
     * @return array{int, string}[]
     */
    public static function machineDataProvider(): array
    {
        return [
            [10, '[.##.] (3) (1,3) (2) (2,3) (0,2) (0,1) {3,5,4,7}'],
            [12, '[...#.] (0,2,3,4) (2,3) (0,4) (0,1,2) (1,2,3,4) {7,5,12,7,2}'],
            [11, '[.###.#] (0,1,2,3,4) (0,3,4) (0,1,2,4,5) (1,2) {10,11,11,5,10,5}'],
        ];
    }
}
