<?php

declare(strict_types=1);

namespace Tests\Xmas2025\Day11;

use Jean85\AdventOfCode\Xmas2025\Day11\Day11Solution;
use PHPUnit\Framework\TestCase;

class Day11SolutionTest extends TestCase
{
    public const string TEST_INPUT = 'aaa: you hhh
you: bbb ccc
bbb: ddd eee
ccc: ddd eee fff
ddd: ggg
eee: out
fff: out
ggg: out
hhh: ccc fff iii
iii: out';

    public function test(): void
    {
        $Day11Solution = new Day11Solution();

        $this->assertSame('5', $Day11Solution->solve(self::TEST_INPUT));
    }

    public function testSecondPart(): void
    {
        $input = 'svr: aaa bbb
aaa: fft
fft: ccc
bbb: tty
tty: ccc
ccc: ddd eee
ddd: hub
hub: fff
eee: dac
dac: fff
fff: ggg hhh
ggg: out
hhh: out';
        $Day11Solution = new Day11Solution();

        $this->assertSame('2', $Day11Solution->solveSecondPart($input));
    }
}
