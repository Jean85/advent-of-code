<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day12;

use Jean85\AdventOfCode\Coordinates;
use Jean85\AdventOfCode\Direction;
use Jean85\AdventOfCode\Map;

/**
 * @template-extends Map<string>
 */
class Garden extends Map
{
    /** @var Plot[] */
    private array $plots = [];
    private function __construct()
    {
        parent::__construct();
        $this->setDefaultElement(' ');
    }

    public static function createFrom(string $input): self
    {
        $garden = new self();
        foreach (explode("\n", $input) as $y => $line) {
            foreach (str_split($line) as $x => $char) {
                $garden->add(new Coordinates($x, $y), $char);
            }
        }

        $clonedGarden = clone $garden;
        $maxCoordinates = $clonedGarden->getMaxCoordinates();
        foreach (range(0, $maxCoordinates->y) as $y) {
            foreach (range(0, $maxCoordinates->x) as $x) {
                $startCoord = new Coordinates($x, $y);
                if ($clonedGarden->get($startCoord) === '#') {
                    continue;
                }

                $plotChar = $garden->get($startCoord);
                $plot = new Plot($plotChar);
                self::extractPlot($clonedGarden, $plot, $plotChar, $startCoord);

                $garden->plots[] = $plot;
            }
        }

        return $garden;
    }

    private static function extractPlot(Garden $garden, Plot $plot, string $plotChar, Coordinates $startCoord): void
    {
        if ($garden->get($startCoord) !== $plotChar) {
            return;
        }

        $plot->add($startCoord, $plotChar);
        $garden->add($startCoord, '#');

        foreach (Direction::noDiagonals() as $direction) {
            self::extractPlot($garden, $plot, $plotChar, $startCoord->moveToward($direction));
        }
    }

    /**
     * @return Plot[]
     */
    public function getPlots(): array
    {
        return $this->plots;
    }

    public function calculateFenceDiscountedCost(): int
    {
        $cost = 0;

        foreach ($this->plots as $plot) {
            $cost += $plot->calculateFenceDiscountedCost();
        }

        return $cost;
    }
    public function calculateFenceCost(): int
    {
        $cost = 0;

        foreach ($this->plots as $plot) {
            $cost += $plot->calculateFenceCost();
        }

        return $cost;
    }
}
