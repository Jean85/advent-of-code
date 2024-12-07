<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day7;

enum Operator: string
{
    case Add = '+';
    case Multiply = '*';

    case Concatenation = '||';
}
