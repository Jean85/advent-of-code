<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2023\Day10;

use Jean85\AdventOfCode\Xmas2023\Direction;

enum Pipe: string
{
    case V = '|'; // is a vertical pipe connecting north and south.
    case H = '-'; // is a horizontal pipe connecting east and west.
    case L = 'L'; // is a 90-degree bend connecting north and east.
    case J = 'J'; // is a 90-degree bend connecting north and west.
    case B = '7'; // is a 90-degree bend connecting south and west.
    case F = 'F'; // is a 90-degree bend connecting south and east.
    case G = '.'; // is ground; there is no pipe in this tile.
    case S = 'S'; // is the starting position of the animal; there is a pipe on this

    public function moving(Direction $from): Direction
    {
        return match ($this) {
            self::V => match ($from) {
                Direction::Down, Direction::Up => $from,
            },
            self::H => match ($from) {
                Direction::Left, Direction::Right => $from,
            },
            self::L => match ($from) {
                Direction::Down => Direction::Right,
                Direction::Left => Direction::Up,
            },
            self::J => match ($from) {
                Direction::Right => Direction::Up,
                Direction::Down => Direction::Left,
            },
            self::B => match ($from) {
                Direction::Right => Direction::Down,
                Direction::Up => Direction::Left,
            },
            self::F => match ($from) {
                Direction::Left => Direction::Down,
                Direction::Up => Direction::Right,
            },
            self::G => throw new \LogicException('That is not in the loop!'),
            self::S => $from,
        };
    }
}
