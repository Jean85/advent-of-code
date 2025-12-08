<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2025\Day7;

use Jean85\AdventOfCode\Coordinates;
use Jean85\AdventOfCode\Direction;
use Jean85\AdventOfCode\Map;

class TachyonMap
{
    /** @var Map<MapTile> */
    private readonly Map $map;

    private readonly Coordinates $start;

    public static function parse(string $input): self
    {
        $tachyonMap = new self();

        foreach (explode("\n", $input) as $y => $line) {
            foreach (str_split($line) as $x => $char) {
                $tile = MapTile::from($char);
                $coordinates = new Coordinates($x, $y);

                if ($tile === MapTile::Start) {
                    $tachyonMap->start = $coordinates;
                }

                $tachyonMap->map->add($coordinates, $tile);
            }
        }

        return $tachyonMap;
    }

    private function __construct()
    {
        $this->map = new Map();
    }

    public function countSplits(): int
    {
        $y = $this->start->y;
        $tachyons = [$this->start];
        $maxY = $this->map->getMaxCoordinates()->y;

        $splits = 0;

        while (++$y <= $maxY) {
            $oldTachyons = $tachyons;
            $tachyons = [];

            while ($tachyon = array_shift($oldTachyons)) {
                $tachyon = $tachyon->moveToward(Direction::Down);
                if ($this->map->get($tachyon) === MapTile::Splitter) {
                    $leftTachyon = $tachyon->moveToward(Direction::Left);
                    $rightTachyon = $tachyon->moveToward(Direction::Right);
                    $tachyons[$leftTachyon->x] = $leftTachyon;
                    $tachyons[$rightTachyon->x] = $rightTachyon;
                    ++$splits;
                } else {
                    $tachyons[$tachyon->x] = $tachyon;
                }
            }
        }

        return $splits;
    }

    public function countSplitsWithQuantum(): int
    {
        $tachyons = $this->getSplitsWithQuantum();

        return array_reduce($tachyons, static fn(int $carry, QuantumTachyon $t) => $carry + $t->superPositions, 0);
    }

    /**
     * @return list<QuantumTachyon>
     */
    public function getSplitsWithQuantum(): array
    {
        $y = $this->start->y;
        $tachyons = [new QuantumTachyon($this->start)];
        $maxY = $this->map->getMaxCoordinates()->y;

        while (++$y <= $maxY) {
            $oldTachyons = $tachyons;
            $tachyons = [];

            while ($tachyon = array_shift($oldTachyons)) {
                $tachyon = new QuantumTachyon(new Coordinates($tachyon->coordinates->x, $y), $tachyon->superPositions);
                if ($this->map->get($tachyon->coordinates) === MapTile::Splitter) {
                    $leftTachyon = $tachyon->moveLeft();
                    $rightTachyon = $tachyon->moveRight();
                    $tachyons[$leftTachyon->coordinates->x] = $leftTachyon->merge($tachyons[$leftTachyon->coordinates->x] ?? null);
                    $tachyons[$rightTachyon->coordinates->x] = $rightTachyon->merge($tachyons[$rightTachyon->coordinates->x] ?? null);
                } else {
                    $tachyons[$tachyon->coordinates->x] = $tachyon->merge($tachyons[$tachyon->coordinates->x] ?? null);
                }
            }
        }

        return $tachyons;
    }
}
