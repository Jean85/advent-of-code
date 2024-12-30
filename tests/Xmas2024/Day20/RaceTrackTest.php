<?php

declare(strict_types=1);

namespace Tests\Xmas2024\Day20;

use Jean85\AdventOfCode\Xmas2024\Day20\RaceTrack;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class RaceTrackTest extends TestCase
{
    public function testCalculateShortestFairPath(): void
    {
        $raceTrack = new RaceTrack(Day20SolutionTest::TEST_INPUT);

        $this->assertSame(84, $raceTrack->calculateShortestFairPath());
    }

    #[DataProvider('validCheatsProvider')]
    public function testCountPossibleCheatsSavingAtLeast(int $picoseconds, int $expectedValidCheats): void
    {
        $raceTrack = new RaceTrack(Day20SolutionTest::TEST_INPUT);

        $this->assertSame($expectedValidCheats, $raceTrack->countPossibleCheatsSavingAtLeast($picoseconds));
    }

    #[DataProvider('validAdvancedCheatsProvider')]
    public function testCountPossibleAdvancedCheatsSavingAtLeast(int $picoseconds, int $expectedValidCheats): void
    {
        $raceTrack = new RaceTrack(Day20SolutionTest::TEST_INPUT);

        $this->assertSame($expectedValidCheats, $raceTrack->countPossibleAdvancedCheatsSavingAtLeast($picoseconds));
    }

    public static function validCheatsProvider(): array
    {
        $i = 1;

        return [
            [64, $i],
            [40, ++$i],
            [38, ++$i],
            [36, ++$i],
            [20, ++$i],
            [12, $i += 3],
            [10, $i += 2],
            [8, $i += 4],
            [6, $i += 2],
            [4, $i += 14],
            [2, $i += 14],
        ];
    }

    public static function validAdvancedCheatsProvider(): array
    {
        $i = 0;

        return [
            [76, $i += 3],
            [74, $i += 4],
            [72, $i += 22],
            [70, $i += 12],
            [68, $i += 14],
            [66, $i += 12],
            [64, $i += 19],
            [62, $i += 20],
            [60, $i += 23],
            [58, $i += 25],
            [56, $i += 39],
            [54, $i += 29],
            [52, $i += 31],
            [50, $i += 32],
        ];
    }
}
