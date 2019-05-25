<?php

declare(strict_types=1);

namespace jokodm\Datamining\Dataset\Demo;
use jokodm\Datamining\Dataset\CsvDataset;

class BermainGolf extends CsvDataset
{
    public function __construct()
    {
        $filepath = __DIR__.'/../../data/bermain-golf-numerik.csv';
        parent::__construct($filepath, 4, true);
    }
}
