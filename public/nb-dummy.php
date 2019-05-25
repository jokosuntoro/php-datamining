<?php
require '../vendor/autoload.php';
use jokodm\Datamining\Klasifikasi\NaiveBayes;
use jokodm\Datamining\Dataset\Demo\PembelianKomputer;

$dataset = new PembelianKomputer();

$klasifikasi = new NaiveBayes();
$klasifikasi->train($dataset->getSamples(),$dataset->getTargets());

$pred = $klasifikasi->predict(['tua', 'tinggi', 'tidak', 'macet']);

echo 'masuk ke dalam kelas <b>' .$pred. '</b><br>';
