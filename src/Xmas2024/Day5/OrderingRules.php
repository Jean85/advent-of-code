<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day5;

use Webmozart\Assert\Assert;

class OrderingRules
{
    /** @var array<int, list<int>> */
    private array $shouldBeAfter = [];
    /** @var array<int, list<int>> */
    private array $shouldBeBefore = [];

    public function __construct(string $input)
    {
        foreach (explode("\n", $input) as $line) {
            $pages = explode('|', $line);
            Assert::count($pages, 2);
            Assert::integerish($pages[0]);
            Assert::integerish($pages[1]);

            $this->shouldBeAfter[$pages[0]][] = (int) $pages[1];
            $this->shouldBeBefore[$pages[1]][] = (int) $pages[0];
        }
    }

    public function isSorted(int $first, int $second): bool
    {
        if (in_array($second, $this->shouldBeAfter[$first] ?? [], true)) {
            return true;
        }

        if (in_array($first, $this->shouldBeBefore[$second] ?? [], true)) {
            return true;
        }

        if (in_array($first, $this->shouldBeAfter[$second] ?? [], true)) {
            return false;
        }

        if (in_array($second, $this->shouldBeBefore[$first] ?? [], true)) {
            return false;
        }

        // it is not against any rule
        return true;
    }
}
