<?php
require '../vendor/autoload.php';
use jokodm\Datamining\Klasifikasi\DecisionTree;
use jokodm\Datamining\Dataset\Demo\GolfNominal;

$dataset = new GolfNominal();

$klasifikasi = new DecisionTree();
$klasifikasi->train($dataset->getSamples(),$dataset->getTargets());

$pred = $klasifikasi->predict(['cerah', 'normal', 'normal', 'tidak']);

if ($pred == "Main") {
	echo "masuk ke dalam kelas <b>bermain golf</b>";
} else {
	echo "masuk ke dalam kelas <b>tidak bermain golf</b>";
}

