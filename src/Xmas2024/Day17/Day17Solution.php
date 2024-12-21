<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day17;

use Jean85\AdventOfCode\Coordinates;
use Jean85\AdventOfCode\Input;
use Jean85\AdventOfCode\Map;
use Jean85\AdventOfCode\SecondPartSolutionInterface;
use Jean85\AdventOfCode\SolutionInterface;
use Webmozart\Assert\Assert;

class Day17Solution implements SolutionInterface, SecondPartSolutionInterface
{
    public function solve(?string $input = null): string
    {
        $input ??= Input::read(__DIR__);
        [$registers, $program] = explode(PHP_EOL . PHP_EOL, $input);
        preg_match_all('/Register .: (\d+)/', $registers, $matches);
        $computer = new Computer((int) $matches[1][0], (int) $matches[1][1], (int) $matches[1][2]);
        $program = array_map(
            static fn(string $instruction) => (int) $instruction,
            explode(',', substr($program, 9))
        );

        return implode(',', $computer->run($program));
    }

    public function solveSecondPart(?string $input = null): string
    {
        $map = $this->createMap($input);

        return (string) $this->rateTrailheads($map);
    }

    /**
     * @return Map<int>
     */
    private function createMap(?string $input): Map
    {
        $input ??= Input::read(__DIR__);
        $map = new Map();
        $map->setDefaultElement(999);
        foreach (explode("\n", $input) as $y => $line) {
            foreach (str_split($line) as $x => $char) {
                Assert::integerish($char);
                $map->add(new Coordinates($x, $y), (int) $char);
            }
        }

        return $map;
    }
}
