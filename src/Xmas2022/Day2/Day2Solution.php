<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2022\Day2;

use Jean85\AdventOfCode\SecondPartSolutionInterface;
use Jean85\AdventOfCode\SolutionInterface;

class Day2Solution implements SolutionInterface, SecondPartSolutionInterface
{
    private const INPUT = 'B Z
B X
C Y
B Y
B Y
A X
A X
B Z
A Z
B Z
B Y
B X
C X
B Y
A Z
B Y
A X
B X
C Y
B Y
B Y
C Y
B X
B X
C X
B Y
B Y
B Y
C Y
C X
B Y
C X
C X
B Y
B Z
C Y
B Y
B Z
B X
B Y
B Y
C Y
B Y
C Y
C Y
A Z
B X
C X
B Y
B X
C X
A X
B Y
C Y
B X
C X
C Y
B X
B Z
B Y
B X
C Y
B X
B Y
B Y
B Y
B Y
A X
A Z
B Z
B Y
C X
B Y
B Y
C Y
C Z
C Z
C X
B X
C Z
B Y
B Y
C X
C Z
C X
A Z
C Y
B Y
B Y
B Y
C Y
C Y
C X
C X
C Z
A X
B Y
C X
B Z
B Y
C X
B X
B Z
A Z
C Y
B Z
C X
C X
B Y
B Y
B Y
C Y
C X
B X
B Y
A Z
A Z
C Y
B Y
C Y
C Y
C Y
B X
A Z
C Y
C Y
A Z
A Z
B X
B Y
B Z
A Z
B X
B Y
C Z
C Z
B Z
B Y
B X
A Y
C Z
C X
A Z
A Z
B Y
B Y
C Y
C Y
B Y
B Y
B Y
A Z
C Y
C Z
C X
A Z
B X
B Y
A Y
A Y
B Y
B Y
C X
B Y
B Y
C Z
B Y
B Y
A Z
C Y
B X
C X
A X
C X
B Y
B X
A Z
C X
C Y
A Z
B Y
A Z
B X
B X
A Z
B Y
C X
C X
A Z
A X
C X
C X
C X
B Y
C Z
C Y
C X
B Y
B Y
B Y
A X
A Z
C Y
B Y
B Y
A X
C Y
C Z
C Y
C X
B Y
B Y
B Y
B Y
A Z
B Y
A Z
B X
B Y
B Y
B X
C Y
A X
A Z
B Y
C Y
C Y
B Y
B Y
C X
B Y
B X
A Z
B Y
B Y
C Y
B Y
B Y
B Y
A X
B X
B Z
C Y
B Z
C X
C X
B Z
B Y
A Z
A Z
B Y
C X
A X
C Y
B Y
B Y
A X
B Y
A Y
C Y
B Y
C X
B Y
A Z
B Z
C Y
B Y
B Y
C X
B Y
B Y
B Y
C Z
A X
B Y
B X
C X
C Z
C Z
C Y
C Y
A X
C Y
B Y
A X
C X
A Z
C X
B Y
C Z
C Z
A Z
A X
C Y
C X
B Y
C Z
B Y
C Y
C X
C Y
B Y
B Y
B Y
A X
A Z
B Y
B X
B X
B Y
B Y
B Y
A Z
B Y
B Y
A X
A X
A Z
A Z
B X
C Y
A Z
B Y
B Y
C Z
C X
C Y
A Z
C Y
C Y
C Y
C Y
C X
A Z
C Z
A Z
C Y
C X
B Y
B Y
C Z
B X
B Z
C X
A Y
C Y
B X
B X
B Y
C Y
A Z
A Z
B X
B Z
B X
C Y
A X
A X
C Z
B Y
C Y
C X
B Y
A Z
B Y
C Y
B Z
C Z
C X
B Z
C Z
B Z
A X
C Y
A Z
B Y
B Y
B Y
B Y
B Y
B Y
A Z
C Z
B X
C X
C Y
C Y
B Y
C X
C X
A Y
C Y
C Y
A Z
C Z
B Y
B X
C X
B Y
C X
B Y
B Y
C X
B Y
B Y
B Y
A Z
C Y
B Z
B Y
C X
B Y
C X
A Y
A Z
B Y
B Y
B Y
A Z
B Y
B Y
B Y
B Y
B Z
C Y
B Z
B Z
A Z
B Y
B Y
C X
A X
B Y
A Z
C X
C X
B Y
B Y
A X
B Y
B Y
C X
B Y
C X
B Y
B Y
B Y
B Y
A X
B Y
B Z
B Y
A Z
C X
C X
C Y
A Z
C Y
B Y
B X
A X
B Y
A Z
B Y
C Y
B Y
B Y
C Y
C X
A Z
A X
A Z
C Z
B Y
B Y
C Y
B X
C X
B Y
A Z
B Y
C X
A X
C X
C Y
C Y
B X
B Y
B Y
C Z
B Y
C X
A Z
C Z
C Y
A Z
C X
C Y
C Y
C X
B Y
B Y
C Z
A Z
B Y
A X
B Y
A X
A X
C Y
C X
A Z
B Y
C Y
C X
B Y
B Y
B Y
B X
B X
A X
C X
B Y
C Y
A Z
A Z
A Z
B Y
A Z
B Y
C X
B Y
C X
C Y
A Z
B Y
B Z
A Z
B Y
A Z
B Y
B Y
C Z
B Y
B Y
A Z
A X
C Z
C Z
B Z
B Y
A Z
B Y
B Y
B Y
B Y
C Z
A Z
C X
B X
B Y
A X
A X
B Y
A Z
A X
C Y
B Y
C X
A Z
B Y
C Z
C Y
B Y
A X
C Y
B Y
B Z
A Y
B Y
B Y
A Z
B Y
C Z
C X
B Y
A Y
C Z
B X
A X
B Y
B Y
B Z
B Z
C Y
B Y
B Y
A Z
A Z
B Y
B X
C Y
C Y
B Y
B Y
B Z
B Z
B Y
C Y
A Z
B Y
A Z
B Y
B Y
A Z
A Z
C X
C Z
B Y
C X
B X
A Z
B Y
B Y
C X
B Y
B Y
B Y
B Y
B X
B Y
A X
B Z
A Z
C Z
B X
A Z
C Y
C Y
A Z
B Y
C Z
C Z
C Y
B Y
B Y
B Y
A Z
B Y
B X
C X
B Y
B Y
B Y
B Y
C Y
B Y
C Y
B Y
C Y
C X
A Z
C Y
C Z
C Z
B X
C Y
B Y
B X
C Y
B Y
B Y
C Y
C X
C X
A Z
B Y
C X
A Z
C Z
B Y
B Y
C X
C X
B Y
B X
C Y
B Y
B Y
A Z
A Z
C Z
A Z
B Y
C X
C X
B X
B Y
B Y
B Z
B Y
B Y
B Y
B Y
B Z
B Y
C Y
C Z
B Y
C Y
C Y
C Y
C Y
A Z
A Z
C Y
C Y
A X
B Y
C Y
A X
C X
C Y
A Z
B Y
B Z
A X
B Y
B Z
B Y
B Y
B Z
C X
C Y
B Y
B Z
B X
A Z
B Y
C Y
B Y
B Y
A X
C X
B Y
C X
B Y
C Y
A X
A X
A Z
C Y
B Y
C Y
C X
B X
C X
C X
A X
A Z
B Y
B Y
B Y
A Z
B Y
B Y
B Y
B Y
B Y
B Y
B X
B Y
C Y
B Y
A Z
B Y
C X
C Y
B Z
C Z
B Y
A Y
C X
B Y
B Y
B Y
C X
A Y
C Z
B Y
C X
C Y
C Y
C Y
C X
C Y
B Z
B Y
C Y
C X
B Y
B Y
B X
C Y
B X
C Z
B Y
C X
B Z
C X
B Y
C X
B Y
C Y
C Y
A Z
C Y
C X
B Y
C X
B X
A Z
B Y
A Z
A Z
A Z
C Y
B X
A Y
C Y
B Y
B Y
C Y
C Y
C X
B X
A X
A Z
C X
A Y
B X
C Z
B Y
B Y
B X
C X
B Y
B Y
B Y
B X
B Y
C X
B Y
B Y
C Z
C Y
B Y
C Y
B Y
A Z
C Z
A Y
B Y
B Y
B Y
C Y
C Y
C Y
B Y
C Z
B Y
C Z
A Z
A Z
C Z
C Y
C Z
C Y
A Z
C X
B X
B Y
C Y
B Z
C Z
C X
B Y
A Z
B Y
C X
B Z
A X
B Y
A Z
C Z
C X
C X
C Y
B Y
B Y
A Z
A Z
B Y
B X
A Z
B Y
C Y
A X
C Z
B Y
B X
B Y
C Y
C Z
B Z
A Z
B Y
A X
C X
B Y
A Z
C X
B Z
C Y
C Y
C X
C X
C Y
B Y
B Y
B Z
B X
C X
B Z
C X
B X
C Z
C Z
C X
B Y
C Y
C X
B Y
A Z
C Y
C Z
C Z
C Y
B Y
A X
C Z
C X
B Y
C X
C Z
B Y
C Y
B Y
C Y
A Z
B Z
C Z
C X
B Z
B Z
B Y
A Y
C Y
C Y
B X
B X
B Y
B Y
B Y
C X
B Z
B Y
B Y
B Y
C X
A X
C Y
A X
B Y
B Y
B Y
B Y
B Y
C Y
C Y
B Y
B Y
B Y
B Y
C Y
B Y
C X
B Y
B Y
C X
A Z
A X
C Y
C Z
B Y
C X
B Y
B X
A Z
B X
B Y
B Y
A Z
B Y
B Y
B Y
B Z
A Z
A X
B Y
A Z
C Y
B Y
C X
B Y
C Y
B Y
B Y
C X
C Y
A Y
C X
C Y
B Y
A Y
A Z
C Z
A Y
A Z
B Y
C Y
C Y
B Y
B Y
B Y
B Y
A Z
B Y
B Y
B Y
C X
C X
B Y
C X
B Y
A Z
B Y
B X
C Z
C Y
A Y
B Y
C Y
B Y
C Y
C Y
C Y
C X
C Y
B Y
B Y
C Y
B Y
C Y
A Z
A X
B Y
A Z
B Y
C X
C X
B Y
C Z
B Y
B Y
C Y
B Y
C Z
A Y
B Y
C Y
B Y
A Z
C Y
B Z
C Y
C Y
C Z
B Y
C X
B Z
B Y
B Y
B Y
C Z
B Y
B Y
B Y
A Z
C X
B Z
B Y
B Y
C Y
B Y
C X
B Y
B Y
C Y
C X
C Y
B Y
B Y
C Y
B Y
A Y
B Y
A Z
B Y
B Y
B X
A Z
B Y
B Y
C Y
C X
C Z
A Z
A Z
C X
B Y
C Y
B Y
C X
B Y
B Y
C Y
C X
B Y
B Y
B Y
B Y
B Y
C X
B Z
B Z
A Z
B Z
B Y
B Z
B Y
C Y
A Z
A X
B Y
C Z
B X
A X
C Y
B Y
B Y
C Y
B Y
C Y
B Y
A Z
B Y
B Y
A Z
B Y
B Y
A Z
B Y
B Y
B Y
B Y
C Y
B Y
A X
A X
B Y
B Y
A Y
C Z
A Z
A Z
B Y
A Z
C Y
B Y
B Y
B Y
B Y
C Y
B Y
A X
B X
B Y
B Y
B Y
B Y
B X
C Y
B Y
B Y
B X
C Y
A Y
B Y
B Y
B Y
A X
B Z
C X
A X
C Z
B Y
B Y
B Y
C X
B Y
B Y
B Y
B Y
C Y
B Z
B Z
B Y
B Z
B Y
B Y
C Z
C Y
B Y
C Z
C Z
B Y
C X
A Y
B Y
B Z
A Z
B Y
C X
B Y
B Y
C Z
A Z
B Y
B X
B Y
C Y
B Y
B Z
B Y
B Y
C X
C X
C Z
B Y
B Y
B Y
A Z
A X
B Y
A Z
B Y
B Y
B Y
B Z
C X
C Z
B Y
B Y
B Y
C Z
B X
C Z
A X
B Y
C Y
B Y
A Z
A X
C X
B X
A Z
C X
B Y
C Y
B X
A Z
C Y
C Y
B Z
C X
B Y
C X
C Z
C Y
B Y
C Z
B Y
B Y
C X
B Y
B Y
B Y
B Y
B Y
B Y
C X
B Y
B Y
B Y
A Z
B Y
B Y
C Z
B Y
B Y
B Y
C X
A Z
B Z
C Y
C Y
B Y
A X
C Y
B Y
C Z
B Z
B Y
B Y
C Y
B Y
B Y
B Y
C Z
A X
B Y
C Y
A X
B Y
B Y
A X
B Y
A Y
C X
A Z
A Z
C Y
B Y
C Z
C Y
C Y
C Z
A Z
A X
C Z
B Y
C X
A Z
C X
B Y
B Y
B Y
C Z
C Y
C X
C Y
A Y
C X
A Z
A Z
B Z
C X
B Y
B Y
C X
A Z
C Z
C Z
B Y
B Y
A Y
C X
B Z
B Y
B Y
C X
C X
C Z
C Z
B Y
B Y
B X
B Y
B Y
C Z
C Y
C Z
B Y
B Y
B Y
C Y
B X
C X
A Z
C X
C X
C Y
B Y
B Y
C Y
B Z
B Z
C X
C Y
B Y
B Z
B Y
B X
A Z
C X
B Z
A Z
C X
B Y
C Y
C Y
B Y
B Y
B Y
B X
A X
B Y
A X
A Z
C Y
B Y
B Y
B Y
B Y
B Y
C Z
B X
B Y
C X
A Z
B Y
B Y
A Z
B Y
C Y
C Z
C X
C Y
B Y
B Y
B Z
B Y
A X
C Y
B Y
A X
B Y
C X
A Z
B Y
C X
A Z
B Y
C X
C Y
C X
B Z
C Z
B Y
C Y
C X
C Y
B Z
B X
A X
C Z
B Y
B Y
C Y
B Z
C X
C X
B Y
B Y
C Y
B X
B Y
C Y
B Y
B Y
A Z
B Y
B Y
B Y
A X
A Z
B Z
B Z
B Y
A Z
B Y
C Y
B Y
C X
B X
B Y
B Y
B X
C Z
B Y
C Z
C X
B Y
C Z
B Y
C Y
B Z
C Y
C Y
C Z
C Z
A X
B Y
A Z
B Y
B X
A X
B Y
B Y
B Y
C Y
B Y
B X
B Z
C Z
B X
B Z
B Y
C Y
B Y
B Z
C X
A Z
B X
B Z
C X
C Z
B Y
A Z
C X
C Y
B Z
B Y
C Y
B Y
C Y
B Y
B Y
B Y
C Y
B Y
C Y
C X
C Z
B Y
B Y
B X
C Z
B X
A Z
C Y
A Z
C X
C Y
B Y
C Z
B Z
C Z
C Y
C X
B Y
C Z
C X
B Y
B Y
B Y
B X
B Y
B Y
C X
A X
B Z
C X
C Z
B Y
C Y
B Z
C Z
B Y
C X
B Y
B Y
A Z
C Z
B Y
C Z
C X
B Y
B Y
C X
C X
C Y
B Y
A X
A Z
B Y
C X
B Y
B Y
C Y
B Y
A Z
A Z
C X
C Z
C X
C X
A X
B Y
B Y
C Y
C Z
C Y
B Z
C Y
B Y
B Y
B Y
C Y
B Z
B Y
B Y
B X
C Y
C Y
B Y
A X
C X
A X
C Z
C Y
A Y
B Y
B Y
B Z
C X
C X
B Y
A X
B Y
A Z
B Y
A Z
C X
C X
B Y
B Y
B Y
B Y
A X
B Y
B Z
C Y
C X
C Z
C Z
B Y
C Z
B Y
B Y
C X
B Y
A X
A Z
B Y
A Z
C X
B Y
C Y
B Z
C Z
B Y
B Y
B Y
B Y
C Y
C Z
B X
B Y
A Y
C Y
B Z
B Y
C Y
A Z
B Y
B Y
C Y
C Y
A Y
C Y
A Z
C Y
B X
B Y
B Y
C Y
A Z
C Y
A Z
B Y
B Y
B Y
B Y
A X
C Y
A Z
B Y
B Y
B Y
B Y
B Z
C Z
C Y
C X
B Y
C X
B Y
B Y
B Y
B Y
A Z
B Y
C Y
C Y
A Z
A X
B Y
C Y
C Y
B Y
C Y
C Y
C Y
C Z
A Z
C X
C Y
C X
B Y
B Y
C X
C Z
C X
C Z
B X
B Y
C Z
B Z
A Z
C Y
B Z
C Y
B Y
A X
B Y
A Z
B Y
A X
B Y
B X
B Z
B X
B Y
B Y
B Y
C X
B Y
B X
C X
B Y
B Z
B Y
C Y
B Y
B Y
C X
A Z
C X
B Y
C Y
C Z
B Y
C Z
B Y
B Y
B Y
B Y
C Z
C X
C Y
C Z
B X
A Z
A Z
B Y
B Z
C Y
A X
B Y
B Y
A Z
B Y
B Y
B Y
B Y
A Z
C Z
B Z
C Y
A Z
C Y
B Y
B Y
B Y
B Z
B Y
C X
C Z
B X
C X
B Y
C Z
C X
B Y
A Z
A Z
B Y
B Y
B Y
C X
A Y
B Y
B Y
A Z
A Z
C Z
C Y
B Y
B Y
A X
B Z
A X
B Y
A Z
B Y
C X
B Y
A Y
B Y
B Z
B Y
B Z
B Y
B Y
C Y
C Y
B Y
C X
C Z
B Y
B Y
B Y
C Z
A Z
C X
B Y
B Z
B Y
C Y
B Y
C X
B Y
B Y
C Y
B Y
B Y
B Y
B Y
B Y
B Y
B X
B Y
B Y
C X
B Y
B Z
A Z
A Z
C X
B X
B X
C Y
C Z
B Y
C X
A X
B Y
C X
C Z
C X
B Y
B Y
C Y
B Y
B Y
B Y
A Z
C Z
C X
B Y
B Y
A X
B Y
C Y
B Y
B Y
C Y
B X
B X
A X
C Y
C Z
C Y
B Y
B Y
C X
A X
A X
C X
B Y
C X
B Y
B Y
B Y
C Y
A Z
B Z
A Z
B Y
B X
C Y
B Z
B Y
A Z
B Y
C Y
B Y
C Y
A X
B Y
B Y
B Y
C X
A Z
C Y
B Y
B Y
B Y
C X
B Y
C Y
B Y
B X
C X
B Y
B Y
C Y
C X
C Z
C Z
B Y
B Y
B Y
B X
C X
B X
A Y
A Z
C Y
A X
B Y
B Y
B Y
A Z
C Y
C X
C Y
C Z
A Z
B Y
B Y
B Y
B Y
A Z
B Y
A Z
B Y
B Y
C Y
C Z
C Y
A Z
C Y
B Y
C Y
B X
B Y
A X
C Z
C Z
A X
C X
C Z
C X
C X
B Y
A X
A Z
C Y
B Y
C X
B Y
B Y
B X
C Y
C Z
B Y
B Z
A Z
C Y
B Y
A Z
B Y
C X
C X
B Z
C Y
B X
B Y
C Y
B Z
A Z
C X
C Y
C X
C Z
B Z
C Z
B Y
B X
B Y
B X
B Y
B Y
B Y
B Y
C X
C X
C Y
B Z
C X
B Y
B Y
B Z
C Z
C Y
B Y
B Y
B Y
C X
B Z
B Y
B X
B Y
C Y
C X
C Z
C X
C Y
B Y
B Y
B X
B Y
C X
B X
A X
B Y
C Y
B Y
A X
C Y
B Z
B Z
C X
C Z
C X
B Y
C Y
C Y
B Y
C Z
B Y
C Y
B Y
C Y
A Z
B Z
C X
C X
B Y
B Y
B Z
B Y
B Z
A X
C X
C X
B Y
C X
A Z
C Y
B Y
A Z
C Z
B X
C Y
C X
C X
A Z
B Y
B Y
C Z
B Y
A Y
C Y
B Y
B X
B Z
C X
B Y
B X
C Z
B Y
B X
B Y
B Y
B Y
A Z
A Z
B Z
A Z
C Y
C Z
B X
C X
A Z
C X
B Y
B Y
A X
B X
B Y
B X
B X
A Y
A Z
C X
B Z
B Z
C Y
C Y
B Y
B Y
B Y
A Z
A Z
B Y
B Y
C Y
C Y
C Y
C Z
C X
C Y
B Y
B X
B Y
A Y
A X
C Y
B Y
A Z
B Y
B Y
C X
C X
B Y
B Y
C Y
A Z
B Y
C Y
C Z
C Z
C Y
A Y
B Y
B Y
C Y
B X
C Z
C Z
C Z
B Y
B Y
B Y
C Y
A Z
B Y
A Z
B Y
A Z
C X
C Z
C Y
B Y
A Z
B Y
B Y
C Z
B Y
C X
B Y
C Y
C Y
B Y
B Y
A X
C Z
B Y
C Y
C X
B Y
B Y
B Y
B Z
A Z
B Y
B Y
B Y
A Z
B Y
A X
B Y
B Y
B Y
C Y
C X
C Y
A Z
B Y
C Y
B Y
C Y
C Y
C Y
A X
C Z
B Y
B Y
C Z
B Y
B Y
C Z
B Z
B Y
C Y
B Y
B Y
B Y
B Y
B X
C X
C Y
B Y
A Z
B Y
A X
B Y
B Y
B Y
B Y
C Z
C Z
B Y
A Z
B Y
C X
C X
C Y
B X
A X
B X
B Y
C X
C Z
C Y
C Y
B Y
C Z
B Y
B Y
C Z
A X
B Y
C Z
B Z
B Y
C X
C X
B Y
B Y
B X
C Z
A Z
A X
B Y
C X
B Y
B Y
C Z
B Z
C Y
B Y
B X
C X
C Z
B Z
B Z
C Y
B Y
A X
B Y
B Y
C X
B X
A Z
B Y
A Z
B Y
B Y
A Z
C X
C X
B Y
B X
B Y
A Z
C Y
C Z
B Y
B Y
A X
B Y
C Y
C Y
B Y
A X
B Y
B Y
A Z
C X
C X
C Y
B Y
A X
B Y
B Y
C Y
B Y
B Y
B Y
B Z
B Y
C Y
C Y
B Y
C X
C X
B Y
C Y
B Y
C X
B Y
B Z
B Y
A Z
A Z
C X
A Z
A Z
B Y
B X
C Z
B Y
B Y
B Y
B Y
B Y
C X
C Y
B Y
A X
C X
C X
C Y
B Y
C X
C X
C Z
B Z
C Y
C X
B Y
B Y
C X
B X
C Z
B Y
B Y
C Y
A Z
C Y
C X
C Y
B Y
B Y
C X
C Y
C Y
C X
B Z
B Z
B Y
B Y
C Y
B Y
C X
A Z
A X
C Z
B Y
C Y
C Y
B Y
B Y
C Y
B Y';

