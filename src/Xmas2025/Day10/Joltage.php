<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2025\Day10;

class Joltage implements \Stringable
{
    /** @var list<positive-int|0> */
    public readonly array $joltages;

    public function __construct(int ...$joltages)
    {
        $this->joltages = $joltages;
    }

    public static function fromString(string $input): self
    {
        return new self(...array_map('intval', explode(',', $input)));
    }

    public function isAllZero(): bool
    {
        return array_all($this->joltages, static fn(int $i): bool => $i === 0);
    }

    public function __toString(): string
    {
        return implode(',', $this->joltages);
    }

    public function convertToIndicatorLights(): IndicatorLights
    {
        return new IndicatorLights(
            array_map(static fn(int $i) => (bool) ($i % 2), $this->joltages)
        );
    }

    public function subtract(self $subtractor): self
    {
        $newJoltages = $this->joltages;

        foreach ($subtractor->joltages as $i => $valueToSubtract) {
            $newJoltages[$i] -= $valueToSubtract;
            if ($newJoltages[$i] < 0) {
                throw new \InvalidArgumentException('Button presses sent joltages in the negative');
            }
        }

        return new self(...$newJoltages);
    }

    public function isAllEven(): bool
    {
        return array_all($this->joltages, static fn(int $i): bool => ($i % 2) === 0);
    }

    public function half(): self
    {
        if (! $this->isAllEven()) {
            throw new \RuntimeException('Cannot halve an odd joltage');
        }

        return new self(...array_map(static fn(int $i): int => $i / 2, $this->joltages));
    }

    public function canSubtract(self $subtractor): bool
    {
        foreach ($subtractor->joltages as $i => $valueToSubtract) {
            if ($valueToSubtract > $this->joltages[$i]) {
                return false;
            }
        }

        return true;
    }

    public function hasSameParity(Joltage $other)
    {
        foreach ($other->joltages as $i => $valueToCompare) {
            if (($valueToCompare % 2) !== ($this->joltages[$i] % 2)) {
                return false;
            }
        }

        return true;
    }
}
