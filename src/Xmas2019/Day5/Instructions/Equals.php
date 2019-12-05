<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2019\Day5\Instructions;

use Jean85\AdventOfCode\Xmas2019\Day2\Instructions\InstructionInterface;
use Jean85\AdventOfCode\Xmas2019\Day2\Memory;

class Equals implements InstructionInterface
{
    public function getOpcode(): int
    {
        return 8;
    }

    public function apply(Memory $memory, ParameterModes $modes): void
    {
        $valueToStore = (int) ($memory->getAfterPointer(1, $modes) === $memory->getAfterPointer(2, $modes));

        $memory->set($memory->getAfterPointer(3, $modes), $valueToStore);
    }

    public function getInstructionSize(): ?int
    {
        return 4;
    }
}
