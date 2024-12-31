<?php

declare(strict_types=1);

namespace Tests\Xmas2024\Day21;

use Jean85\AdventOfCode\Xmas2024\Day21\DoorKeypad;
use PHPUnit\Framework\TestCase;

class DoorKeypadTest extends TestCase
{
    public function test(): void
    {
        $doorKeypad = new DoorKeypad();

        $this->assertSame('<A^A^^>AvvvA', $doorKeypad->calculateInstructions('029A'));
    }
}
