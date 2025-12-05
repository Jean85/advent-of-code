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
}
