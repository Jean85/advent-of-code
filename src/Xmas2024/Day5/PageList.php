<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day5;

use Webmozart\Assert\Assert;

class PageList
{
    /** @var list<int> */
    public readonly array $list;

    public function __construct(string $input)
    {
        $list = [];

        foreach (explode(',', $input) as $pageNumber) {
            Assert::integerish($pageNumber);
            $list[] = (int) $pageNumber;
        }

        $this->list = $list;
    }

    public function isValidFor(OrderingRules $rules): bool
    {
        foreach ($this->list as $i => $pageNumber) {
            foreach (array_slice($this->list, $i + 1) as $nextPageNumber) {
                if ($nextPageNumber === $rules->shouldBeBefore($pageNumber)) {
                    return false;
                }

                if ($pageNumber === $rules->shouldBeAfter($nextPageNumber)) {
                    return false;
                }
            }
        }

        return true;
    }

    public function getMiddle(): int
    {
        return $this->list[max(array_keys($this->list)) / 2];
    }
}
