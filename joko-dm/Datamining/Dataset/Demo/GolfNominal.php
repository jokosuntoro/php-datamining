<?php

declare(strict_types=1);

namespace jokodm\Datamining\Dataset\Demo;
use jokodm\Datamining\Dataset\CsvDataset;

class GolfNominal extends CsvDataset
{
    public function __construct()
    {
        $filepath = __DIR__.'/../../data/bermain-golf-nominal.csv';
        parent::__construct($filepath, 4, true);
    }
}
