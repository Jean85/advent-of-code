<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode;

enum Direction
{
    case Up;
    case UpLeft;
    case UpRight;
    case Down;
    case DownLeft;
    case DownRight;
    case Left;
    case Right;

    /**
     * @return self[]
     */
    public static function noDiagonals(): array
    {
        return [
            self::Up,
            self::Right,
            self::Down,
            self::Left,
        ];
    }
}
