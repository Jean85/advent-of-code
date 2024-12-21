<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day17;

use Jean85\AdventOfCode\Input;
use Jean85\AdventOfCode\SecondPartSolutionInterface;
use Jean85\AdventOfCode\SolutionInterface;

class Day17Solution implements SolutionInterface, SecondPartSolutionInterface
{
    public function solve(?string $input = null): string
    {
        [$program, $computer] = $this->prepareComputer($input);

        return implode(',', $computer->run($program));
    }

    public function solveSecondPart(?string $input = null): string
    {
        [$program, $parsedComputer] = $this->prepareComputer($input);

        $testA = -1;

        do {
            $computer = new Computer(
                ++$testA,
                $parsedComputer->getRegistryB(),
                $parsedComputer->getRegistryC(),
            );
        } while ($program !== $computer->run($program));

        return (string) $testA;
    }

    /**
     * @return array{list<int>, Computer}
     */
    private function prepareComputer(?string $input): array
    {
        $input ??= Input::read(__DIR__);
        [$registers, $program] = explode(PHP_EOL . PHP_EOL, $input);
        preg_match_all('/Register .: (\d+)/', $registers, $matches);
        $computer = new Computer((int) $matches[1][0], (int) $matches[1][1], (int) $matches[1][2]);
        $program = array_map(
            static fn(string $instruction) => (int) $instruction,
            explode(',', substr($program, 9))
        );

        return [$program, $computer];
    }
}
