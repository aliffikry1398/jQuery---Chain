<!DOCTYPE html>
<html>
<head>
	<title>latihan</title>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="assets/img/lp3i_icon.ico">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

</head>
<body>

<?php include 'config/koneksi.php'; ?>

<div class="container mt-5">
	<div class="row mt-4">
		<div class="col">
			<label>Provinsi</label>
			<select id="provinsi" name="provinsi" class="form-control">
				<option value="">--select provinsi--</option>
					<?php 
					$sql = "SELECT * FROM provinsi";
					$query = $conn->query($sql);
					while ($row = $query->fetch_array()) { ?>
						<option value="<?= $row['id_provinsi']; ?>"><?= $row['provinsi']; ?></option>
					<?php } ?>
			</select>
		</div>
	</div>

	<div class="row mt-4">
		<div class="col">
			<label>Kota</label>
			<select id="kota" name="kota" class="form-control">
				<option value="">--select kota--</option>
					<?php 
					$sql = "SELECT * FROM kota AS k INNER JOIN provinsi AS b ON b.id_provinsi = k.id_provinsi_fk";
					$query = $conn->query($sql);
					while ($row = $query->fetch_array()) { ?>
						<option value="<?= $row['id_kota']; ?>" data-chained="<?= $row['id_provinsi'] ?>"><?= $row['nama_kota']; ?></option>
					<?php } ?>
			</select>
		</div>
	</div>

	<div class="row mt-4">
		<div class="col">
			<label>Kecamatan</label>
			<select id="kecamatan" name="kecamatan" class="form-control">
				<option value="">--select kecamatan--</option>
				<?php 
				$sql = "SELECT k.*,j.* FROM kecamatan AS k INNER JOIN kota AS j ON j.id_kota = k.id_kota_fk";
				$query = $conn->query($sql);
				while ($row = $query->fetch_array()) { ?>
					<option value="<?= $row['id_kecamatan']; ?>" data-chained="<?= $row['id_kota']; ?>"><?= $row['nama_kecamatan']; ?></option>
				<?php } ?>
			</select>
		</div>
	</div>
</div>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="js/jquery.chained.min.js"></script>


<script>
	$(function(){
   		$("#kecamatan").chained("#kota"); 
   		$("#kota").chained("#provinsi"); 
	});
</script>


</body>
</html>
