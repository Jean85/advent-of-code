<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2019\Day9;

use Jean85\AdventOfCode\Xmas2019\Day5\Instructions\ParameterModes;
use Jean85\AdventOfCode\Xmas2019\Day5\MemoryWithIO;

class MemoryWithRelativeMode extends MemoryWithIO
{
    private $relative = 0;

    public function getRelative(): int
    {
        return $this->relative;
    }

    public function alterRelative(int $diff): void
    {
        $this->relative += $diff;
    }

    public function getAfterPointer(int $ahead, ParameterModes $mode): int
    {
        if ($mode->isRelative($ahead)) {
            $parameter = $this->getMemory()[$this->getPointer() + $ahead];
            $positionToExtractFrom = $this->getMemory()[$this->relative + $parameter];

            return $this->getMemory()[$positionToExtractFrom];
        }

        return parent::getAfterPointer($ahead, $mode); // TODO: Change the autogenerated stub
    }
}
