<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2025\Day10;

class Button
{
    public function __construct(
        /** @var array<positive-int, true> */
        public readonly array $buttons,
    ) {}

    /**
     * @param string[] $inputs
     *
     * @return self[]
     */
    public static function parseAll(array $inputs): array
    {
        $buttons = [];
        foreach ($inputs as $input) {
            $buttons[] = Button::parse($input);
        }

        return $buttons;
    }

    public static function parse(string $input): self
    {
        $input = trim($input, '()');
        $button = [];
        foreach (explode(',', $input) as $buttonNumber) {
            $button[$buttonNumber] = true;
        }

        return new self($button);
    }

    /**
     * @param array<positive-int, bool> $newLights
     *
     * @return array<positive-int, bool>
     */
    public function press(array $newLights): array
    {
        foreach ($this->buttons as $i => $button) {
            $newLights[$i] = ! ($newLights[$i] ?? false);
        }

        return $newLights;
    }
}
