<?php

declare(strict_types=1);

namespace Tests\Xmas2024\Day21;

use Jean85\AdventOfCode\Xmas2024\Day21\DoorKeypad;
use Jean85\AdventOfCode\Xmas2024\Day21\RobotKeypad;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class RobotKeypadTest extends TestCase
{
    #[DataProvider('singleLevelShortPossibleSolutionsDataProvider')]
    public function testOneLevel(string $code, string $shortPossibleSolution): void
    {
        $robotKeypad = new RobotKeypad(new DoorKeypad());

        $this->assertSame(strlen($shortPossibleSolution), strlen($robotKeypad->calculateInstructions($code)));
    }

    public static function singleLevelShortPossibleSolutionsDataProvider(): array
    {
        return [
            ['029A', 'v<<A>>^A<A>AvA<^AA>A<vAAA>^A'],
            ['980A', '<AAA>Av<<A>>^A<vAAA>^AvA^A'],
            ['179A', '<Av<AA>>^A<AA>AvAA^A<vAAA>^A'],
            ['456A', '<AAv<AA>>^AvA^AvA^A<vAA>^A'],
            ['379A', '<A>Av<<AA>^AA>AvAA^A<vAAA>^A'],
        ];
    }

    #[DataProvider('multiLevelShortPossibleSolutionsDataProvider')]
    public function testPartOneLevels(string $code, string $shortestPossibleSolution): void
    {
        $robotKeypad = new RobotKeypad(
            new RobotKeypad(
                new DoorKeypad()
            )
        );

        $this->assertSame(strlen($shortestPossibleSolution), strlen($robotKeypad->calculateInstructions($code)));
    }

    public static function multiLevelShortPossibleSolutionsDataProvider(): array
    {
        return [
            ['029A', '<vA<AA>>^AvAA<^A>A<v<A>>^AvA^A<vA>^A<v<A>^A>AAvA^A<v<A>A>^AAAvA<^A>A'],
            ['980A', '<v<A>>^AAAvA^A<vA<AA>>^AvAA<^A>A<v<A>A>^AAAvA<^A>A<vA>^A<A>A'],
            ['179A', '<v<A>>^A<vA<A>>^AAvAA<^A>A<v<A>>^AAvA^A<vA>^AA<A>A<v<A>A>^AAAvA<^A>A'],
            ['456A', '<v<A>>^AA<vA<A>>^AAvAA<^A>A<vA>^A<A>A<vA>^A<A>A<v<A>A>^AAvA<^A>A'],
            'wtf' => ['379A', '<v<A>>^AvA^A<vA<AA>>^AAvA<^A>AAvA^A<vA>^AA<A>A<v<A>A>^AAAvA<^A>A'],
        ];
    }
}
