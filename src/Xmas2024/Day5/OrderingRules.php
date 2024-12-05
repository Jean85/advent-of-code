<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day5;

use Webmozart\Assert\Assert;

class OrderingRules
{
    /** @var array<int, int> */
    private array $shouldBeAfter = [];
    /** @var array<int, int> */
    private array $shouldBeBefore = [];

    public function __construct(string $input)
    {
        foreach (explode("\n", $input) as $line) {
            $pages = explode('|', $line);
            Assert::count($pages, 2);
            Assert::integerish($pages[0]);
            Assert::integerish($pages[1]);

            $this->shouldBeAfter[$pages[0]] = (int) $pages[1];
            $this->shouldBeBefore[$pages[1]] = (int) $pages[0];
        }
    }

    public function sorting(int $a, int $b): int
    {
        if ($b === $this->shouldBeBefore($a)) {
            return -1;
        }

        if ($a === $this->shouldBeBefore($b)) {
            return 1;
        }

        return 0;
    }

    public function shouldBeAfter(int $i): ?int
    {
        return $this->shouldBeAfter[$i] ?? null;
    }

    public function shouldBeBefore(int $i): ?int
    {
        return $this->shouldBeBefore[$i] ?? null;
    }
}
