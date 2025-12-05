<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2025\Day5;

class IngredientRanges
{
    /**
     * @var list<array{int, int}>
     */
    private array $ranges = [];
    public static function parse(string $input): self
    {
        $ranges = new self();

        foreach (explode("\n", $input) as $line) {
            $ranges->ranges[] = array_map('intval', explode('-', $line));
        }

        return $ranges;
    }

    public function isInRange(int $ingredient): bool
    {
        return array_any(
            $this->ranges,
            fn(array $range): bool => $ingredient >= $range[0] && $ingredient <= $range[1]
        );
    }

    public function countValidIngredients(): int
    {
        $valid = 0;

        foreach ($this->mergeRanges($this->ranges) as $range) {
            $valid += 1 + $range[1] - $range[0];
        }

        return $valid;
    }

    /**
     * @param array{int, int}[] $ranges
     *
     * @return array{int, int}[]
     */
    private function mergeRanges(array $ranges): array
    {
        $mergedRanges = [];
        while ($rangeToMerge = array_shift($ranges)) {
            foreach ($mergedRanges as $i => $range) {
                if ($this->areOverlapping($range, $rangeToMerge)) {
                    $rangeToMerge = $this->merge($range, $rangeToMerge);
                    unset($mergedRanges[$i]);
                }
            }

            $mergedRanges[] = $rangeToMerge;
        }

        return $mergedRanges;
    }

    /**
     * @param array{int, int} $rangeA
     * @param array{int, int} $rangeB
     */
    private function areOverlapping(array $rangeA, array $rangeB): bool
    {
        return ($rangeA[0] >= $rangeB[0] && $rangeA[0] <= $rangeB[1])
            || ($rangeA[1] >= $rangeB[0] && $rangeA[1] <= $rangeB[1])
            || ($rangeB[0] >= $rangeA[0] && $rangeB[0] <= $rangeA[1])
            || ($rangeB[1] >= $rangeA[0] && $rangeB[1] <= $rangeA[1])
        ;
    }

    /**
     * @param array{int, int} $rangeA
     * @param array{int, int} $rangeB
     *
     * @return array{int, int}
     */
    private function merge(array $rangeA, array $rangeB): array
    {
        return [
            min($rangeA[0], $rangeB[0]),
            max($rangeA[1], $rangeB[1]),
        ];
    }
}
