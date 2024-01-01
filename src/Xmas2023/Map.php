<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2023;

/**
 * @template T
 */
class Map
{
    /** @var T[][] */
    private array $map;

    /** @var T|null */
    private mixed $defaultElement = null;

    /**
     * @param T $tile
     */
    public function add(Coordinates $coordinates, mixed $tile): void
    {
        $this->map[$coordinates->x][$coordinates->y] = $tile;
    }

    /**
     * @return T
     */
    public function get(Coordinates $coordinates): mixed
    {
        return $this->map[$coordinates->x][$coordinates->y]
            ?? $this->defaultElement
            ?? throw new \InvalidArgumentException(sprintf(
                'No tile at coordinates [%d, %d]',
                $coordinates->x,
                $coordinates->y,
            ));
    }

    /**
     * @param T $defaultElement
     */
    public function setDefaultElement(mixed $defaultElement): void
    {
        $this->defaultElement = $defaultElement;
    }
}
