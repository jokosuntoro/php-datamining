<?php

declare(strict_types=1);

namespace jokodm\Datamining\Math;

interface Distance
{
    /**
     * @param array $a
     * @param array $b
     */
    public function distance(array $a, array $b): float;
}
