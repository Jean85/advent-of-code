<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day16;

class PathCostMap
{
    /** @var array<string, Path> */
    private array $costMap = [];

    /**
     * @return list<Path> Returns the list of paths that are cheaper than the existing ones
     */
    public function reachedCheaplyBy(Path $currentPath): array
    {
        return array_filter([
            $this->saveCostIfCheaper($currentPath),
            $this->saveCostIfCheaper($currentPath->turnLeft()),
            $this->saveCostIfCheaper($currentPath->turnRight()),
        ], static fn(?Path $path) => $path !== null);
    }

    public function getMinimumCost(): int
    {
        $cost = PHP_INT_MAX;

        foreach ($this->costMap as $path) {
            $cost = min($cost, $path->getCost());
        }

        return $cost;
    }

    /**
     * @return Path|null Returns the path if it's cheaper
     */
    private function saveCostIfCheaper(Path $currentPath): ?Path
    {
        if (isset($this->costMap[$currentPath->direction->name])) {
            $currentCost = $this->costMap[$currentPath->direction->name]->getCost();

            if ($currentCost < $currentPath->getCost()) {
                return null;
            }
        }

        return $this->costMap[$currentPath->direction->name] = $currentPath;
    }
}
