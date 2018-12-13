<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2018\Day10;

class Sky
{
    /** @var Point[] */
    private $points = [];

    public function addPoint(Point $point): void
    {
        $this->points[] = $point;
    }

    public function findTurnWithSmallestArea(): int
    {
        $turn = 0;
        $smallestArea = INF;
        $bestTurn = null;

        do {
            $area = $this->moveAndGetArea();

            if ($area < $smallestArea) {
                $smallestArea = $area;
                $bestTurn = $turn;
            }
        } while (++$turn < 100000);

        return $bestTurn;
    }

    private function moveAndGetArea(): int
    {
        $minX = INF;
        $minY = INF;
        $maxX = -INF;
        $maxY = -INF;

        foreach ($this->points as $point) {
            $point->move();
            if ($point->getX() < $minX) {
                $minX = $point->getX();
            }
            if ($point->getY() < $minY) {
                $minY = $point->getY();
            }
            if ($point->getX() > $maxX) {
                $maxX = $point->getX();
            }
            if ($point->getY() > $maxY) {
                $maxY = $point->getY();
            }
        }

        return (int) abs(($maxX - $minX) * ($maxY - $minY));
    }
}
