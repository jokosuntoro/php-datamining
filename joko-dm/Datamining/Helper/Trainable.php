<?php

declare(strict_types=1);

namespace jokodm\Datamining\Helper;

trait Trainable
{
    /**
     * @var array
     */
    private $samples = [];

    /**
     * @var array
     */
    private $targets = [];

    /**
     * @param array $samples
     * @param array $targets
     */
    public function train(array $samples, array $targets): void
    {
        $this->samples = array_merge($this->samples, $samples);
        $this->targets = array_merge($this->targets, $targets);
    }
}
