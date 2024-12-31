<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day21;

enum Key: string
{
    case Zero = '0';
    case One = '1';
    case Two = '2';
    case Three = '3';
    case Four = '4';
    case Five = '5';
    case Six = '6';
    case Seven = '7';
    case Eight = '8';
    case Nine = '9';
    case Activate = 'A';
    case Up = '^';
    case Down = 'v';
    case Left = '<';
    case Right = '>';
}
