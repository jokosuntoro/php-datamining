<?php

declare(strict_types=1);

namespace jokodm\Datamining\Dataset\Demo;
use jokodm\Datamining\Dataset\CsvDataset;

class PembelianKomputer extends CsvDataset
{
    public function __construct()
    {
        $filepath = __DIR__.'/../../data/pembelian-komputer.csv';
        parent::__construct($filepath, 4, true);
    }
}
