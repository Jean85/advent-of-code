<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2019\Day5;

use Jean85\AdventOfCode\SecondPartSolutionInterface;
use Jean85\AdventOfCode\SolutionInterface;
use Jean85\AdventOfCode\Xmas2019\Day2\Instructions\Add;
use Jean85\AdventOfCode\Xmas2019\Day2\Instructions\Halt;
use Jean85\AdventOfCode\Xmas2019\Day2\Instructions\Multiply;
use Jean85\AdventOfCode\Xmas2019\Day2\IntcodeComputer;
use Jean85\AdventOfCode\Xmas2019\Day2\Memory;
use Jean85\AdventOfCode\Xmas2019\Day5\Instructions\Equals;
use Jean85\AdventOfCode\Xmas2019\Day5\Instructions\JumpIfFalse;
use Jean85\AdventOfCode\Xmas2019\Day5\Instructions\JumpIfTrue;
use Jean85\AdventOfCode\Xmas2019\Day5\Instructions\LessThan;
use Jean85\AdventOfCode\Xmas2019\Day5\Instructions\PushInOutput;
use Jean85\AdventOfCode\Xmas2019\Day5\Instructions\SaveFromInput;

class Day5Solution implements SolutionInterface, SecondPartSolutionInterface
{
    private const INPUT = [3, 225, 1, 225, 6, 6, 1100, 1, 238, 225, 104, 0, 1101, 82, 10, 225, 101, 94, 44, 224, 101, -165, 224, 224, 4, 224, 1002, 223, 8, 223, 101, 3, 224, 224, 1, 224, 223, 223, 1102, 35, 77, 225, 1102, 28, 71, 225, 1102, 16, 36, 225, 102, 51, 196, 224, 101, -3468, 224, 224, 4, 224, 102, 8, 223, 223, 1001, 224, 7, 224, 1, 223, 224, 223, 1001, 48, 21, 224, 101, -57, 224, 224, 4, 224, 1002, 223, 8, 223, 101, 6, 224, 224, 1, 223, 224, 223, 2, 188, 40, 224, 1001, 224, -5390, 224, 4, 224, 1002, 223, 8, 223, 101, 2, 224, 224, 1, 224, 223, 223, 1101, 9, 32, 224, 101, -41, 224, 224, 4, 224, 1002, 223, 8, 223, 1001, 224, 2, 224, 1, 223, 224, 223, 1102, 66, 70, 225, 1002, 191, 28, 224, 101, -868, 224, 224, 4, 224, 102, 8, 223, 223, 101, 5, 224, 224, 1, 224, 223, 223, 1, 14, 140, 224, 101, -80, 224, 224, 4, 224, 1002, 223, 8, 223, 101, 2, 224, 224, 1, 224, 223, 223, 1102, 79, 70, 225, 1101, 31, 65, 225, 1101, 11, 68, 225, 1102, 20, 32, 224, 101, -640, 224, 224, 4, 224, 1002, 223, 8, 223, 1001, 224, 5, 224, 1, 224, 223, 223, 4, 223, 99, 0, 0, 0, 677, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1105, 0, 99999, 1105, 227, 247, 1105, 1, 99999, 1005, 227, 99999, 1005, 0, 256, 1105, 1, 99999, 1106, 227, 99999, 1106, 0, 265, 1105, 1, 99999, 1006, 0, 99999, 1006, 227, 274, 1105, 1, 99999, 1105, 1, 280, 1105, 1, 99999, 1, 225, 225, 225, 1101, 294, 0, 0, 105, 1, 0, 1105, 1, 99999, 1106, 0, 300, 1105, 1, 99999, 1, 225, 225, 225, 1101, 314, 0, 0, 106, 0, 0, 1105, 1, 99999, 8, 226, 226, 224, 1002, 223, 2, 223, 1006, 224, 329, 101, 1, 223, 223, 1008, 677, 677, 224, 102, 2, 223, 223, 1006, 224, 344, 101, 1, 223, 223, 1107, 226, 677, 224, 102, 2, 223, 223, 1005, 224, 359, 101, 1, 223, 223, 1008, 226, 226, 224, 1002, 223, 2, 223, 1006, 224, 374, 1001, 223, 1, 223, 1108, 677, 226, 224, 1002, 223, 2, 223, 1006, 224, 389, 1001, 223, 1, 223, 7, 677, 226, 224, 1002, 223, 2, 223, 1006, 224, 404, 101, 1, 223, 223, 7, 226, 226, 224, 1002, 223, 2, 223, 1005, 224, 419, 101, 1, 223, 223, 8, 226, 677, 224, 1002, 223, 2, 223, 1006, 224, 434, 1001, 223, 1, 223, 7, 226, 677, 224, 1002, 223, 2, 223, 1006, 224, 449, 1001, 223, 1, 223, 107, 226, 677, 224, 1002, 223, 2, 223, 1005, 224, 464, 1001, 223, 1, 223, 1007, 677, 677, 224, 102, 2, 223, 223, 1005, 224, 479, 101, 1, 223, 223, 1007, 226, 226, 224, 102, 2, 223, 223, 1005, 224, 494, 1001, 223, 1, 223, 1108, 226, 677, 224, 102, 2, 223, 223, 1005, 224, 509, 101, 1, 223, 223, 1008, 677, 226, 224, 102, 2, 223, 223, 1005, 224, 524, 1001, 223, 1, 223, 1007, 677, 226, 224, 102, 2, 223, 223, 1005, 224, 539, 101, 1, 223, 223, 1108, 226, 226, 224, 1002, 223, 2, 223, 1005, 224, 554, 101, 1, 223, 223, 108, 226, 226, 224, 102, 2, 223, 223, 1005, 224, 569, 101, 1, 223, 223, 108, 677, 677, 224, 102, 2, 223, 223, 1005, 224, 584, 101, 1, 223, 223, 1107, 226, 226, 224, 1002, 223, 2, 223, 1006, 224, 599, 101, 1, 223, 223, 8, 677, 226, 224, 1002, 223, 2, 223, 1006, 224, 614, 1001, 223, 1, 223, 108, 677, 226, 224, 102, 2, 223, 223, 1006, 224, 629, 1001, 223, 1, 223, 1107, 677, 226, 224, 1002, 223, 2, 223, 1006, 224, 644, 1001, 223, 1, 223, 107, 677, 677, 224, 102, 2, 223, 223, 1005, 224, 659, 101, 1, 223, 223, 107, 226, 226, 224, 102, 2, 223, 223, 1006, 224, 674, 1001, 223, 1, 223, 4, 223, 99, 226];

    public function solve()
    {
        return $this->runDiagnostics(1);
    }

    public function solveSecondPart()
    {
        return $this->runDiagnostics(5);
    }

    private function runDiagnostics(int $systemNumber): int
    {
        $memory = new MemoryWithIO(self::INPUT);
        $memory->setInput($systemNumber);

        $this->run($memory);

        return $memory->getOutput();
    }

    public function run(Memory $memory): int
    {
        $computer = new IntcodeComputer([
            new Halt(),
            new Add(),
            new Multiply(),
            new PushInOutput(),
            new SaveFromInput(),
            new Equals(),
            new JumpIfFalse(),
            new JumpIfTrue(),
            new LessThan(),
        ]);

        return $computer->run($memory);
    }
}
