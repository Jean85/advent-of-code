<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2025\Day2;

class Range
{
    /**
     * @return self[]
     */
    public static function parse(string $input): array
    {
        $ranges = [];

        foreach (explode(',', $input) as $line) {
            [$start, $end] = explode('-', $line);
            $ranges[] = new Range((int) $start, (int) $end);
        }

        return $ranges;
    }

    public function __construct(
        public readonly int $start,
        public readonly int $end,
    ) {}

    /**
     * @return \Generator<int>
     */
    public function getWrongIds(): \Generator
    {
        foreach (range($this->start, $this->end) as $id) {
            if ($this->isWrong($id)) {
                yield $id;
            }
        }
    }

    private function isWrong(int $id): bool
    {
        $stringId = (string) $id;
        $strlen = strlen($stringId);
        if (($strlen % 2) !== 0) {
            return false;
        }

        $part1 = substr($stringId, 0, $strlen / 2);
        $part2 = substr($stringId, $strlen / 2);

        return $part1 === $part2;
    }

    /**
     * @return \Generator<int>
     */
    public function getWrongIdsWithBetterCheck(): \Generator
    {
        foreach (range($this->start, $this->end) as $id) {
            if ($this->isWrongWithBetterCheck($id)) {
                yield $id;
            }
        }
    }

    private function isWrongWithBetterCheck(int $id): bool
    {
        $stringId = (string) $id;
        $totalLength = strlen($stringId);

        for ($patternLength = 1; $patternLength <= (int) ($totalLength / 2); ++$patternLength) {
            // Only consider patterns that divide evenly into the total length
            // and result in at least 2 repetitions
            if ($totalLength % $patternLength !== 0) {
                continue;
            }

            $repetitions = $totalLength / $patternLength;
            if ($repetitions < 2) {
                continue;
            }

            $pattern = substr($stringId, 0, $patternLength);
            $expectedString = str_repeat($pattern, $repetitions);

            if ($stringId === $expectedString) {
                return true;
            }
        }

        return false;
    }
}
