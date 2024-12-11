<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day11;

class Stone implements \Stringable
{
    public function __construct(
        public int $number,
        public ?self $next,
    ) {}

    public function __toString(): string
    {
        return trim($this->number . ' ' . $this->next?->__toString());
    }

    public function blink(): void
    {
        if ($this->number === 0) {
            $this->number = 1;

            $this->next?->blink();

            return;
        }

        if (strlen((string) $this->number) % 2 === 0) {
            [$first, $second] = str_split((string) $this->number, strlen((string) $this->number) / 2);
            $this->number = (int) $first;
            $next = $this->next;
            $this->next = new self((int) $second, $next);

            $next?->blink();

            return;
        }

        $this->number *= 2_024;

        $this->next?->blink();
    }

    public function count(): int
    {
        return 1 + ($this->next?->count() ?? 0);
    }
}
