<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2025\Day9;

interface Edge
{
    public function cutsTrough(Rectangle $rectangle): bool;
}
