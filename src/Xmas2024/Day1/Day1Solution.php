<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day1;

use Jean85\AdventOfCode\Input;
use Jean85\AdventOfCode\SecondPartSolutionInterface;
use Jean85\AdventOfCode\SolutionInterface;

class Day1Solution implements SolutionInterface, SecondPartSolutionInterface
{
    public function solve(?string $input = null): string
    {
        [$firstColumn, $secondColumn] = $this->extractColumns($input);

        $result = 0;
        foreach ($firstColumn as $i => $id1) {
            $result += abs($id1 - $secondColumn[$i]);
        }

        return (string) $result;
    }

    public function solveSecondPart(?string $input = null): string
    {
        [$firstColumn, $secondColumn] = $this->extractColumns($input);

        $similarityScore = 0;

        foreach ($firstColumn as $id1) {
            $similarityScore += $id1 * $this->countOccurrences($secondColumn, $id1);
        }

        return (string) $similarityScore;
    }

    /**
     * @return array{int[], int[]}
     */
    private function extractColumns(?string $input): array
    {
        $input ??= Input::read(__DIR__);

        $firstColumn = [];
        $secondColumn = [];

        foreach (explode(PHP_EOL, $input) as $line) {
            \Safe\preg_match('/(\d+)\s+(\d+)/', $line, $matches);
            $firstColumn[] = (int) $matches[1];
            $secondColumn[] = (int) $matches[2];
        }

        sort($firstColumn);
        sort($secondColumn);

        return [$firstColumn, $secondColumn];
    }

    private function countOccurrences(array $secondColumn, int $id1): int
    {
        return count(
            array_filter(
                $secondColumn,
                static fn(int $val) => $val === $id1
            )
        );
    }
}
