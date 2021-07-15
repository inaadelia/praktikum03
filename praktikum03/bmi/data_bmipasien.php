<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<h4>Form Isian Indeks Massa Tubuh (BMI)</h4>
	<form class="col-md-6" method="POST" action="data_bmipasien.php">
		<div class="form-group row">
			<label for="inputName" class="col-sm-4 col-form-label">Nama</label>
			<div class="col-sm-8">
				<input type="text" name="nama" class="form-control" id="inputName" placeholder="Nama">
			</div>
		</div>
		<div class="form-group row">
			<label for="inputWeight" class="col-sm-4 col-form-label">Berat Badan</label>
			<div class="col-sm-8">
				<input type="number" name="bb" class="form-control" id="inputWeight" placeholder="Berat Badan">
			</div>
		</div>
		<div class="form-group row">
			<label for="inputTall" class="col-sm-4 col-form-label">Tingi Badan</label>
			<div class="col-sm-8">
				<input type="number" name="tb" class="form-control" id="inputTall" placeholder="Tingi Badan">
			</div>
		</div>
		<div class="form-group row">
			<label for="inputOld" class="col-sm-4 col-form-label">Umur</label>
			<div class="col-sm-8">
				<input type="number" name="umur" class="form-control" id="inputOld" placeholder="Umur">
			</div>
		</div>
		<fieldset class="form-group">
			<div class="row">
				<legend class="col-form-label col-sm-4 pt-0">Jenis Kelamin</legend>
				<div class="col-sm-8">
					<div class="form-check">
						<input class="form-check-input" type="radio" name="jk" id="jk1" value="Laki-laki" checked>
						<label class="form-check-label" for="jk1">
							Laki-laki
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="jk" id="jk2" value="Perempuan">
						<label class="form-check-label" for="jk2">
							Perempuan
						</label>
					</div>
				</div>
			</div>
		</fieldset>
		<div class="form-group row">
			<div class="col-md-4">
				
			</div>
			<div class="col-sm-8">
				<button type="submit" name="submit" value="Kirim" class="btn btn-primary">Kirim</button>
			</div>
		</div>
	</form>

	<?php
	require_once "class_bmipasien.php";
	if (!empty($_POST['submit'])) {
		$nama 	= $_POST['nama'];
		$bb 	= $_POST['bb'];
		$tb 	= $_POST['tb'];
		$umur 	= $_POST['umur'];
		$jk 	= $_POST['jk'];

		$dataPasien 	= new BmiPasien($bb, $tb);
		$hasilBMI 		= $dataPasien->hasilBMI();
		$statusBMI 		= $dataPasien->statusBMI();
		?>

		<table>
			<tr>
				<td colspan="3" style="text-align: center;">Hasil Evaluasi BMI</td>
			</tr>
			<tr>
				<td>Nama</td><td> : </td><td><?php echo $nama.' ('.$jk.')' ?></td>
			</tr>
			<tr>
				<td>Berat/Tinggi Badan</td><td> : </td><td><?php echo $bb.' Kg / '.$tb.' Cm' ?></td>
			</tr>
			<tr>
				<td>Umur</td><td> : </td><td><?php echo $umur ?> Tahun</td>
			</tr>
			<tr>
				<td>BMI</td><td> : </td><td><?php echo $hasilBMI ?></td>
			</tr>
			<tr>
				<td>Hasil</td><td> : </td><td><?php echo $statusBMI ?></td>
			</tr>
		</table>

	<?php
	}
	?>

	<?php
		$pasien1 = ['id'=>1,'nama'=>'Rosalie Naurah','jk'=>'Perempuan','umur'=>18,'bb'=>46.2,'tb'=>155];
		$pasien2 = ['id'=>2,'nama'=>'Rara Wulan','jk'=>'Perempuan','umur'=>22,'bb'=>42.8,'tb'=>158];
		$pasien3 = ['id'=>3,'nama'=>'Glagah Putih','jk'=>'Laki-laki','umur'=>24,'bb'=>90.3,'tb'=>154];

		$ar_pasien = [$pasien1, $pasien2 , $pasien3];

		if (!empty($_POST['submit'])) {
			$pasien = ['id'=>4,'nama'=>$nama,'jk'=>$jk,'umur'=>$umur,'bb'=>$bb,'tb'=>$tb];
			array_push($ar_pasien, $pasien);
		}

		?>

		<!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
		<style type="text/css">
			.custab{
			    border: 1px solid #ccc;
			    padding: 5px;
			    margin: 5% 0;
			    box-shadow: 3px 3px 2px #ccc;
			    transition: 0.5s;
			    }
			.custab:hover{
			    box-shadow: 3px 3px 0px transparent;
			    transition: 0.5s;
			    }
		</style>

		<br>
		
		<h3>Data BMI Pasien</h3>
			<table border="1" width="100%" class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Nama Lengkap</th>
						<th>Gender</th>
						<th>Umur</th>
						<th>Berat (kg)</th>
						<th>Tinggi (cm)</th>
						<th>BMI</th>
						<th>Hasil</th>
					</tr>
				</thead>
				<tbody>
			<?php
			$nomor = 1;
			foreach($ar_pasien as $key){ 
				$pasien = new BmiPasien($key['bb'], $key['tb']); 
				?>
				<tr>
					<td><?php echo $nomor ?></td>
					<td><?php echo $key['nama'] ?> </td>
					<td><?php echo $key['jk'] ?></td>
					<td><?php echo $key['umur'] ?></td>
					<td><?php echo $key['bb'] ?></td>
					<td><?php echo $key['tb'] ?></td>
					<td><?php echo $pasien->hasilBMI() ?></td>
					<td><?php echo $pasien->statusBMI() ?></td>
				</tr>
			<?php 
			$nomor++;
			} 
			?>
				</tbody>
			</table>

</body>
</html>