<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day17;

class Computer
{
    public function __construct(
        private int $registryA,
        private int $registryB,
        private int $registryC,
    ) {}

    /**
     * @param list<int> $program
     *
     * @return list<string>
     */
    public function run(array $program): array
    {
        $instructionPointer = 0;
        $output = [];

        while ($instructionPointer < count($program)) {
            $instruction = Instruction::from($program[$instructionPointer++]);
            $operand = $program[$instructionPointer++];

            match ($instruction) {
                Instruction::adv => $this->registryA = (int) floor($this->registryA / (2 ** $this->getCombo($operand))),
                Instruction::bxl => $this->registryB ^= $operand,
                Instruction::bst => $this->registryB = $this->getCombo($operand) % 8,
                Instruction::jnz => $instructionPointer = ($this->registryA !== 0) ? $operand : $instructionPointer,
                Instruction::bxc => $this->registryB ^= $this->registryC,
                Instruction::out => $output[] = $this->getCombo($operand) % 8,
                Instruction::bdv => $this->registryB = (int) floor($this->registryA / (2 ** $this->getCombo($operand))),
                Instruction::cdv => $this->registryC = (int) floor($this->registryA / (2 ** $this->getCombo($operand))),
            };
        }

        return $output;
    }

    private function getCombo(int $instruction): int
    {
        return match ($instruction) {
            0, 1, 2, 3 => $instruction,
            4 => $this->registryA,
            5 => $this->registryB,
            6 => $this->registryC,
            7 => throw new \RuntimeException('Combo operand 7 is reserved!'),
            default => throw new \RuntimeException('Combo operand not recognized: ' . $instruction),
        };
    }

    public function getRegistryA(): int
    {
        return $this->registryA;
    }

    public function getRegistryB(): int
    {
        return $this->registryB;
    }

    public function getRegistryC(): int
    {
        return $this->registryC;
    }
}
