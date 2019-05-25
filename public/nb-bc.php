<?php
error_reporting(0);
require '../vendor/autoload.php';
use jokodm\Datamining\Klasifikasi\NaiveBayes;
use jokodm\Datamining\Dataset\Demo\BreastCancer;
//load dataset breast-cancer.csv
$dataset = new BreastCancer();
//set data training
$dataTrain = $dataset->getSamples();
$dataClass = $dataset->getTargets();
$nb = new NaiveBayes();
$nb->train($dataTrain, $dataClass);
//data testing
$nama = $_POST['txtNama'];
$usia = $_POST['numUsia'];
$clump = $_POST['clump'];
$UoCSize = $_POST['UoCSize'];
$UoCShape = $_POST['UoCShape'];
$marginal = $_POST['marginal'];
$epithelial = $_POST['epithelial'];
$bareNuclei = $_POST['bareNuclei'];
$blandChromatin = $_POST['blandChromatin'];
$normalNucleoli = $_POST['normalNucleoli'];
$mitoses = $_POST['mitoses'];
//nilai prediksi
$pred = $nb->predict([(int)$clump,(int)$UoCSize,(int)$UoCShape,(int)$marginal,(int)$epithelial,(int)$bareNuclei,(int)$blandChromatin,(int)$normalNucleoli,(int)$mitoses]);
//tampil di browser
if ($pred==2) {
	$hasil = "<font color=blue><b>tidak teridentifikasi </b> kanker payudara</font>";
} else {
	$hasil = "<font color=red>diprediksi <b>teridentifikasi </b> kanker payudara</font>";
}
echo "<table border='1'>
	<tr>
		<td>Nama:</td>
		<td>$nama</td>
	</tr>
	<tr>
		<td>Usia:</td>
		<td>$usia</td>
	</tr>
	<tr>
		<td>Clump Thickness:</td>
		<td>$clump</td>
	</tr>
	<tr>
		<td>Uniformity of Cell Size:</td>
		<td>$UoCSize</td>
	</tr>
	<tr>
		<td>Uniformity of Cell Shape:</td>
		<td>$UoCShape</td>
	</tr>
	<tr>
		<td>Marginal Adhesion:</td>
		<td>$marginal</td>
	</tr>
	<tr>
		<td>Single Epithelial Cell Size:</td>
		<td>$epithelial</td>
	</tr>
	<tr>
		<td>Bare Nuclei:</td>
		<td>$bareNuclei</td>
	</tr>
	<tr>
		<td>Bland Chromatin:</td>
		<td>$blandChromatin</td>
	</tr>
	<tr>
		<td>Normal Nucleoli:</td>
		<td>$normalNucleoli</td>
	</tr>
	<tr>
		<td>Mitoses:</td>
		<td>$mitoses</td>
	</tr>
	<tr>
		<td colspan=2>$hasil</td>
	</tr>
</table><br>";
?>

<a href="breast-cancer.php">Halaman Index</a>
</center>
