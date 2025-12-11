<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2025\Day10;

class Machine
{
    private function __construct(
        public readonly IndicatorLights $indicatorLights,
        /** @var Button[] */
        public readonly array $buttons,
        /** @var list<positive-int> */
        public readonly array $joltageRequirements,
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
        $joltageInputs = trim(array_pop($inputs), '{}');

        return new self(
            IndicatorLights::parse($lightInputs),
            Button::parseAll($inputs),
            array_map('intval', explode(',', $joltageInputs)),
        );
    }

    public function countMinButtonPressesForLights(): int
    {
        $min = 1;

        do {
            foreach ($this->getAllCombinationOfButtons($this->buttons, $min, $this->buttons) as $buttons) {
                if ($this->indicatorLights->canBeLightUpWith($buttons)) {
                    return $min;
                }
            }
        } while (++$min < 100);

        throw new \RuntimeException('Unable to find a valid combination');
    }

    public function countMinButtonPressesForJoltage(): int
    {
        $min = 1;
        echo 'Calculating possible buttons...' . PHP_EOL;
        $possibleButtons = $this->calculatePossibleButtonsForJoltage();

        do {
            echo 'Trying for ' . $min . ' presses...' . PHP_EOL;
            $i = 1;
            foreach ($this->getAllCombinationWithNoRepetitions($possibleButtons, $min, $this->buttons) as $buttons) {
                $obtainedJoltage = $this->calculateJoltage($buttons);
                if ($this->joltageRequirements === $obtainedJoltage) {
                    return $min;
                }
            }
        } while (++$min < 100);

        throw new \RuntimeException('Unable to find a valid combination');
    }

    /**
     * @param Button[] $possibleButtons
     * @param Button[] $previousButtons
     *
     * @return \Generator<Button[]>
     */
    private function getAllCombinationOfButtons(array $possibleButtons, int $qty, array $previousButtons = []): \Generator
    {
        if ($qty < 1) {
            yield [];

            return;
        }

        foreach ($possibleButtons as $button) {
            foreach ($this->getAllCombinationOfButtons($possibleButtons, $qty - 1, $previousButtons) as $followingButtons) {
                yield [$button, ...$followingButtons];
            }
        }
    }

    /**
     * @param Button[] $possibleButtons
     *
     * @return \Generator<Button[]>
     */
    private function getAllCombinationWithNoRepetitions(array $possibleButtons, int $qty, array $previousButtons = []): \Generator
    {
        if ($qty < 1) {
            yield [];

            return;
        }

        foreach ($possibleButtons as $i => $button) {
            $filteredPossibleButtons = $possibleButtons;
            unset($filteredPossibleButtons[$i]);

            foreach ($this->getAllCombinationWithNoRepetitions($possibleButtons, $qty - 1, $previousButtons) as $followingButtons) {
                yield [$button, ...$followingButtons];
            }
        }
    }

    /**
     * @param Button[] $buttons
     *
     * @return list<positive-int>
     */
    private function calculateJoltage(array $buttons): array
    {
        // initialize with joltages all to zero
        $newJoltages = array_map(static fn() => 0, $this->joltageRequirements);

        foreach ($buttons as $buttonToBePressed) {
            foreach ($buttonToBePressed->buttons as $button) {
                ++$newJoltages[$button];
            }
        }

        return $newJoltages;
    }

    /**
     * @return Button[]
     */
    private function calculatePossibleButtonsForJoltage(): array
    {
        $possibleButtons = [];

        foreach ($this->buttons as $button) {
            $buttonRepetitions = [$button];

            while ($this->isBelowJoltageLimit($this->calculateJoltage($buttonRepetitions))) {
                $possibleButtons[] = $button;
                $buttonRepetitions[] = $button;
            }
        }

        return $possibleButtons;
    }

    /**
     * @param list<positive-int> $joltage
     */
    private function isBelowJoltageLimit(array $joltage): bool
    {
        foreach ($this->joltageRequirements as $i => $joltageRequirement) {
            if ($joltage[$i] > $joltageRequirement) {
                return false;
            }
        }

        return true;
    }
}
