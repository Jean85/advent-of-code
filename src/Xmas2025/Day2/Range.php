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
}
