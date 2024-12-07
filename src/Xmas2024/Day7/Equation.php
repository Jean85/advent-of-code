<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day7;

use Webmozart\Assert\Assert;

class Equation
{
    public readonly int $testValue;

    /** @var list<int> */
    public readonly array $numbers;

    public function __construct(string $input, public readonly bool $allowConcatenation = false)
    {
        [$testValue, $stringNumbers] = explode(':', $input);
        Assert::integerish($testValue);
        $this->testValue = (int) $testValue;

        $numbers = [];
        foreach (explode(' ', trim($stringNumbers)) as $number) {
            Assert::integerish($testValue);
            $numbers[] = (int) $number;
        }

        $this->numbers = $numbers;
    }

    public function isCombinable(): bool
    {
        $numbers = $this->numbers;
        $left = array_shift($numbers);

        return $this->calculateCombination($left, $numbers);
    }

    /**
     * @param int[] $numbers
     */
    private function calculateCombination(int $left, array $numbers): bool
    {
        if (empty($numbers)) {
            return $left === $this->testValue;
        }

        $right = array_shift($numbers);

        foreach (Operator::cases() as $operator) {
            if ($operator === Operator::Concatenation && ! $this->allowConcatenation) {
                continue;
            }

            $newLeft = match ($operator) {
                Operator::Add => $left + $right,
                Operator::Multiply => $left * $right,
                Operator::Concatenation => (int) ($left . $right),
            };

            if ($this->calculateCombination($newLeft, $numbers)) {
                return true;
            }
        }

        return false;
    }
}
