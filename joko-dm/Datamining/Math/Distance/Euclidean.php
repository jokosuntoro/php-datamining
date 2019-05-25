<?php

declare(strict_types=1);

namespace jokodm\Datamining\Math\Distance;


use jokodm\Datamining\Math\Distance;

class Euclidean implements Distance
{
    /**
     * @throws InvalidArgumentException
     */
    public function distance(array $a, array $b): float
    {
        $distance = 0;

        foreach ($a as $i => $val) {
            $distance += ($val - $b[$i]) ** 2;
        }

        return sqrt((float) $distance);
    }

    /**
     * Square of Euclidean distance
     */
    public function sqDistance(array $a, array $b): float
    {
        return $this->distance($a, $b) ** 2;
    }
}
