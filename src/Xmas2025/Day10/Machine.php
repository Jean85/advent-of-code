<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2025\Day10;

class Machine
{
    private function __construct(
        public readonly IndicatorLights $indicatorLights,
        /** @var Button[] */
        public readonly array $buttons,
    ) {}

    /**
     * @return self[]
     */
    public static function parseAll(string $input): array
    {
        $machines = [];
        foreach (explode(PHP_EOL, $input) as $line) {
            $machines[] = Machine::parse($line);
        }

        return $machines;
    }

    public static function parse(string $line): self
    {
        $inputs = explode(' ', $line);
        $lightInputs = array_shift($inputs);
        $joltageInputs = array_pop($inputs);

        return new self(
            IndicatorLights::parse($lightInputs),
            Button::parseAll($inputs),
        );
    }

    public function countMinButtonPresses(): int
    {
        $min = 1;

        do {
            foreach ($this->getAllCombinationOfButtons($min) as $buttons) {
                if ($this->indicatorLights->canBeLightUpWith($buttons)) {
                    return $min;
                }
            }
        } while (++$min < 100);

        throw new \RuntimeException('Unable to find a valid combination');
    }

    /**
     * @param Button[] $previousButtons
     *
     * @return \Generator<Button[]>
     */
    private function getAllCombinationOfButtons(int $qty, array $previousButtons = []): \Generator
    {
        if ($qty < 1) {
            yield [];

            return;
        }

        foreach ($this->buttons as $button) {
            foreach ($this->getAllCombinationOfButtons($qty - 1, $previousButtons) as $followingButtons) {
                yield [$button, ...$followingButtons];
            }
        }
    }
}
