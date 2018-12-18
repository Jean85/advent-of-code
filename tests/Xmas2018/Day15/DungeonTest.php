<?php

declare(strict_types=1);

namespace Tests\Xmas2018\Day15;

use Jean85\AdventOfCode\Xmas2018\Day15\Dungeon;
use Jean85\AdventOfCode\Xmas2018\Day15\Elf;
use Jean85\AdventOfCode\Xmas2018\Day15\Goblin;
use PHPUnit\Framework\TestCase;

class DungeonTest extends TestCase
{
    /**
     * @dataProvider actualSituationDataProvider
     */
    public function testGetActualSituation(string $input, int $expectedElfCount, int $expectedGoblinCount): void
    {
        $dungeon = new Dungeon($input);

        $this->assertSame($input, $dungeon->getActualSituation());
        $this->assertCount($expectedElfCount, $dungeon->getElves());
        $this->assertCount($expectedGoblinCount, $dungeon->getGoblins());
    }

    public function actualSituationDataProvider(): array
    {
        return [
            ["###\n#.#\n###", 0, 0],
            ["###\n#E#\n###", 1, 0],
            ["###\n#G#\n###", 0, 1],
        ];
    }

    public function testGetActualSituationMapsWarriorsCorrectly(): void
    {
        $input = '#######
#.E...#
#..#..#
#..#G.#
#######';

        $dungeon = new Dungeon($input);

        $this->assertSame($input, $dungeon->getActualSituation());
        $this->assertCount(1, $dungeon->getElves());
        $this->assertCount(1, $dungeon->getGoblins());

        $elf = $dungeon->getElves()[0];
        $this->assertInstanceOf(Elf::class, $elf);
        $this->assertSame(2, $elf->getX());
        $this->assertSame(1, $elf->getY());

        $goblin = $dungeon->getGoblins()[0];
        $this->assertInstanceOf(Goblin::class, $goblin);
        $this->assertSame(4, $goblin->getX());
        $this->assertSame(3, $goblin->getY());
    }

    /**
     * @dataProvider tickDataProvider
     */
    public function testTick(string $initialSituation, string $expectedSituation): void
    {
        $dungeon = new Dungeon($initialSituation);

        $dungeon->tick();

        $this->assertSame($expectedSituation, $dungeon->getActualSituation());
    }

    public function tickDataProvider(): array
    {
        return [
            'simple with obstacle' => [
                '#######
#.E...#
#..#..#
#..#G.#
#######',
                '#######
#..E..#
#..#G.#
#..#..#
#######',
            ],
            'only 2 goblins' => [
                '#########
#...G...#
#.......#
#.......#
#G..E...#
#.......#
#.......#
#.......#
#########',
                '#########
#.......#
#...G...#
#...E...#
#.G.....#
#.......#
#.......#
#.......#
#########',
            ],
            'only 2 goblins, step 2' => [
                '#########
#.......#
#...G...#
#...E...#
#.G.....#
#.......#
#.......#
#.......#
#########',
                '#########
#.......#
#...G...#
#.G.E...#
#.......#
#.......#
#.......#
#.......#
#########',
            ],
            'example from the site' => [
                '#########
#G..G..G#
#.......#
#.......#
#G..E..G#
#.......#
#.......#
#G..G..G#
#########',
                '#########
#.G...G.#
#...G...#
#...E..G#
#.G.....#
#.......#
#G..G..G#
#.......#
#########',
            ],
            [
                '#########
#.G...G.#
#...G...#
#...E..G#
#.G.....#
#.......#
#G..G..G#
#.......#
#########',
                '#########
#..G.G..#
#...G...#
#.G.E.G.#
#.......#
#G..G..G#
#.......#
#.......#
#########',
            ],
            'last step from example' => [
                '#########
#..G.G..#
#...G...#
#.G.E.G.#
#.......#
#G..G..G#
#.......#
#.......#
#########',
                '#########
#.......#
#..GGG..#
#..GEG..#
#G..G...#
#......G#
#.......#
#.......#
#########',
            ],
        ];
    }

    /**
     * @dataProvider getTotalHealthProvider
     */
    public function testGetOutcome(string $input, string $expectedSituation, int $expectedOutcome, int $expectedTurn, int $expectedTotalHP): void
    {
        $this->assertSame($expectedOutcome, $expectedTotalHP * $expectedTurn, 'BAD PROVIDER');

        $dungeon = new Dungeon($input);

        $turns = 0;
        while ($dungeon->tick()) {
            ++$turns;
        }

        $this->assertSame($expectedSituation, $dungeon->getActualSituation());
        $this->assertSame($expectedTurn, $turns);
        $this->assertSame($expectedTotalHP, $dungeon->getTotalHealth());
        $this->assertSame($expectedOutcome, $dungeon->getTotalHealth() * $turns);
    }

    public function getTotalHealthProvider()
    {
        return[
            [
                '#######   
#.G...#
#...EG#
#.#.#G#
#..G#E#
#.....#
#######',
                '#######   
#G....#
#.G...#
#.#.#G#
#...#.#
#....G#
#######',
                27730, 47, 590,
            ],
            [
                '#######
#G..#E#
#E#E.E#
#G.##.#
#...#E#
#...E.#
#######',
                '#######
#...#E#
#E#...#
#.E##.#
#E..#E#
#.....#
#######',
                36334, 37, 982,
            ],
            [
                '#######   
#E..EG#
#.#G.E#
#E.##E#
#G..#.#
#..E#.#
#######',
                '#######
#.E.E.#
#.#E..#
#E.##.#
#.E.#.#
#...#.#
#######',
                39514, 46, 859,
            ],
            [
                '#######   
#E.G#.#
#.#G..#
#G.#.G#   
#G..#.#
#...E.#
#######',
                '#######   
#G.G#.#
#.#G..#
#..#..#
#...#G#
#...G.#
#######',
                27755, 35, 793,
            ],
            [
                '#######   
#.E...#   
#.#..G#
#.###.#   
#E#G#G#   
#...#G#
#######',
                '#######   
#.....#
#.#G..#
#.###.#
#.#.#.#
#G.G#G#
#######',
                28944, 54, 536,
            ],
            [
                '#########
#G......#
#.E.#...#
#..##..G#
#...##..#   
#...#...#
#.G...G.#   
#.....G.#   
#########',
                '#########   
#.G.....#
#G.G#...#
#.G##...#
#...##..#
#.G.#...#
#.......#
#.......#
#########',
                18740, 20, 937,
            ],
        ];
    }
}
