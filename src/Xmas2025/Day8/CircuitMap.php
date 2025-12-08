<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2025\Day8;

class CircuitMap
{
    /** @var Circuit[] */
    private array $circuits = [];

    /** @var array<string, float> */
    private array $distances = [];

    public static function parse(string $input): self
    {
        $circuitMap = new self();

        foreach (explode("\n", $input) as $line) {
            $circuitMap->circuits[] = new Circuit(
                Coordinates3D::fromString($line)
            );
        }

        $circuitMap->warmupDistanceCalculations();

        return $circuitMap;
    }

    public function connectTwoNearestBoxes(): string
    {
        if (empty($this->distances)) {
            throw new \RuntimeException('No more distances');
        }

        $nextShortestJunction = array_key_first($this->distances);
        array_shift($this->distances);

        [$firstBoxName, $secondBoxName] = explode('-', $nextShortestJunction);
        $firstBox = Coordinates3D::fromString($firstBoxName);
        $secondBox = Coordinates3D::fromString($secondBoxName);

        $this->mergeCircuits($firstBox, $secondBox);

        return $nextShortestJunction;
    }

    public function multiplyTopThreeCircuits(): int
    {
        if (count($this->circuits) < 3) {
            throw new \RuntimeException('Circuits must have at least 3 distances');
        }

        $completedCircuits = $this->circuits;
        usort($completedCircuits, static fn(Circuit $a, Circuit $b) => count($b->getBoxes()) <=> count($a->getBoxes()));

        return count(array_shift($completedCircuits)->getBoxes())
            * count(array_shift($completedCircuits)->getBoxes())
            * count(array_shift($completedCircuits)->getBoxes())
        ;
    }

    public function countCircuits(): int
    {
        return count($this->circuits);
    }

    private function warmupDistanceCalculations(): void
    {
        $circuits1 = $this->circuits;
        foreach ($circuits1 as $circuit1) {
            foreach ($circuit1->getBoxes() as $box1) {
                $circuits2 = $this->circuits;
                foreach ($circuits2 as $circuit2) {
                    foreach ($circuit2->getBoxes() as $box2) {
                        $this->saveDistance($box1, $box2);
                    }
                }
            }
        }

        asort($this->distances);
    }

    private function saveDistance(Coordinates3D $box1, Coordinates3D $box2): void
    {
        if ($box1 == $box2) {
            return;
        }

        $this->distances[$box1->identifierWith($box2)] =  $box1->distance($box2);
    }

    private function mergeCircuits(Coordinates3D $firstBox, Coordinates3D $secondBox): void
    {
        if ($this->areOnTheSameCircuit($firstBox, $secondBox)) {
            return;
        }

        $firstCircuit = $this->findCircuit($firstBox);
        $secondCircuit = $this->findCircuit($secondBox);
        unset($this->circuits[array_search($secondCircuit, $this->circuits, true)]);

        $firstCircuit->merge($secondCircuit);
    }

    private function findCircuit(Coordinates3D $box): Circuit
    {
        foreach ($this->circuits as $circuit) {
            if ($circuit->has($box)) {
                return $circuit;
            }
        }

        throw new \RuntimeException('Circuits do not contain ' . $box);
    }

    private function areOnTheSameCircuit(Coordinates3D $firstBox, Coordinates3D $secondBox): bool
    {
        return $this->findCircuit($firstBox)->has($secondBox);
    }
}
