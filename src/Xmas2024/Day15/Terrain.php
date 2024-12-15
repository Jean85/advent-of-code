<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day15;

enum Terrain: string
{
    case Wall = '#';
    case Box = 'O';
    case Robot = '@';
    case Plain = '.';
}