    private const DRAW = 3;
    private const WON = 6;
    private const LOST = 0;

    public function solve(string $input = self::INPUT): string
    {
        $totalScore = 0;

        foreach (explode(PHP_EOL, $input) as $round) {
            $totalScore += $this->calculateScore($round);
        }

        return (string) $totalScore;
    }

    public function solveSecondPart(string $input = self::INPUT): string
    {
        $totalScore = 0;

        foreach (explode(PHP_EOL, $input) as $round) {
            $totalScore += $this->calculateAction($round);
        }

        return (string) $totalScore;
    }

    private function calculateScore(string $round): int
    {
        [$a, $b] = explode(' ', $round);
        $b = match ($b) {
            'X' => 'A',
            'Y' => 'B',
            'Z' => 'C',
        };

        $a = Sign::from($a);
        $b = Sign::from($b);

        return match ($b) {
            Sign::Rock => 1,
            Sign::Paper => 2,
            Sign::Scissor => 3,
        } + $this->calculateOutcome($a, $b);
    }

    private function calculateOutcome(Sign $a, Sign $b): int
    {
        if ($a === $b) {
            return self::DRAW;
        }

        return match ($a) {
            Sign::Rock => match ($b) {
                Sign::Paper => self::WON,
                Sign::Scissor => self::LOST,
            },
            Sign::Paper => match ($b) {
                Sign::Rock => self::LOST,
                Sign::Scissor => self::WON,
            },
            Sign::Scissor => match ($b) {
                Sign::Rock => self::WON,
                Sign::Paper => self::LOST,
            },
        };
    }

    private function calculateAction(string $round): int
    {
        [$a, $b] = explode(' ', $round);
        $a = Sign::from($a);
        $b = match ($b) {
            'X' => match ($a) { // NEED TO LOSE
                Sign::Rock => Sign::Scissor,
                Sign::Paper => Sign::Rock,
                Sign::Scissor => Sign::Paper,
            },
            'Y' => $a, // NEED TO DRAW
            'Z' => match ($a) { // NEED TO WIN
                Sign::Rock => Sign::Paper,
                Sign::Paper => Sign::Scissor,
                Sign::Scissor => Sign::Rock,
            },
        };

        return match ($b) {
            Sign::Rock => 1,
            Sign::Paper => 2,
            Sign::Scissor => 3,
        } + $this->calculateOutcome($a, $b);
    }
}