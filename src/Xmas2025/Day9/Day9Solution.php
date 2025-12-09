<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2025\Day9;

use Jean85\AdventOfCode\Coordinates;
use Jean85\AdventOfCode\Input;
use Jean85\AdventOfCode\SecondPartSolutionInterface;
use Jean85\AdventOfCode\SolutionInterface;

class Day9Solution implements SolutionInterface, SecondPartSolutionInterface
{
    public function solve(?string $input = null): string
    {
        $tiles = $this->getRedTiles($input);
        $rectangles = $this->getRectangles($tiles);

        return (string) $this->getGreatestArea($rectangles);
    }

    public function solveSecondPart(?string $input = null): string
    {
        $tiles = $this->getRedTiles($input);
        $rectangles = $this->getRectangles($tiles);
        $edges = $this->getEdges($tiles);
        usort($rectangles, static fn(Rectangle $a, Rectangle $b) => $b->getArea() <=> $a->getArea());
        $largestValidRectangle = $this->getLargestRectangle($rectangles, $edges);

        return (string) $largestValidRectangle->getArea();
    }

    /**
     * @return Coordinates[]
     */
    private function getRedTiles(?string $input): array
    {
        $input ??= Input::read(__DIR__);

        $tiles = [];

        foreach (explode(PHP_EOL, $input) as $line) {
            $tiles[] = Coordinates::fromString($line);
        }

        return $tiles;
    }

    /**
     * @return array<string, Rectangle>
     */
    private function getRectangles(array $tiles): array
    {
        $rectangles = [];
        $tiles2 = $tiles;

        foreach ($tiles as $tile1) {
            foreach ($tiles2 as $tile2) {
                if ($tile1 === $tile2) {
                    continue;
                }

                $rectangle = new Rectangle($tile1, $tile2);

                $rectangles[$rectangle->getId()] = $rectangle;
            }
        }

        return $rectangles;
    }

    /**
     * @param Rectangle[] $rectangles
     */
    private function getGreatestArea(array $rectangles): int
    {
        return max(
            array_map(static fn(Rectangle $rectangle) => $rectangle->getArea(), $rectangles)
        );
    }

    /**
     * @param Coordinates[] $tiles
     *
     * @return Edge[]
     */
    private function getEdges(array $tiles): array
    {
        $edges = [];
        $previousTile = array_pop($tiles);
        $tiles[] = $previousTile;

        foreach ($tiles as $tile) {
            if ($tile->x === $previousTile->x) {
                $edges[] = new VerticalEdge($previousTile, $tile);
            } elseif ($tile->y === $previousTile->y) {
                $edges[] = new HorizontalEdge($previousTile, $tile);
            } else {
                throw new \InvalidArgumentException('Diagonal edge detected');
            }

            $previousTile = $tile;
        }

        return $edges;
    }

    /**
     * @param Rectangle[] $rectangles
     * @param Edge[] $verticalEdges
     */
    private function getLargestRectangle(array $rectangles, array $verticalEdges): Rectangle
    {
        foreach ($rectangles as $rectangle) {
            if (array_any($verticalEdges, fn(Edge $verticalEdge): bool => $verticalEdge->cutsTrough($rectangle))) {
                continue;
            }

            return $rectangle;
        }
    }
}
