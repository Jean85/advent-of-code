<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2025\Day10;

class Machine
{
    private array $cache = [];
    private array $parityCache = [];
    private array $buttonCache = [];

    private function __construct(
        public readonly IndicatorLights $indicatorLights,
        /** @var Button[] */
        public readonly array $buttons,
        public readonly Joltage $joltageRequirements,
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
            new Joltage(...array_map('intval', explode(',', $joltageInputs))),
        );
    }

    /**
     * @return Button[]
     */
    public function calcMinButtonPressesForLights(?IndicatorLights $indicatorLights = null): array
    {
        $indicatorLights ??= $this->indicatorLights;
        $min = 1;

        do {
            foreach ($this->getAllCombinationOfButtons($this->buttons, $min) as $buttons) {
                if ($indicatorLights->canBeLightUpWith($buttons)) {
                    return $buttons;
                }
            }
        } while (++$min < 100);

        throw new \RuntimeException('Unable to find a valid combination');
    }

    /**
     * @see https://www.reddit.com/r/adventofcode/comments/1pk87hl/2025_day_10_part_2_bifurcate_your_way_to_victory/
     */
    public function countMinButtonPressesForJoltage(?Joltage $joltage = null): int
    {
        $joltage ??= $this->joltageRequirements;
        $cacheTag = $joltage->__toString();

        if (isset($this->cache[$cacheTag])) {
            return $this->cache[$cacheTag];
        }

        if ($joltage->isAllZero()) {
            return $this->cache[$cacheTag] = 0;
        }

        if ($joltage->isAllEven()) {
            return $this->cache[$cacheTag] = 2 * $this->countMinButtonPressesForJoltage($joltage->half());
        }

        $convertedJoltage = $joltage->convertToIndicatorLights();
        $qty = 1;
        $foundValidPresses = [];
        $combinations = null;
        if (isset($this->parityCache[$convertedJoltage->__toString()])) {
            $combinations = $this->parityCache[$convertedJoltage->__toString()];
            $qty = PHP_INT_MAX;
        } else {
            $this->parityCache[$convertedJoltage->__toString()] = [];
        }

        do {
            foreach ($combinations ?? $this->getAllCombinationOfButtonsWithNoRepetitions($this->buttons, $qty) as $buttons) {
                if ($convertedJoltage->canBeLightUpWith($buttons)) {
                    $this->parityCache[$convertedJoltage->__toString()][] = $buttons;

                    try {
                        $sub = $joltage->subtract($buttons);
                        $foundValidPresses[] = count($buttons) + $this->countMinButtonPressesForJoltage($sub);
                    } catch (\InvalidArgumentException) {
                        // no valid combination
                        $foundValidPresses[] = 1_000_000_000;
                    }
                }
            }
            ++$qty;
        } while ($qty <= count($this->buttons));

        return $this->cache[$cacheTag] = min([...$foundValidPresses, 1_000_000_000]);
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
     * @return Button[]
     */
    private function getAllCombinationOfButtonsWithNoRepetitions(array $possibleButtons, int $qty): array
    {
        if ($qty > count($possibleButtons)) {
            throw new \InvalidArgumentException('Not enough buttons');
        }

        return $this->buttonCache[$qty] ??= iterator_to_array(
            $this->getAllCombinationOfButtonsWithNoRepetitionsRecursively($possibleButtons, $qty)
        );
    }

    /**
     * @param Button[] $possibleButtons
     *
     * @return \Generator<Button[]>
     */
    private function getAllCombinationOfButtonsWithNoRepetitionsRecursively(array $possibleButtons, int $qty): \Generator
    {
        if ($qty > count($possibleButtons)) {
            throw new \InvalidArgumentException('Not enough buttons');
        }

        if ($qty < 1) {
            yield [];

            return;
        }

        for ($i = 0; $i <= count($possibleButtons) - $qty; ++$i) {
            $remainingButtons = array_slice($possibleButtons, $i);
            foreach ($this->getAllCombinationOfButtonsWithNoRepetitionsRecursively($remainingButtons, $qty - 1) as $followingButtons) {
                yield [$possibleButtons[$i], ...$followingButtons];
            }
        }
    }
}
