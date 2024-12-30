<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day20;

enum Terrain: string
{
    case Track = '.';
    case Wall = '#';
    case Start = 'S';
    case End = 'E';
}
