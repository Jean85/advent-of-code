<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2025\Day8;

class Coordinates3D implements \Stringable
{
    /** @var float[] */
    private static array $distances = [];
    public function __construct(
        public readonly int $x,
        public readonly int $y,
        public readonly int $z,
    ) {}

    public static function fromString(string $input): self
    {
        $coordinates = array_map('intval', explode(',', $input));

        return new self(
            $coordinates[0],
            $coordinates[1],
            $coordinates[2],
        );
    }

    public static function getDistances(): array
    {
        return self::$distances;
    }

    public function distance(self $other): float
    {
        return abs($this->x - $other->x) * abs($this->x - $other->x)
            + abs($this->y - $other->y) * abs($this->y - $other->y)
            + abs($this->z - $other->z) * abs($this->z - $other->z)
        ;
    }

    public function __toString(): string
    {
        return implode(',', [$this->x, $this->y, $this->z]);
    }

    public function identifierWith(Coordinates3D $other): string
    {
        $names = [$this->__toString(), $other->__toString()];
        sort($names);

        return implode('-', array_combine($names, $names));
    }
}
