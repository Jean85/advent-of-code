<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2025\Day10;

class Machine
{
    private array $cache = [];
    private array $parityCache = [];
    /** @var array<string, positive-int> */
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

        $this->preCalculateAllPatterns();

        return $this->solveSingleJoltage($joltage);
    }

    private function solveSingleJoltage(Joltage $joltage): int
    {
        $cacheTag = $joltage->__toString();

        if (isset($this->cache[$cacheTag])) {
            return $this->cache[$cacheTag];
        }

        if ($joltage->isAllZero()) {
            return $this->cache[$cacheTag] = 0;
        }

        $answer = 1_000_000_000;

        foreach ($this->buttonCache as $patternStr => $patternCost) {
            $pattern = Joltage::fromString($patternStr);
            if (! $joltage->canSubtract($pattern)) {
                continue;
            }

            if (! $joltage->hasSameParity($pattern)) {
                continue;
            }

            $newGoal = $joltage->subtract($pattern);
            $totalCost = $patternCost + 2 * $this->solveSingleJoltage($newGoal->half());
            $answer = min($answer, $totalCost);
        }

        return $this->cache[$cacheTag] = $answer;
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

    private function preCalculateAllPatterns(): void
    {
        if (! empty($this->buttonCache)) {
            return;
        }

        $numButtons = count($this->buttons);
        $numCounters = count($this->joltageRequirements->joltages);

        // Generate all possible button combinations and their effects
        for ($patternLen = 0; $patternLen <= $numButtons; ++$patternLen) {
            foreach ($this->getCombinations(range(0, $numButtons - 1), $patternLen) as $buttonIndices) {
                // Calculate the net effect of pressing these buttons
                $pattern = array_fill(0, $numCounters, 0);

                foreach ($buttonIndices as $buttonIndex) {
                    foreach ($this->buttons[$buttonIndex]->buttons as $counterIndex => $value) {
                        ++$pattern[$counterIndex];
                    }
                }

                $resultingEffect = new Joltage(...$pattern);
                $this->buttonCache[$resultingEffect->__toString()] ??= $patternLen;
            }
        }
    }

    /**
     * @param int[] $items
     *
     * @return \Generator<int[]>
     */
    private function getCombinations(array $items, int $length): \Generator
    {
        if ($length === 0) {
            yield [];

            return;
        }

        if ($length > count($items)) {
            return;
        }

        for ($i = 0; $i <= count($items) - $length; ++$i) {
            $first = $items[$i];
            $remaining = array_slice($items, $i + 1);

            foreach ($this->getCombinations($remaining, $length - 1) as $combination) {
                yield [$first, ...$combination];
            }
        }
    }
}
