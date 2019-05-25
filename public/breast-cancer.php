<!DOCTYPE html>
<html>
<head>
	<title>:: Sistem Prediksi Penyakit Kanker ::</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<h1 class="text-success text-center">
			Sistem Cerdas untuk Prediksi Penyakit Kanker Payudara
		</h1>
		<form class="form-horizontal" method="POST" action="nb-bc.php">
			<fieldset>
			<legend></legend>
			<div class="form-row">
			<div class="form-group col-md-8">
				<label class="col-form-label">Nama Lengkap</label>
					<input type="text" name="txtNama" class="form-control" placeholder="Nama Lengkap">
			</div>
			<div class="form-group col-md-4">
				<label class="col-form-label">Usia</label>
					<input type="number" name="numUsia" class="form-control" placeholder="Usia">
			</div>
			</div>
			
			<div class="form-row">
			<div class="form-group col-md-4">
				<label class="col-form-label">Clump Thickness</label>
					<input type="number" name="clump" class="form-control" placeholder="Clump Thickness: 1 - 10">
			</div>
			<div class="form-group col-md-4">
				<label class="col-form-label">Uniformity of Cell Size</label>
					<input type="number" name="UoCSize" class="form-control" placeholder="Uniformity of Cell Size: 1 - 10">
			</div>
			<div class="form-group col-md-4">
				<label class="col-form-label">Uniformity of Cell Shape</label>
					<input type="number" name="UoCShape" class="form-control" placeholder="Uniformity of Cell Shape: 1 - 10">
			</div>
			</div>
				
			<div class="form-row">
			<div class="form-group col-md-4">
				<label class="col-form-label">Marginal Adhesion</label>
					<input type="number" name="marginal" class="form-control" placeholder="Marginal Adhesion: 1 - 10">
			</div>
			<div class="form-group col-md-4">
				<label class="col-form-label">Single Epithelial Cell Size</label>
					<input type="number" name="epithelial" class="form-control" placeholder="Single Epithelial Cell Size: 1 - 10">
			</div>
			<div class="form-group col-md-4">
				<label class="col-form-label">Bare Nuclei</label>
					<input type="number" name="bareNuclei" class="form-control" placeholder="Bare Nuclei: 1 - 10">
			</div>
			</div>
			
			<div class="form-row">
			<div class="form-group col-md-4">
				<label class="col-form-label">Bland Chromatin</label>
					<input type="number" name="blandChromatin" class="form-control" placeholder="Bland Chromatin: 1 - 10">
			</div>
			<div class="form-group col-md-4">
				<label class="col-form-label">Normal Nucleoli</label>
					<input type="number" name="normalNucleoli" class="form-control" placeholder="Normal Nucleoli: 1 - 10">
			</div>
			<div class="form-group col-md-4">
				<label class="col-form-label">Mitoses</label>
					<input type="number" name="mitoses" class="form-control" placeholder="Mitoses: 1 - 10">
			</div>
			</div>
			
			<div class="form-group">
					<button type="submit" class="btn btn-success btn-md">Proses</button>
					<button type="reset" class="btn btn-danger btn-md">Reset</button>
			</div>
			</fieldset>
		</form>
		<i>
		Created by Joko Suntoro <br>
		Dataset: https://archive.ics.uci.edu/ml/datasets/breast+cancer+wisconsin+%28original%29 <br>
		Algoritme: k-Nearest Neighbor
		</i>
	</div>
</body>
</html>	
