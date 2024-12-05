<?php

declare(strict_types=1);

namespace Tests\Xmas2024\Day5;

use Jean85\AdventOfCode\Xmas2024\Day5\OrderingRules;
use Jean85\AdventOfCode\Xmas2024\Day5\PageList;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class PageListTest extends TestCase
{
    public function testGetMiddle(): void
    {
        $pageList = new PageList('75,47,61,53,29');

        $this->assertSame(61, $pageList->getMiddle());
    }

    #[DataProvider('listDataProvider')]
    public function testIsValid(string $input, bool $isValid): void
    {
        $pageList = new PageList($input);

        $this->assertSame($isValid, $pageList->isValidFor($this->getOrderingRules()));
    }

    #[DataProvider('sortDataProvider')]
    public function testSort(string $input, string $sorted, int $middle): void
    {
        $pageList = new PageList($input);

        $pageList->sort($this->getOrderingRules());

        $this->assertSame($sorted, implode(',', $pageList->list));
        $this->assertSame($middle, $pageList->getMiddle());
    }

    public static function listDataProvider(): array
    {
        return [
            ['75,47,61,53,29', true],
            ['97,61,53,29,13', true],
            ['75,29,13', true],
            ['75,97,47,61,53', false],
            ['61,13,29', false],
            ['97,13,75,29,47', false],
        ];
    }

    public static function sortDataProvider(): array
    {
        return [
            ['75,97,47,61,53', '97,75,47,61,53', 47],
            ['61,13,29', '61,29,13', 29],
            ['97,13,75,29,47', '97,75,47,29,13', 47],
        ];
    }

    private function getOrderingRules(): OrderingRules
    {
        return new OrderingRules('47|53
97|13
97|61
97|47
75|29
61|13
75|53
29|13
97|29
53|29
61|53
97|53
61|29
47|13
75|47
97|75
47|61
75|61
47|29
75|13
53|13');
    }
}
