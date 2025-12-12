<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2025\Day11;

class DeviceMap
{
    /** @var array<string, Device> */
    private array $devices;
    private int $possiblePaths = 0;

    public static function parse(string $input): self
    {
        $deviceMap = new self();

        foreach (explode("\n", $input) as $line) {
            $deviceInput = explode(' ', $line);
            $deviceName = trim(array_shift($deviceInput), ':');

            $device = $deviceMap->getDevice($deviceName);
            foreach ($deviceInput as $outputName) {
                $device->outputs[] = $deviceMap->getDevice($outputName);
            }
        }

        return $deviceMap;
    }

    public function getDevice(string $name): Device
    {
        return $this->devices[$name] ??= new Device($name, []);
    }

    public function getStart(): Device
    {
        return $this->getDevice('you');
    }

    public function getEnd(): Device
    {
        return $this->getDevice('out');
    }

    public function countPossiblePaths(?Device $currentDevice = null): void
    {
        if ($currentDevice === $this->getEnd()) {
            ++$this->possiblePaths;

            return;
        }

        $currentDevice ??= $this->getStart();

        foreach ($currentDevice->outputs as $output) {
            $this->countPossiblePaths($output);
        }
    }

    public function getPossiblePaths(): int
    {
        return $this->possiblePaths;
    }
}
