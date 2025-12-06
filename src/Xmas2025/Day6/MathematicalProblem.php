<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2025\Day6;

class MathematicalProblem
{
    /**
     * @return self[]
     */
    public static function parse(string $input): array
    {
        do {
            $strlen = strlen($input);
            $input = str_replace('  ', ' ', $input);
        } while ($strlen > strlen($input));

        $rows = explode("\n", $input);
        $operations = trim(array_pop($rows));
        $numbers = [];

        foreach ($rows as $row) {
            $row = trim($row);
            foreach (explode(' ', $row) as $i => $number) {
                $numbers[$i][] = (int) $number;
            }
        }

        $problems = [];
        foreach (explode(' ', $operations) as $i => $operation) {
            $problems[] = new self(Operation::from($operation), $numbers[$i]);
        }

        return $problems;
    }

    public function __construct(
        public readonly Operation $operation,
        /** @var int[] */
        public readonly array $numbers,
    ) {}

    public function solve(): int
    {
        return match ($this->operation) {
            Operation::Addition => array_sum($this->numbers),
            Operation::Multiplication => array_reduce($this->numbers, static fn($result, $number) => $result * $number, 1),
        };
    }
}
