<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2020\Day9;

class XMASDecoder
{
    /** @var int[] */
    private array $numbers;

    public function __construct(string $input)
    {
        foreach (explode("\n", $input) as $string) {
            $this->numbers[] = (int) $string;
        }
    }

    public function findFirstNumberOutsideRule(int $preambleLength): int
    {
        $preamble = array_slice($this->numbers, 0, $preambleLength);
        $i = $preambleLength;

        while ($i < count($this->numbers)) {
            $currentNumber = $this->numbers[$i];
            if (! $this->isValidNumber($currentNumber, $preamble)) {
                return $currentNumber;
            }

            $preamble[] = $currentNumber;
            array_shift($preamble);
            ++$i;
        }

        throw new \RuntimeException('No solution found');
    }

    public function findEncryptionWeakness(int $preambleLength): int
    {
        $numberOutsideRule = $this->findFirstNumberOutsideRule($preambleLength);
        $list = $this->findContiguousListThatSumsUpTo($numberOutsideRule);

        return min($list) + max($list);
    }

    private function isValidNumber(int $currentNumber, array $preamble): bool
    {
        foreach ($preamble as $a) {
            foreach ($preamble as $b) {
                if ($a === $b) {
                    continue;
                }

                if ($currentNumber === $a + $b) {
                    return true;
                }
            }
        }

        return false;
    }

    private function findContiguousListThatSumsUpTo(int $numberOutsideRule): array
    {
        $list = [];
        foreach ($this->numbers as $number) {
            $list[] = $number;
            $sum = array_sum($list);
            if ($sum === $numberOutsideRule) {
                return $list;
            }

            while ($sum > $numberOutsideRule) {
                array_shift($list);
                $sum = array_sum($list);
            }

            if ($sum === $numberOutsideRule) {
                return $list;
            }
        }

        throw new \RuntimeException('No solution found');
    }
}
