<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2025\Day8;

class Circuit
{
    /** @var array<string, Coordinates3D> */
    private array $boxes = [];

    public function __construct(Coordinates3D $coordinates)
    {
        $this->addBox($coordinates);
    }

    public function has(Coordinates3D $coordinates): bool
    {
        return isset($this->boxes[$coordinates->__toString()]);
    }

    private function addBox(Coordinates3D $coordinates): void
    {
        $this->boxes[$coordinates->__toString()] = $coordinates;
    }

    public function merge(self $other): void
    {
        foreach ($other->boxes as $box) {
            $this->addBox($box);
        }

        $other->boxes = [];
    }

    /**
     * @return array<string, Coordinates3D>
     */
    public function getBoxes(): array
    {
        return $this->boxes;
    }
}
