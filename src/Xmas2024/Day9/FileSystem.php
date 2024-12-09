<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day9;

use Webmozart\Assert\Assert;

class FileSystem
{
    /** @var File[] */
    private array $blocks;

    public function __construct(string $input)
    {
        $fileId = 0;
        $instructions = str_split($input);

        do {
            $char = array_shift($instructions);
            Assert::integerish($char);
            $counter = (int) $char;
            while ($counter--) {
                $this->blocks[] = new File($fileId);
            }

            ++$fileId;

            $char = array_shift($instructions);
            if (null !== $char) {
                Assert::integerish($char);
                $counter = (int) $char;
                while ($counter--) {
                    $this->blocks[] = null;
                }
            }
        } while (! empty($instructions));
    }

    public function defrag(): void
    {
        $i = 0;

        do {
            if ($this->blocks[$i] !== null) {
                continue;
            }

            do {
                $popped = array_pop($this->blocks);
            } while (null === $popped);

            $this->blocks[$i] = $popped;
        } while (++$i < count($this->blocks));
    }

    public function calculateChecksum(): int
    {
        $checksum = 0;

        foreach ($this->blocks as $i => $file) {
            $checksum += $file->id * $i;
        }

        return $checksum;
    }

    public function getBlocks(): string
    {
        return implode(
            array_map(
                fn(?File $file) => (string) ($file?->id ?? '.'),
                $this->blocks
            )
        );
    }
}
