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

    public function calculateShortestPath(): int
    {
        /** @var Map<PathCostMap|null> $costMap */
        $costMap = new Map();
        $costMap->setDefaultElement(false);
        $costMap->add($this->start, 0);

        $path = new Path($this->start, Direction::Right);
        $neighbours = [
            $path,
            $path->turnLeft(),
            $path->turnRight(),
            $path->turnLeft()->turnLeft(),
        ];

        $cheapestPath = PHP_INT_MAX;

        $i = 0;
        while (! empty($neighbours)) {
            if (++$i % 1000 === 0) {
                echo 'Iteration ' . $i . ': ' . $costMap->getSize() . ' - current cost: ' . $path->getCost() . PHP_EOL;
            }
            
            $path = $this->findBestCurrentPath($neighbours)->advance();
            if ($path->getCost() > $cheapestPath) {
                continue;
            }

            switch ($this->get($path->position)) {
                case Terrain::Start:
                case Terrain::Wall:
                    continue 2;
                case Terrain::End:
                    $cheapestPath = min($cheapestPath, $path->getCost());
                    break;
                case Terrain::Plain:
                    break;
            }

            $pathCostMap = $costMap->get($path->position) ?: new PathCostMap();
            $neighbours = [...$neighbours, ...$pathCostMap->reachedCheaplyBy($path)];
            $costMap->add($path->position, $pathCostMap);
        }

        return $cheapestPath;
    }

    private function findBestCurrentPath(array &$currentPaths): Path
    {
        usort(
            $currentPaths,
            static fn(Path $a, Path $b): int => $a->getCost() <=> $b->getCost()
        );

        return array_shift($currentPaths);
    }
}
