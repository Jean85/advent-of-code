<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day16;

use Jean85\AdventOfCode\Coordinates;
use Jean85\AdventOfCode\Direction;
use Jean85\AdventOfCode\Map;
use Webmozart\Assert\Assert;

/**
 * @template-extends Map<Terrain>
 */
class ReindeerMaze extends Map
{
    private readonly Coordinates $start;
    private readonly Coordinates $end;

    /** @var list<Path> */
    private array $bestPaths = [];

    public function __construct(string $input)
    {
        parent::__construct();

        foreach (explode("\n", $input) as $y => $line) {
            foreach (str_split($line) as $x => $char) {
                $coordinates = new Coordinates($x, $y);
                $tile = Terrain::from($char);
                $this->add($coordinates, $tile);

                if ($tile === Terrain::Start) {
                    $this->start = $coordinates;
                }

                if ($tile === Terrain::End) {
                    $this->end = $coordinates;
                }
            }
        }

        Assert::notNull($this->start);
        Assert::notNull($this->end);
    }

    /**
     * @return list<Path>
     */
    public function getBestPaths(): array
    {
        return $this->bestPaths;
    }

    public function calculateShortestPath(): int
    {
        $this->bestPaths = [];
        /** @var Map<PathCostMap|null> $costMap */
        $costMap = new Map();
        $costMap->setDefaultElement(false);
        $costMap->add($this->start, 0);

        $path = new Path($this->start, Direction::Right);

        $neighbours = [];
        $this->addToSortedByTurns($neighbours, $path);
        $this->addToSortedByTurns($neighbours, $path->turnLeft());
        $this->addToSortedByTurns($neighbours, $path->turnRight());
        $this->addToSortedByTurns($neighbours, $path->turnLeft()->turnLeft());

        $cheapestPath = PHP_INT_MAX;

        $i = 0;
        while (true) {
            $path = $this->findBestCurrentPath($neighbours)?->advance();
            if (! $path instanceof Path) {
                return $cheapestPath;
            }

            if ($path->getCost() > $cheapestPath) {
                continue;
            }

            switch ($this->get($path->position)) {
                case Terrain::Start:
                case Terrain::Wall:
                    continue 2;
                case Terrain::End:
                    $this->bestPaths[] = $path;
                    $cheapestPath = min($cheapestPath, $path->getCost());
                    break;
                case Terrain::Plain:
                    break;
            }

            $pathCostMap = $costMap->get($path->position) ?: new PathCostMap();
            foreach ($pathCostMap->reachedCheaplyBy($path) as $nextPath) {
                $this->addToSortedByTurns($neighbours, $nextPath);
            }

            $costMap->add($path->position, $pathCostMap);
        }
    }

    private function findBestCurrentPath(array &$currentPaths): ?Path
    {
        $firstKey = array_key_first($currentPaths);
        if (0 === count($currentPaths[$firstKey])) {
            unset($currentPaths[$firstKey]);
            $firstKey = array_key_first($currentPaths);
            if (null === $firstKey) {
                return null;
            }
        }

        return array_shift($currentPaths[$firstKey]);
    }

    private function addToSortedByTurns(array &$neighbours, Path $path): void
    {
        $neighbours[$path->getTurns()][] = $path;
    }
}
