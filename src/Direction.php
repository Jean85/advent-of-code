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

    public function turnClockWise(): self
    {
        return match ($this) {
            self::Up => self::Right,
            self::Down => self::Left,
            self::Left => self::Up,
            self::Right => self::Down,
            default => throw new \Exception('Diagonals to be implemented'),
        };
    }

    public function turnCounterClockWise(): self
    {
        return match ($this) {
            self::Up => self::Left,
            self::Down => self::Right,
            self::Left => self::Down,
            self::Right => self::Up,
            default => throw new \Exception('Diagonals to be implemented'),
        };
    }

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
