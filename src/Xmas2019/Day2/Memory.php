<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2019\Day2;

use Jean85\AdventOfCode\Xmas2019\Day2\Instructions\InstructionInterface;
use Jean85\AdventOfCode\Xmas2019\Day5\Instructions\AbstractJump;
use Jean85\AdventOfCode\Xmas2019\Day5\Instructions\ParameterModes;

class Memory
{
    /** @var int[] */
    private $memory;

    /** @var int */
    private $pointer = 0;

    /**
     * Memory constructor.
     *
     * @param int[] $memory
     */
    public function __construct(array $memory)
    {
        $this->memory = $memory;
        $this->pointer = 0;
    }

    public function get(int $position): int
    {
        return $this->memory[$position];
    }

    public function getCurrent(): int
    {
        return $this->memory[$this->pointer];
    }

    /**
     * @return int[]
     */
    public function getMemory(): array
    {
        return $this->memory;
    }

    public function getPointer(): int
    {
        return $this->pointer;
    }

    public function increasePointer(InstructionInterface $instruction): void
    {
        if ($instruction instanceof AbstractJump) {
            $this->pointer += $instruction->getJumpSize();
        } else {
            $this->pointer += $instruction->getInstructionSize() ?? 4;
        }
    }

    public function getAfterPointer(int $ahead, ParameterModes $mode): int
    {
        if ($mode->isImmediate($ahead)) {
            return $this->memory[$this->getPointer() + $ahead];
        }

        $positionToExtractFrom = $this->memory[$this->getPointer() + $ahead];

        return $this->memory[$positionToExtractFrom] ?? 0;
    }

    public function set(int $position, int $value): void
    {
        $this->memory[$position] = $value;
    }
}
