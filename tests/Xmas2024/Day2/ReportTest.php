<?php

declare(strict_types=1);

namespace Tests\Xmas2024\Day2;

use Jean85\AdventOfCode\Xmas2024\Day2\Report;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class ReportTest extends TestCase
{
    #[DataProvider('isMonotoneDataProvider')]
    public function testIsMonotone(string $input, bool $expected): void
    {
        $report = new Report($input);

        $this->assertSame($expected, $report->isMonotone());
    }

    public function testIsWithinRange(): void
    {
        $report = new Report('7 6 4 2 1');

        $this->assertTrue($report->isWithinRange());
    }

    #[DataProvider('isSafeDataProvider')]
    public function testIsSafe(string $input, bool $expected): void
    {
        $report = new Report($input);

        $this->assertSame($expected, $report->isSafe());
    }

    public static function isMonotoneDataProvider(): array
    {
        return [
            ['7 6 4 2 1', true],
            ['1 2 7 8 9', true],
            ['9 7 6 2 1', true],
            ['1 3 2 4 5', false],
            ['8 6 4 4 1', true],
            ['1 3 6 7 9', true],
        ];
    }

    public static function isSafeDataProvider(): array
    {
        return [
            ['7 6 4 2 1', true],
            ['1 2 7 8 9', false],
            ['9 7 6 2 1', false],
            ['1 3 2 4 5', false],
            ['8 6 4 4 1', false],
            ['1 3 6 7 9', true],
        ];
    }
}
