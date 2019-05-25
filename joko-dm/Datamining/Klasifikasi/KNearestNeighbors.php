<?php

declare(strict_types=1);

namespace jokodm\Datamining\Klasifikasi;

use jokodm\Datamining\Helper\Predictable;
use jokodm\Datamining\Helper\Trainable;
use jokodm\Datamining\Math\Distance;
use jokodm\Datamining\Math\Distance\Euclidean;

class KNearestNeighbors implements Classifier
{
    use Trainable, Predictable;

    /**
     * @var int
     */
    private $k;

    /**
     * @var Distance
     */
    private $distanceMetric;

    /**
     * @param Distance|null $distanceMetric (if null then Euclidean distance as default)
     */
    public function __construct(int $k = 3, ?Distance $distanceMetric = null)
    {
        if ($distanceMetric === null) {
            $distanceMetric = new Euclidean();
        }

        $this->k = $k;
        $this->samples = [];
        $this->targets = [];
        $this->distanceMetric = $distanceMetric;
    }

    /**
     * @return mixed
     */
    protected function predictSample(array $sample)
    {
        $distances = $this->kNeighborsDistances($sample);

        $predictions = array_combine(array_values($this->targets), array_fill(0, count($this->targets), 0));

        foreach ($distances as $index => $distance) {
            ++$predictions[$this->targets[$index]];
        }

        arsort($predictions);
        reset($predictions);

        return key($predictions);
    }

    /**
     * @throws \Exception\InvalidArgumentException
     */
    private function kNeighborsDistances(array $sample): array
    {
        $distances = [];

        foreach ($this->samples as $index => $neighbor) {
            $distances[$index] = $this->distanceMetric->distance($sample, $neighbor);
        }

        asort($distances);

        return array_slice($distances, 0, $this->k, true);
    }
}
