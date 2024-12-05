<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day5;

use Jean85\AdventOfCode\Input;
use Jean85\AdventOfCode\SecondPartSolutionInterface;
use Jean85\AdventOfCode\SolutionInterface;

class Day5Solution implements SolutionInterface, SecondPartSolutionInterface
{
    public function solve(?string $input = null): string
    {
        $input ??= Input::read(__DIR__);
        [$rulesInput, $updateListInput] = explode("\n\n", $input);

        $orderingRules = new OrderingRules($rulesInput);
        $updateList = $this->parseUpdateList($updateListInput);

        $solution = 0;

        foreach ($updateList as $pageList) {
            if ($pageList->isValidFor($orderingRules)) {
                $solution += $pageList->getMiddle();
            }
        }

        return (string) $solution;
    }

    public function solveSecondPart(?string $input = null): string
    {
        $input ??= Input::read(__DIR__);
    }

    /**
     * @return list<PageList>
     */
    private function parseUpdateList(string $updateListInput): array
    {
        $updateList = [];

        foreach (explode("\n", $updateListInput) as $line) {
            $updateList[] = new PageList($line);
        }

        return $updateList;
    }
}
