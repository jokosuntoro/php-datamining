<?php
require '../vendor/autoload.php';
use jokodm\Datamining\Klasifikasi\NaiveBayes;
use jokodm\Datamining\Dataset\Demo\BermainGolf;

$dataset = new BermainGolf();

$klasifikasi = new NaiveBayes();
$klasifikasi->train($dataset->getSamples(),$dataset->getTargets());

$pred = $klasifikasi->predict(['cerah', 73, 80, 'tidak']);

if ($pred == "ya") {
	echo "masuk ke dalam kelas <b>bermain golf</b>";
} else {
	echo "masuk ke dalam kelas <b>tidak bermain golf</b>";
}

