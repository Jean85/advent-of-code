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
        $startingPath = new Path($this->start, Direction::Right);
        $currentPaths = [
            $startingPath,
            $startingPath->turnLeft(),
            $startingPath->turnLeft()->turnLeft(),
            $startingPath->turnRight(),
        ];

        /** @var Map<int> $costMap */
        $costMap = new Map();
        $costMap->setDefaultElement(PHP_INT_MAX);
        $cheapestPath = PHP_INT_MAX;

        while (! empty($currentPaths)) {
            $path = $this->findBestCurrentPath($currentPaths);
            if ($path->getCost() >= $cheapestPath) {
                continue;
            }

            $nextCoordinates = $path->position->moveToward($path->direction);
            if ($costMap->get($nextCoordinates) <= $path->getCost()) {
                // tile already reached with a cheaper path, drop this path
                continue;
            }

            $path->advance();
            $costMap->add($nextCoordinates, $path->getCost());

            switch ($this->get($nextCoordinates)) {
                case Terrain::End:
                    // end reached!
                    $cheapestPath = min($cheapestPath, $path->getCost());
                    break;
                case Terrain::Start:
                case Terrain::Wall:
                    // dead end, drop this path
                    continue 2;
                case Terrain::Plain:
                    $currentPaths[] = $path;
                    $currentPaths[] = $path->turnLeft();
                    $currentPaths[] = $path->turnRight();
                    break;
            }
        }

        return $cheapestPath;
    }

    private function findBestCurrentPath(array &$currentPaths): Path
    {
        usort(
            $currentPaths,
            fn(Path $a, Path $b): int => $a->eurhistic($this->end) <=> $b->eurhistic($this->end)
        );

        return array_shift($currentPaths);
    }
}
