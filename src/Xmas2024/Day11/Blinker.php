<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day11;

use Webmozart\Assert\Assert;

class Blinker
{
    /** @var array<int, array<int, int>> */
    private array $cache = [];

    public function countStonesAfterBlinks(Stone $stone, int $blinks): int
    {
        Assert::null($stone->next);

        if ($blinks === 0) {
            return 1;
        }

        $number = $stone->number;
        if (isset($this->cache[$blinks][$number])) {
            return $this->cache[$blinks][$number];
        }

        $stone->blink();

        return $this->cache[$blinks][$number] = $this->countStones($stone, $blinks);
    }

    private function countStones(Stone $stone, int $blinks): int
    {
        $count = 0;

        do {
            $count += $this->countStonesAfterBlinks(new Stone($stone->number, null), $blinks - 1);
            $stone = $stone->next;
        } while ($stone);

        return $count;
    }
}
