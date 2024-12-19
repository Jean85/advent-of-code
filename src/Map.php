<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode;

/**
 * @template T
 */
class Map
{
    /** @var T[][] */
    protected array $map;

    /** @var T|null */
    private mixed $defaultElement = null;

    private Coordinates $maxCoordinates;

    public function __construct()
    {
        $this->map = [];
        $this->maxCoordinates = new Coordinates(0, 0);
    }
    public function getSize(): int
    {
        return count($this->map, COUNT_RECURSIVE);
    }


    /**
     * @param T $tile
     */
    public function add(Coordinates $coordinates, mixed $tile): void
    {
        $this->map[$coordinates->x][$coordinates->y] = $tile;
        $this->maxCoordinates = new Coordinates(
            max($coordinates->x, $this->maxCoordinates->x),
            max($coordinates->y, $this->maxCoordinates->y),
        );
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
     * @return \Generator<array{Coordinates, T}>
     */
    public function getAll(): \Generator
    {
        foreach (range(0, $this->maxCoordinates->y) as $y) {
            foreach (range(0, $this->maxCoordinates->x) as $x) {
                $coordinates = new Coordinates($x, $y);
                yield [$coordinates, $this->get($coordinates)];
            }
        }
    }

    public function getMaxCoordinates(): Coordinates
    {
        return $this->maxCoordinates;
    }

    /**
     * @param T $defaultElement
     */
    public function setDefaultElement(mixed $defaultElement): void
    {
        $this->defaultElement = $defaultElement;
    }

    public function isWithinBound(Coordinates $coordinates): bool
    {
        return $this->maxCoordinates->x >= $coordinates->x
            && $this->maxCoordinates->y >= $coordinates->y
            && $coordinates->x >= 0
            && $coordinates->y >= 0;
    }
}
