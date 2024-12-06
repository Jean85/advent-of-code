<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day6;

enum Terrain: string
{
    case Plain = '.';
    case Obstacle = '#';
    case Visited = 'X';
}
