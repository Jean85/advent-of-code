<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day16;

enum Terrain: string
{
    case Start = 'S';
    case End = 'E';
    case Plain = '.';
    case Wall = '#';
}
