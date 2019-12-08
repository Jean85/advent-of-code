<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2019\Day7;

use Jean85\AdventOfCode\Xmas2019\Day2\Instructions\Add;
use Jean85\AdventOfCode\Xmas2019\Day2\Instructions\Halt;
use Jean85\AdventOfCode\Xmas2019\Day2\Instructions\Multiply;
use Jean85\AdventOfCode\Xmas2019\Day2\IntcodeComputer;
use Jean85\AdventOfCode\Xmas2019\Day5\Instructions\Equals;
use Jean85\AdventOfCode\Xmas2019\Day5\Instructions\JumpIfFalse;
use Jean85\AdventOfCode\Xmas2019\Day5\Instructions\JumpIfTrue;
use Jean85\AdventOfCode\Xmas2019\Day5\Instructions\LessThan;
use Jean85\AdventOfCode\Xmas2019\Day5\Instructions\PushInOutput;
use Jean85\AdventOfCode\Xmas2019\Day5\Instructions\SaveFromInput;

class Thruster
{
    /** @var int[] */
    private $program;

    /**
     * Thruster constructor.
     *
     * @param int[] $program
     */
    public function __construct(array $program)
    {
        $this->program = $program;
    }

    public function trySequence(array $initSequence): int
    {
        $output = 0;
        $computer = $this->creatComputer();

        for ($i = 0; $i < 5; ++$i) {
            $memory = $this->recreateMemory();
            $amplifier = new Amplifier($computer, $memory);

            $output = $amplifier->execute($initSequence[$i], $output);
        }

        return $output;
    }

    public function trySequenceWithLoop(array $initSequence): int
    {
        $output = 0;
        $computer = $this->creatComputer();
        /** @var Amplifier[] $amplifiers */
        $amplifiers = [];

        for ($i = 0; $i < 5; ++$i) {
            $memory = $this->recreateYieldedMemory();
            $amplifier = new Amplifier($computer, $memory);
            $amplifiers[$i] = $amplifier;

            $memory->setInput($initSequence[$i]);
            if ($i > 0) {
                $this->chainAmplifiers($amplifiers[$i - 1], $amplifier);
            }
        }

        $this->chainAmplifiers($amplifiers[4], $amplifiers[0]);

        for ($i = 0; $i < 5; ++$i) {
            $amplifier = $amplifiers[$i];
            $amplifier->getComputer()->run($amplifier->getMemory());
        }

        return $output;
    }

    private function creatComputer(): IntcodeComputer
    {
        return new IntcodeComputer([
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
    }

    private function recreateMemory(): MemoryWithSequentialIO
    {
        return new MemoryWithSequentialIO($this->program);
    }

    private function recreateYieldedMemory(): MemoryWithYieldedIO
    {
        return new MemoryWithYieldedIO($this->program);
    }

    private function chainAmplifiers(Amplifier $amplifier1, Amplifier $amplifier2): void
    {
        /** @var MemoryWithYieldedIO $memory1 */
        $memory1 = $amplifier1->getMemory();
        /** @var MemoryWithYieldedIO $memory2 */
        $memory2 = $amplifier2->getMemory();

        $memory1->setOutputGenerator($memory2->getInputGenerator());
    }
}
