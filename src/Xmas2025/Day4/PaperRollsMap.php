<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2025\Day4;

use Jean85\AdventOfCode\Coordinates;
use Jean85\AdventOfCode\Direction;
use Jean85\AdventOfCode\Map;

class PaperRollsMap
{
    /** @var Map<'@'> */
    private readonly Map $map;
    public static function read(string $input): self
    {
        $paperRollsMap = new self();

        foreach (explode("\n", $input) as $y => $line) {
            foreach (str_split($line) as $x => $char) {
                if ($char === '@') {
                    $paperRollsMap->map->add(new Coordinates($x, $y), '@');
                }
            }
        }

        return $paperRollsMap;
    }

    public function __construct()
    {
        $this->map = new Map();
        $this->map->setDefaultElement('.');
    }

    public function countReachableRolls(): int
    {
        $reachableRolls = 0;

        foreach ($this->map->getAll() as $got) {
            [$coordinates, $roll] = $got;
            if ($roll !== '@') {
                continue;
            }

            if ($this->rollIsReachable($coordinates)) {
                ++$reachableRolls;
            }
        }

        return $reachableRolls;
    }

    private function rollIsReachable(Coordinates $coordinates): bool
    {
        $rollsAround = 0;
        foreach (Direction::cases() as $direction) {
            if ($this->map->get($coordinates->moveToward($direction)) === '@') {
                ++$rollsAround;
            }

            if ($rollsAround >= 4) {
                return false;
            }
        }

        return true;
    }
}
