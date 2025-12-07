<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2025\Day7;

enum MapTile: string
{
    case Space = '.';
    case Start = 'S';
    case Splitter = '^';
}
