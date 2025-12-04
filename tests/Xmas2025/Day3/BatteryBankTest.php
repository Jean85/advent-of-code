<?php

declare(strict_types=1);

namespace Tests\Xmas2025\Day3;

use Jean85\AdventOfCode\Xmas2025\Day3\BatteryBank;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class BatteryBankTest extends TestCase
{
    #[DataProvider('singleBatteryBankDataProvider')]
    public function testFindTwoBatteriesWithBestJoltage(int $expectedJoltage, string $input): void
    {
        $batteryBanks = BatteryBank::create($input);

        $this->assertCount(1, $batteryBanks);
        $batteryBank = $batteryBanks[0];

        $this->assertEquals($expectedJoltage, $batteryBank->findTwoBatteriesWithBestJoltage());
    }

    /**
     * @return array{int, numeric-string}[]
     */
    public static function singleBatteryBankDataProvider(): array
    {
        return [
            [98, '987654321111111'],
            [89, '811111111111119'],
            [78, '234234234234278'],
            [92, '818181911112111'],
        ];
    }
}
