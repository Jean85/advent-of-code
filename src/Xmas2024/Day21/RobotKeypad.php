<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day21;

use Jean85\AdventOfCode\Coordinates;

class RobotKeypad extends Keypad
{
    public function __construct(private readonly Keypad $keypad)
    {
        parent::__construct(
            new Coordinates(0, 0),
            [
                '^' => new Coordinates(1, 0),
                'A' => new Coordinates(2, 0),
                '<' => new Coordinates(0, 1),
                'v' => new Coordinates(1, 1),
                '>' => new Coordinates(2, 1),
            ]
        );
    }

    public function calculateInstructions(string $code): string
    {
        $childInstructions = $this->keypad->calculateInstructions($code);

        return parent::calculateInstructions($childInstructions);
    }

    protected function getMovementPriority(Coordinates $from, Coordinates $to): array
    {
        $priority = [
            Key::Left,
            Key::Down,
            Key::Right,
            Key::Up,
        ];
        if (
            $from->y === $this->gap->y
            && $to->x === $this->gap->x
        ) {
            return array_reverse($priority);
        }

        return $priority;
    }
}
