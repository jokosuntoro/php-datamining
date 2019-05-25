<?php
require '../vendor/autoload.php';
use jokodm\Datamining\Klasifikasi\DecisionTree;
use jokodm\Datamining\Dataset\Demo\PembelianKomputer;

$dataset = new PembelianKomputer();

$klasifikasi = new DecisionTree();
$klasifikasi->train($dataset->getSamples(),$dataset->getTargets());

$pred = $klasifikasi->predict(['tua', 'rendah', 'ya', 'lancar']);

echo 'masuk ke dalam kelas <b>' .$pred. '</b><br>';
