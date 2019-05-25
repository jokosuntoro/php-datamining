<?php
require '../vendor/autoload.php';
use jokodm\Datamining\Klasifikasi\KNearestNeighbors;

// ubah data training ke dalam bentuk array
$dtraining = [[1.2, 2,3], [2.5, 4.6], [4, 1], [5.6, 1.2], [6, 3.5]];
$labels = ['A', 'A', 'B', 'B', 'B'];

// gunakan algoritme k-NN dengan nilai k=3
$classifier = new KNearestNeighbors($k=3);
$classifier->train($dtraining, $labels);

// cari kelas data testing dimana nilai x = 3 dan y = 2
$pred = $classifier->predict([3, 2]);

// tampilkan ke dalam browser 
echo "Data testing x=3 dan y=2" . "<br>";
echo "masuk ke dalam kelas <b>" .$pred. "</b><br>";

