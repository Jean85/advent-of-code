<?php

declare(strict_types=1);

namespace Tests\Xmas2025\Day8;

use Jean85\AdventOfCode\Xmas2025\Day8\CircuitMap;
use PHPUnit\Framework\TestCase;

class CircuitMapTest extends TestCase
{
    public function testParse(): void
    {
        $circuitMap = CircuitMap::parse(Day8SolutionTest::TEST_INPUT);

        $this->assertSame(20, $circuitMap->countCircuits());
    }

    public function testTick(): void
    {
        $circuitMap = CircuitMap::parse(Day8SolutionTest::TEST_INPUT);
        $this->assertSame(20, $circuitMap->countCircuits());

        $this->assertSame('162,817,812-425,690,689', $circuitMap->connectTwoNearestBoxes());
        $this->assertSame(19, $circuitMap->countCircuits());

        $this->assertSame('162,817,812-431,825,988', $circuitMap->connectTwoNearestBoxes());
        $this->assertSame(18, $circuitMap->countCircuits());

        $this->assertSame('805,96,715-906,360,560', $circuitMap->connectTwoNearestBoxes());
        $this->assertSame(17, $circuitMap->countCircuits());

        // 4 to 10
        $circuitMap->connectTwoNearestBoxes();
        $circuitMap->connectTwoNearestBoxes();
        $circuitMap->connectTwoNearestBoxes();
        $circuitMap->connectTwoNearestBoxes();
        $circuitMap->connectTwoNearestBoxes();
        $circuitMap->connectTwoNearestBoxes();
        $circuitMap->connectTwoNearestBoxes();

        $this->assertSame(11, $circuitMap->countCircuits());
        $this->assertSame(40, $circuitMap->multiplyTopThreeCircuits());
    }
}
