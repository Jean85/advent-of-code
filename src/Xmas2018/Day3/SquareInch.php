<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2018\Day3;

class SquareInch
{
    /** @var Claim[] */
    private $claims = [];

    public function addClaim(Claim $claim): void
    {
        $this->claims[] = $claim;
    }

    /**
     * @return Claim[]
     */
    public function getClaims(): array
    {
        return $this->claims;
    }

    public function getClaimCount(): int
    {
        return \count($this->claims);
    }
}
