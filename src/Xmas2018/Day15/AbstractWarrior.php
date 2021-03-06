<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2018\Day15;

abstract class AbstractWarrior extends AbstractPosition
{
    /** @var int */
    protected $health = 200;

    /** @var DungeonCell */
    private $cell;

    public function __construct(DungeonCell $cell)
    {
        $this->setCell($cell);
    }

    public function getCell(): DungeonCell
    {
        return $this->cell;
    }

    public function setCell(DungeonCell $cell): void
    {
        if ($cell->getWarrior()) {
            throw new \RuntimeException('Cell is occupied!');
        }

        if ($this->cell) {
            $this->cell->setWarrior(null);
        }

        $cell->setWarrior($this);
        $this->cell = $cell;
    }

    public function getHealth(): int
    {
        return $this->health;
    }

    public function isDead(): bool
    {
        return $this->health <= 0;
    }

    public function getX(): int
    {
        return $this->cell->getX();
    }

    public function getY(): int
    {
        return $this->cell->getY();
    }

    abstract public static function getSymbol(): string;

    public function __toString()
    {
        return static::getSymbol();
    }

    public function compareTo(AbstractPosition $other): int
    {
        if (! $other instanceof self) {
            throw new \InvalidArgumentException('Not comparable: ' . \get_class($other));
        }

        $compareHealth = $this->getHealth() <=> $other->getHealth();

        if ($compareHealth !== 0) {
            return $compareHealth;
        }

        return $this->compareByReadingOrder($other);
    }

    public function canAttack(AbstractWarrior $tango): bool
    {
        return ! $tango instanceof static;
    }

    public function attack(AbstractWarrior $tango): void
    {
        $tango->health -= 3;
    }

    public function getDistanceFrom(AbstractPosition $a): int
    {
        return abs($a->getX() - $this->cell->getX()) + abs($a->getY() - $this->cell->getY());
    }

    public function die(): void
    {
        $this->cell->setWarrior(null);
    }
}
