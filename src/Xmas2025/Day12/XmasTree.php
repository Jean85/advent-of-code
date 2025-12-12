<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2025\Day12;

class XmasTree
{
    public function __construct(
        public readonly int $width,
        public readonly int $height,
        /** @var int[] */
        public readonly array $desiredGifts,
    ) {}

    /**
     * @return self[]
     */
    public static function parseAll(string $input): array
    {
        return array_map(self::parse(...), explode("\n", $input));
    }

    public static function parse(string $input): self
    {
        $elements = explode(' ', $input);
        $spaceInput = explode('x', trim(array_shift($elements), ':'));

        return new self(
            (int) $spaceInput[0],
            (int) $spaceInput[1],
            array_map('intval', $elements),
        );
    }

    public function canFitGifts(): bool
    {
        return (floor($this->width / 3) * floor($this->height / 3)) >= array_sum($this->desiredGifts);
    }
}
