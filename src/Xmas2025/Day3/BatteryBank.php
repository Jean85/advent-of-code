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
        return (int) implode($this->findBatteriesWithBestJoltage($this->batteries, 2));
    }

    public function findTwelveBatteriesWithBestJoltage(): int
    {
        return (int) implode($this->findBatteriesWithBestJoltage($this->batteries, 12));
    }

    /**
     * @param int[] $batteries
     * @param int[] $alreadyFoundBatteries
     *
     * @return int[]
     */
    private function findBatteriesWithBestJoltage(array $batteries, int $neededNumbers, array $alreadyFoundBatteries = []): array
    {
        --$neededNumbers;

        if ($neededNumbers === 0) {
            return [...$alreadyFoundBatteries, max($batteries)];
        }

        $remainders = array_slice($batteries, 0, -$neededNumbers);

        $newBattery = max($remainders);
        $alreadyFoundBatteries[] = $newBattery;
        $remainders = array_slice($batteries, 1 + array_search($newBattery, $batteries, true));

        return $this->findBatteriesWithBestJoltage($remainders, $neededNumbers, $alreadyFoundBatteries);
    }
}
