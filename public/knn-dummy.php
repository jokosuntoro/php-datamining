<?php
require '../vendor/autoload.php';
use jokodm\Datamining\Klasifikasi\KNearestNeighbors;
use jokodm\Datamining\Dataset\Demo\DummyDataset;

//load dataset dummy.csv
$dataset = new DummyDataset();

//set data training
$dataTrain = $dataset->getSamples();
$dataClass = $dataset->getTargets();

$knn = new KNearestNeighbors($k=3);
$knn->train($dataTrain, $dataClass);

//data testing
$x = 3;
$y = 2;

//nilai prediksi
$pred = $knn->predict([$x,$y]);

//tampil di browser
echo "data testing x = " .$x. " dan y = " .$y. "<br>";
echo "masuk ke dalam kelas " .$pred;

