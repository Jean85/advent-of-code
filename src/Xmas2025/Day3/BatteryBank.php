<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2025\Day3;

class BatteryBank
{
    /** @var int[] */
    public readonly array $batteries;

    /**
     * @return self[]
     */
    public static function create(string $input): array
    {
        $rows = explode("\n", $input);
        $banks = [];

        foreach ($rows as $row) {
            $banks[] = new self(...array_map(intval(...), str_split($row)));
        }

        return $banks;
    }

    public function __construct(int ...$batteries)
    {
        $this->batteries = $batteries;
    }

    public function findTwoBatteriesWithBestJoltage(): int
    {
        $highestValue = max($this->batteries);
        $remainderAfterHighestValue = array_slice($this->batteries, 1 + array_search($highestValue, $this->batteries, true));
        if (count($remainderAfterHighestValue) > 0) {
            $secondBattery = max($remainderAfterHighestValue);

            return (10 * $highestValue) + $secondBattery;
        }

        // $highestValue is the last element of the bank, we can't select it as first digit
        // let's use it as the second digit

        $firstDigit = max(array_slice($this->batteries, 0, count($this->batteries) - 1));

        return (10 * $firstDigit) + $highestValue;
    }
}
