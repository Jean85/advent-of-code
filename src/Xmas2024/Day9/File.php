<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day9;

class File
{
    public function __construct(
        public readonly int $id,
        public readonly int $length,
    ) {}
}
