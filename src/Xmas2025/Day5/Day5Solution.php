<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2025\Day5;

use Jean85\AdventOfCode\Input;
use Jean85\AdventOfCode\SecondPartSolutionInterface;
use Jean85\AdventOfCode\SolutionInterface;

class Day5Solution implements SolutionInterface, SecondPartSolutionInterface
{
    public function solve(?string $input = null): string
    {
        $input ??= Input::read(__DIR__);

        [$rangesInput, $ingredientsInput] = explode("\n\n", $input);

        $ingredientRanges = IngredientRanges::parse($rangesInput);
        $ingredients = array_map('intval', explode("\n", $ingredientsInput));

        $goodIngredients = 0;
        foreach ($ingredients as $ingredient) {
            if ($ingredientRanges->isInRange($ingredient)) {
                ++$goodIngredients;
            }
        }

        return (string) $goodIngredients;
    }

    public function solveSecondPart(?string $input = null): string
    {
        $input ??= Input::read(__DIR__);
        [$rangesInput, $ingredientsInput] = explode("\n\n", $input);
        $ingredientRanges = IngredientRanges::parse($rangesInput);

        return (string) $ingredientRanges->countValidIngredients();
    }
}
