<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day17;

enum Instruction: int
{
    case adv = 0;
    case bxl = 1;
    case bst = 2;
    case jnz = 3;
    case bxc = 4;
    case out = 5;
    case bdv = 6;
    case cdv = 7;
}
