<?php

declare(strict_types=1);

namespace Tests\Xmas2024\Day9;

use Jean85\AdventOfCode\Xmas2024\Day9\FileSystem;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class FileSystemTest extends TestCase
{
    #[DataProvider('diskMapProvider')]
    public function testDefrag(string $input, string $expected, string $compressed): void
    {
        $fileSystem = new FileSystem($input);

        $this->assertSame($expected, $fileSystem->getBlocks());

        $fileSystem->defrag();

        $this->assertSame($compressed, $fileSystem->getBlocks());
    }

    public static function diskMapProvider(): array
    {
        $noSpace = str_repeat('0', 9)
            . str_repeat('1', 9)
            . str_repeat('2', 9)
        ;

        return [
            ['12345', '0..111....22222', '022111222'],
            ['90909', $noSpace, $noSpace],
            ['2333133121414131402', '00...111...2...333.44.5555.6666.777.888899', '0099811188827773336446555566'],
        ];
    }
}
