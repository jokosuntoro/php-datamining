<?php

declare(strict_types=1);

namespace jokodm\Datamining\Dataset\Demo;
use jokodm\Datamining\Dataset\CsvDataset;

class DummyDataset extends CsvDataset
{
    public function __construct()
    {
        $filepath = __DIR__.'/../../data/dummy.csv';
        parent::__construct($filepath, 2, true);
    }
}
