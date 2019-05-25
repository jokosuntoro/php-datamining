<?php

declare(strict_types=1);

namespace jokodm\Datamining\Dataset\Demo;

use jokodm\Datamining\Dataset\CsvDataset;

/**
 * Classes: 2
 * Samples total: 699
 * Reguler Attribut: 9
 * Spesial Attribut: 1
 */
class BreastCancer extends CsvDataset
{
    public function __construct()
    {
        $filepath = __DIR__.'/../../data/breast-cancer.csv';
        parent::__construct($filepath, 9, true);
    }
}
