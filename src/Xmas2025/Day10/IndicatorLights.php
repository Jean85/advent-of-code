<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2025\Day10;

class IndicatorLights
{
    public function __construct(
        /** @var list<bool> */
        public readonly array $lights,
    ) {}

    public static function parse(string $input): self
    {
        // remove brackets
        $input = trim($input, '[]');

        return new self(
            array_map(static fn($char) => $char === '#', str_split($input)),
        );
    }

    public function equals(self $other): bool
    {
        return $this->lights === $other->lights;
    }

    /**
     * @param Button[] $buttons
     */
    public function canBeLightUpWith(array $buttons): bool
    {
        // initialize with lights all off
        $newLights = array_map(static fn() => false, $this->lights);

        foreach ($buttons as $button) {
            $newLights = $button->press($newLights);
        }

        return $newLights === $this->lights;
    }
}
