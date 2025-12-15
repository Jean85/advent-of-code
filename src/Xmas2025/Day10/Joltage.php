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

    /**
     * @param Button[] $pressedButtons
     */
    public function subtract(array $pressedButtons): self
    {
        $joltages = $this->joltages;

        foreach ($pressedButtons as $pressed) {
            foreach ($pressed->buttons as $button => $true) {
                --$joltages[$button];

                if ($joltages[$button] < 0) {
                    throw new \InvalidArgumentException('Button presses sent joltages in the negative');
                }
            }
        }

        return new self(...$joltages);
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
}
