<?php

declare(strict_types=1);

namespace Tests\Xmas2025\Day2;

use Jean85\AdventOfCode\Xmas2025\Day2\Range;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class RangeTest extends TestCase
{
    #[DataProvider('rangeDataProvider')]
    public function testGetWrongId(int $start, int $end, array $expectedWrongIds): void
    {
        foreach ($expectedWrongIds as $expectedWrongId) {
            $this->assertGreaterThanOrEqual($start, $expectedWrongId);
            $this->assertLessThanOrEqual($end, $expectedWrongId);
        }

        $range = new Range($start, $end);

        $this->assertEquals($expectedWrongIds, iterator_to_array($range->getWrongIds()));
    }

    /**
     * @return array{int, int, int[]}[]
     */
    public static function rangeDataProvider(): array
    {
        return [
            [11, 22, [11, 22]],
            [95, 115, [99]],
            [998, 1_012, [1_010]],
            [1_188_511_880, 1_188_511_890, [1_188_511_885]],
            [222_220, 222_224, [222_222]],
            [1_698_522, 1_698_528, []],
            [446_443, 446_449, [446_446]],
            [38_593_856, 38_593_862, [38_593_859]],
            [565_653, 565_659, []],
            [824_824_821, 824_824_827, []],
            [2_121_212_118, 2_121_212_124, []],
        ];
    }
}
