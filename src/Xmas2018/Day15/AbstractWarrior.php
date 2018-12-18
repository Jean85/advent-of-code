<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2018\Day15;

abstract class AbstractWarrior extends AbstractPosition
{
    /** @var int */
    private $health = 300;

    public function getHealth(): int
    {
        return $this->health;
    }

    public function moveTo(Distance $distance): void
    {
        $this->x = $distance->getX();
        $this->y = $distance->getY();
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

        $compareHealth = $other->getHealth() <=> $this->getHealth();

        if ($compareHealth !== 0) {
            return $compareHealth;
        }

        return parent::compareTo($other); // TODO: Change the autogenerated stub
    }

    public function canAttack(AbstractWarrior $tango): bool
    {
        if ($tango instanceof self) {
            return false;
        }

        return 1 === abs($this->x - $tango->x) + abs($this->y - $tango->y);
    }
}
