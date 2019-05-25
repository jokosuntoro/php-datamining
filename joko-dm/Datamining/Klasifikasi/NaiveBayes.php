<?php

declare(strict_types=1);

namespace jokodm\Datamining\Klasifikasi;

use jokodm\Datamining\Helper\Predictable;
use jokodm\Datamining\Helper\Trainable;
use jokodm\Datamining\Math\Statistic\Mean;
use jokodm\Datamining\Math\Statistic\StandardDeviation;

class NaiveBayes implements Classifier
{
    use Trainable, Predictable;

    public const CONTINUOS = 1;

    public const NOMINAL = 2;

    public const EPSILON = 1e-10;

    /**
     * @var array
     */
    private $std = [];

    /**
     * @var array
     */
    private $mean = [];

    /**
     * @var array
     */
    private $discreteProb = [];

    /**
     * @var array
     */
    private $dataType = [];

    /**
     * @var array
     */
    private $p = [];

    /**
     * @var int
     */
    private $sampleCount = 0;

    /**
     * @var int
     */
    private $featureCount = 0;

    /**
     * @var array
     */
    private $labels = [];

    public function train(array $samples, array $targets): void
    {
        $this->samples = array_merge($this->samples, $samples);
        $this->targets = array_merge($this->targets, $targets);
        $this->sampleCount = count($this->samples);
        $this->featureCount = count($this->samples[0]);

        $this->labels = array_map('strval', array_flip(array_flip($this->targets)));
        foreach ($this->labels as $label) {
            $samples = $this->getSamplesByLabel($label);
            $this->p[$label] = count($samples) / $this->sampleCount;
            $this->calculateStatistics($label, $samples);
        }
    }

    /**
     * @return mixed
     */
    protected function predictSample(array $sample)
    {
        // Use NaiveBayes assumption for each label using:
        //	P(label|features) = P(label) * P(feature0|label) * P(feature1|label) .... P(featureN|label)
        // Then compare probability for each class to determine which label is most likely
        $predictions = [];
        foreach ($this->labels as $label) {
            $p = $this->p[$label];
            for ($i = 0; $i < $this->featureCount; ++$i) {
                $Plf = $this->sampleProbability($sample, $i, $label);
                $p += $Plf;
            }

            $predictions[$label] = $p;
        }

        arsort($predictions, SORT_NUMERIC);
        reset($predictions);

        return key($predictions);
    }

    /**
     * Calculates vital statistics for each label & feature. Stores these
     * values in private array in order to avoid repeated calculation
     */
    private function calculateStatistics(string $label, array $samples): void
    {
        $this->std[$label] = array_fill(0, $this->featureCount, 0);
        $this->mean[$label] = array_fill(0, $this->featureCount, 0);
        $this->dataType[$label] = array_fill(0, $this->featureCount, self::CONTINUOS);
        $this->discreteProb[$label] = array_fill(0, $this->featureCount, self::CONTINUOS);
        for ($i = 0; $i < $this->featureCount; ++$i) {
            $values = array_column($samples, $i);
            $numValues = count($values);
            // jika value non-numerik,
            // nominal/categorical/discrete
            if ($values !== array_filter($values, 'is_numeric')) {
                $this->dataType[$label][$i] = self::NOMINAL;
                $this->discreteProb[$label][$i] = array_count_values($values);
                $db = &$this->discreteProb[$label][$i];
                $db = array_map(function ($el) use ($numValues) {
                    return $el / $numValues;
                }, $db);
            } else {
                $this->mean[$label][$i] = Mean::arithmetic($values);
                // tambahkan epsilon, untuk menghindari hasil nol
                $this->std[$label][$i] = 1e-10 + StandardDeviation::population($values, false);
            }
        }
    }

    /**
     * Calculates the probability P(label|sample_n)
     */
    private function sampleProbability(array $sample, int $feature, string $label): float
    {
        $value = $sample[$feature];
        if ($this->dataType[$label][$feature] == self::NOMINAL) {
            if (!isset($this->discreteProb[$label][$feature][$value]) ||
                $this->discreteProb[$label][$feature][$value] == 0) {
                return self::EPSILON;
            }

            return $this->discreteProb[$label][$feature][$value];
        }

        $std = $this->std[$label][$feature];
        $mean = $this->mean[$label][$feature];
        // Penghitungan Gaussian distribution
        // (Link: https://github.com/scikit-learn/scikit-learn/blob/master/sklearn/naive_bayes.py)
        $pdf = -0.5 * log(2.0 * pi() * $std * $std);
        $pdf -= 0.5 * pow($value - $mean, 2) / ($std * $std);

        return $pdf;
    }

    /**
     * Return samples belonging to specific label
     */
    private function getSamplesByLabel(string $label): array
    {
        $samples = [];
        for ($i = 0; $i < $this->sampleCount; ++$i) {
            if ($this->targets[$i] == $label) {
                $samples[] = $this->samples[$i];
            }
        }

        return $samples;
    }
}
