<?php

declare(strict_types=1);

namespace Tests\Xmas2024\Day23;

use Jean85\AdventOfCode\Xmas2024\Day23\Day23Solution;
use PHPUnit\Framework\TestCase;

class Day23SolutionTest extends TestCase
{
    public const string TEST_INPUT = 'kh-tc
qp-kh
de-cg
ka-co
yn-aq
qp-ub
cg-tb
vc-aq
tb-ka
wh-tc
yn-cg
kh-ub
ta-co
de-co
tc-td
tb-wq
wh-td
ta-ka
td-qp
aq-cg
wq-ub
ub-vc
de-ta
wq-aq
wq-vc
wh-yn
ka-de
kh-ta
co-tc
wh-qp
tb-vc
td-yn';

    public function test(): void
    {
        $Day23Solution = new Day23Solution();

        $this->assertSame('7', $Day23Solution->solve(self::TEST_INPUT));
    }

    public function testSecondPart(): void
    {
        $this->markTestIncomplete();
        $Day23Solution = new Day23Solution();

        $this->assertSame('81', $Day23Solution->solveSecondPart(self::TEST_INPUT));
    }
}
