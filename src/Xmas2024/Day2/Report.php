<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day2;

class Report
{
    /**
     * @var string[]
     */
    private array $values;

    public function __construct(string $input)
    {
        $this->values = explode(' ', $input);
    }

    public function isSafe(): bool
    {
        return $this->isMonotone() && $this->isWithinRange();
    }

    public function isMonotone(): bool
    {
        $sorted = $this->values;
        sort($sorted);
        $reversed = array_reverse($sorted);

        return $this->values == $sorted
            || $this->values == $reversed;
    }

    public function isWithinRange(): bool
    {
        foreach ($this->values as $i => $value) {
            if (! isset($this->values[$i + 1])) {
                return true;
            }

            $distance = abs($this->values[$i + 1] - $value);

            if ($distance < 1 || $distance > 3) {
                return false;
            }
        }
    }
}
