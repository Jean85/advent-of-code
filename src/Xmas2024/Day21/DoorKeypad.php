<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day21;

use Jean85\AdventOfCode\Coordinates;

class DoorKeypad extends Keypad
{
    public function __construct()
    {
        parent::__construct([
            '0' => new Coordinates(1, 3),
            '1' => new Coordinates(0, 2),
            '2' => new Coordinates(1, 2),
            '3' => new Coordinates(2, 2),
            '4' => new Coordinates(0, 1),
            '5' => new Coordinates(1, 1),
            '6' => new Coordinates(2, 1),
            '7' => new Coordinates(0, 0),
            '8' => new Coordinates(1, 0),
            '9' => new Coordinates(2, 0),
            'A' => new Coordinates(2, 3),
        ]);
    }

    protected function getMovementPriority(): array
    {
        return [
            Key::Up,
            Key::Down,
            Key::Left,
            Key::Right,
        ];
    }
}
