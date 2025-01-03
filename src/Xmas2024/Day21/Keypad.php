<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day21;

use Jean85\AdventOfCode\Coordinates;

abstract class Keypad
{
    public function __construct(
        protected readonly Coordinates $gap,
        /** @var array<value-of<Key>, Coordinates */
        protected readonly array $keys
    ) {}

    public function calculateInstructions(string $code): string
    {
        $sequence = array_map(Key::from(...), str_split($code));

        $currentPosition = $this->getKeyCoordinate(Key::Activate);

        $solution = '';

        do {
            $nextPosition = $this->getKeyCoordinate(array_shift($sequence));

            $solution .= $this->calculateMovement($currentPosition, $nextPosition);
            $solution .= Key::Activate->value;

            $currentPosition = $nextPosition;
        } while (! empty($sequence));

        return $solution;
    }

    protected function getKeyCoordinate(Key $key): Coordinates
    {
        return $this->keys[$key->value]
            ?? throw new \InvalidArgumentException('Unexpected key: ' . $key->value);
    }

    protected function calculateMovement(Coordinates $currentPosition, Coordinates $nextPosition): string
    {
        $instructions = '';

        foreach ($this->getMovementPriority($currentPosition, $nextPosition) as $direction) {
            $repetitions = match ($direction) {
                Key::Up => $currentPosition->y - $nextPosition->y,
                Key::Down => $nextPosition->y - $currentPosition->y,
                Key::Left => $currentPosition->x - $nextPosition->x,
                Key::Right => $nextPosition->x - $currentPosition->x,
                default => throw new \InvalidArgumentException('Directional key not allowed: ' . $direction->name),
            };

            if ($repetitions > 0) {
                $instructions .= str_repeat($direction->value, $repetitions);
            }
        }

        return $instructions;
    }

    /**
     * @return Key[]
     */
    abstract protected function getMovementPriority(Coordinates $from, Coordinates $to): array;
}
