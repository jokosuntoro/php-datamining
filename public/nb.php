<?php
require '../vendor/autoload.php';
use jokodm\Datamining\Klasifikasi\NaiveBayes;

// ubah data training ke dalam bentuk array
$dtraining = [[1, 1, 2], 
			 [1, 1, 1],
			 [2, 1, 2],
			 [3, 2, 1],
			 [3, 3, 2]];
$labels = ['main', 'tidak main', 'main', 'main', 'tidak main'];

// gunakan algoritme NB
$nb = new NaiveBayes;
$nb->train($dtraining, $labels);

// cari kelas data testing dimana nilai (2, 1, 2)
$pred1 = $nb->predict([2, 1, 2]);

// tampilkan ke dalam browser 
echo "masuk ke dalam kelas <b>" .$pred1. "</b><br>";

