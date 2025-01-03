<?php

declare(strict_types=1);

namespace Tests\Xmas2024\Day23;

use Jean85\AdventOfCode\Xmas2024\Day23\LanParty;
use PHPUnit\Framework\TestCase;

class LanPartyTest extends TestCase
{
    public function testFindSets(): void
    {
        $lanParty = new LanParty(Day23SolutionTest::TEST_INPUT);

        $expected = explode(PHP_EOL, 'aq,cg,yn
aq,vc,wq
co,de,ka
co,de,ta
co,ka,ta
de,ka,ta
kh,qp,ub
qp,td,wh
tb,vc,wq
tc,td,wh
td,wh,yn
ub,vc,wq');

        $sets = $lanParty->findSets();
        ksort($sets);
        $this->assertSame(
            array_map(static fn($a) => explode(',', $a), $expected),
            array_values($sets)
        );
    }
}
