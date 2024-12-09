<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2024\Day9;

use Webmozart\Assert\Assert;

class FileSystem
{
    /** @var File[] */
    private array $blocks = [];

    /** @var array<int, File> */
    private array $fileIndex;

    public function __construct(string $input)
    {
        $fileId = 0;
        $instructions = str_split($input);

        do {
            $char = array_shift($instructions);
            Assert::integerish($char);
            $counter = (int) $char;
            $file = new File($fileId, $counter);
            $this->fileIndex[count($this->blocks)] = $file;
            while ($counter--) {
                $this->blocks[] = $file;
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

    public function defragWholeFiles(): void
    {
        $files = array_reverse($this->fileIndex, true);

        foreach ($files as $i => $fileToMove) {
            if ($i % 1_000 === 0) {
                echo 'Defragging file ' . $i . PHP_EOL;
            }
            $this->tryToMoveFile($fileToMove, $i);
        }
    }

    private function tryToMoveFile(File $fileToMove, int $originalIndex): void
    {
        $index = 0;

        while ($index <= ($originalIndex - $fileToMove->length)) {
            if ($this->blocks[$index] instanceof File) {
                ++$index;
                continue;
            }

            $possibleSpace = array_slice($this->blocks, $index, $fileToMove->length);
            if (! empty(array_filter($possibleSpace))) {
                ++$index;
                continue;
            }

            // we have enough space!
            $length = $fileToMove->length;
            while ($length--) {
                $this->blocks[$index++] = $fileToMove;
                $this->blocks[$originalIndex++] = null;
            }

            return;
        }
    }

    public function calculateChecksum(): int
    {
        $checksum = 0;

        foreach ($this->blocks as $i => $file) {
            if ($file instanceof File) {
                $checksum += $file->id * $i;
            }
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
