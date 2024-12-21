<?php

declare(strict_types=1);

namespace Tests\Xmas2024\Day17;

use Jean85\AdventOfCode\Xmas2024\Day17\Computer;
use PHPUnit\Framework\TestCase;

class ComputerTest extends TestCase
{
    public function testProgram1(): void
    {
        $computer = new Computer(0, 0, 9);

        $computer->run([2, 6]);

        $this->assertSame(1, $computer->getRegistryB());
    }
    public function testProgram2(): void
    {
        $computer = new Computer(10, 0, 0);

        $output = $computer->run([5, 0, 5, 1, 5, 4]);

        $this->assertSame([0, 1, 2], $output);
    }
    public function testProgram3(): void
    {
        $computer = new Computer(2_024, 0, 0);

        $output = $computer->run([0, 1, 5, 4, 3, 0]);

        $this->assertSame([4, 2, 5, 6, 7, 7, 7, 7, 3, 1, 0], $output);
        $this->assertSame(0, $computer->getRegistryA());
    }
    public function testProgram4(): void
    {
        $computer = new Computer(0, 29, 0);

        $computer->run([1, 7]);

        $this->assertSame(26, $computer->getRegistryB());
    }
    public function testProgram5(): void
    {
        $computer = new Computer(0, 2_024, 43_690);

        $computer->run([4, 0]);

        $this->assertSame(44_354, $computer->getRegistryB());
    }
}
