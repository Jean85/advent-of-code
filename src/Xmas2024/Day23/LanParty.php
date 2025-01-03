<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day23;

class LanParty
{
    /** @var array<string, string[]> */
    private array $connections;
    public function __construct(string $input)
    {
        foreach (explode("\n", $input) as $line) {
            $this->addConnection($line);
        }
    }

    public function addConnection(string $connection): void
    {
        [$firstComputer, $secondComputer] = explode('-', $connection);
        $this->connections[$firstComputer][$secondComputer] = $secondComputer;
        $this->connections[$secondComputer][$firstComputer] = $firstComputer;
    }

    /**
     * @return array<string, array{string,string,string}>
     */
    public function findSets(): array
    {
        $sets = [];

        foreach ($this->connections as $firstComputer => $connectedComputers) {
            foreach ($connectedComputers as $secondComputer => $computers) {
                foreach (array_intersect($this->connections[$firstComputer], $this->connections[$secondComputer]) as $thirdComputer) {
                    $set = [$firstComputer, $secondComputer, $thirdComputer];
                    sort($set);
                    $sets[implode(',', $set)] = $set;
                }
            }
        }

        return $sets;
    }

    /**
     * @return array<string, array{string,string,string}>
     */
    public function findSetsWithComputerStartingWith(string $letter): array
    {
        $sets = $this->findSets();

        return array_filter($sets, function (array $set) use ($letter) {
            foreach ($set as $computer) {
                if (str_starts_with($computer, $letter)) {
                    return true;
                }
            }

            return false;
        });
    }
}
