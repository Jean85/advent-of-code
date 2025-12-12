<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2025\Day11;

class Device
{
    public function __construct(
        public readonly string $name,
        /** @var self[] */
        public array $outputs,
    ) {}
}
