<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day11;

use Jean85\AdventOfCode\Input;
use Jean85\AdventOfCode\SecondPartSolutionInterface;
use Jean85\AdventOfCode\SolutionInterface;
use Webmozart\Assert\Assert;

class Day11Solution implements SolutionInterface, SecondPartSolutionInterface
{
    public function solve(?string $input = null): string
    {
        $stones = $this->createStones($input);

        foreach ($stones as $stone) {
            $blinks = 25;

            while ($blinks--) {
                $stone->blink();
            }
        }

        $solution = 0;

        foreach ($stones as $stone) {
            $solution += $stone->count();
        }

        return (string) $solution;
    }

    public function solveSecondPart(?string $input = null): string
    {
        $map = $this->createStones($input);

        return (string) $this->rateTrailheads($map);
    }

    /**
     * @return Stone[]
     */
    private function createStones(?string $input): array
    {
        $input ??= Input::read(__DIR__);

        $stones = [];
        foreach (explode(' ', $input) as $number) {
            Assert::integerish($number);
            $stones[] = new Stone((int) $number, null);
        }

        Assert::notEmpty($stones);

        return $stones;
    }
}
