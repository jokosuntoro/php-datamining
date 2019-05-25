<?php

declare(strict_types=1);

namespace jokodm\Datamining\Math\Statistic;

use jokodm\Datamining\Exception\InvalidArgumentException;

class StandardDeviation
{
    /**
     * @param array|float[]|int[] $numbers
     */
    public static function population(array $numbers, bool $sample = true): float
    {
        if (empty($numbers)) {
            throw InvalidArgumentException::arrayCantBeEmpty();
        }

        $n = count($numbers);

        if ($sample && $n === 1) {
            throw InvalidArgumentException::arraySizeTooSmall(2);
        }

        $mean = Mean::arithmetic($numbers);
        $carry = 0.0;
        foreach ($numbers as $val) {
            $carry += ($val - $mean) ** 2;
        }

        if ($sample) {
            --$n;
        }

        return sqrt((float) ($carry / $n));
    }

    /**
     * Sum of squares deviations
     * ∑⟮xᵢ - μ⟯²
     *
     * @param array|float[]|int[] $numbers
     */
    public static function sumOfSquares(array $numbers): float
    {
        if (empty($numbers)) {
            throw InvalidArgumentException::arrayCantBeEmpty();
        }

        $mean = Mean::arithmetic($numbers);

        return array_sum(array_map(
            function ($val) use ($mean) {
                return ($val - $mean) ** 2;
            },
            $numbers
        ));
    }
}
