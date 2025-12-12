<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2025\Day11;

class DeviceMap
{
    /** @var array<string, Device> */
    private array $devices;
    private Device $start;
    private Device $end;
    /** @var array<string, int> */
    private array $cache;

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
        return $this->start ?? $this->getDevice('you');
    }

    public function getEnd(): Device
    {
        return $this->end ?? $this->getDevice('out');
    }

    public function countPossiblePaths(?Device $currentDevice = null, array $avoidNodes = []): int
    {
        if ($currentDevice && isset($this->cache[$currentDevice->name])) {
            return $this->cache[$currentDevice->name];
        }

        foreach ($avoidNodes as $avoidNode) {
            if ($currentDevice === $avoidNode) {
                return 0;
            }
        }

        if ($currentDevice === $this->getEnd()) {
            return 1;
        }

        $currentDevice ??= $this->getStart();

        $downstreamValidPaths = 0;
        foreach ($currentDevice->outputs as $output) {
            $downstreamValidPaths += $this->countPossiblePaths($output, $avoidNodes);
        }

        $this->cache[$currentDevice->name] = $downstreamValidPaths;

        return $downstreamValidPaths;
    }

    public function countPossibleAdvancedPaths(): int
    {
        $this->start = $this->getDevice('fft');
        $this->end = $this->getDevice('dac');
        $possiblePathsFftDac = $this->countPossiblePaths();
        $this->reset();

        $this->start = $this->getDevice('dac');
        $this->end = $this->getDevice('fft');
        $possiblePathsDacFft = $this->countPossiblePaths();
        $this->reset();

        $this->start = $this->getDevice('svr');
        $this->end = $this->getDevice('fft');
        $possiblePathsFftDac *= $this->countPossiblePaths(null, [$this->getDevice('dac'), $this->getDevice('out')]);
        $this->reset();

        $this->start = $this->getDevice('svr');
        $this->end = $this->getDevice('dac');
        $possiblePathsDacFft *= $this->countPossiblePaths(null, [$this->getDevice('svr'), $this->getDevice('out')]);
        $this->reset();

        $this->start = $this->getDevice('dac');
        $this->end = $this->getDevice('out');
        $possiblePathsFftDac *= $this->countPossiblePaths(null, [$this->getDevice('svr'), $this->getDevice('fft')]);
        $this->reset();

        $this->start = $this->getDevice('fft');
        $this->end = $this->getDevice('out');
        $possiblePathsDacFft *= $this->countPossiblePaths(null, [$this->getDevice('svr'), $this->getDevice('dac')]);
        $this->reset();

        return $possiblePathsDacFft + $possiblePathsFftDac;
    }

    protected function reset(): void
    {
        $this->cache = [];
    }
}
