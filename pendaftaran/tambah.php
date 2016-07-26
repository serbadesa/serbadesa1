<!DOCTYPE html>
<html>
<head>
	<title>Data Mahasiswa</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
	<div class="container">
	<h2 align="center">Pendaftaran</h2>
		<form method="POST" action="aksi.php">
			<a href="index.php">Beranda</a>
			<hr/>
			<div class="col-sm-4" style="border:1px solid #eee;">
				<br/>
				<div class="form-group">
					<label for="nama">Masukkan Nama</label>
					<input type="text" id="nama" class="form-control" name="nama" required>
				</div>
				<div class="form-group">
					<label for="nama">Masukkan Email</label>
					<input type="text" id="email" class="form-control" name="email" required>
				</div>
				<div class="form-group">
					<label for="nama">Masukkan Password</label>
					<input type="password" id="password" class="form-control" name="password" required>
				</div>
				<div class="form-group">
					<label for="nama">Masukkan Ulangi Password</label>
					<input type="password" id="upassword" class="form-control" name="upassword" required>
				</div>
				<div class="form-group">
					<label for="nama">Masukkan Provinsi</label>
					<input type="text" id="provinsi" class="form-control" name="provinsi" required>
				</div>
				<div class="form-group">
					<label for="nama">Masukkan Kab/Kota</label>
					<input type="text" id="kab" class="form-control" name="kab" required>
				</div>
				<div class="form-group">
					<label for="nama">Masukkan Kecamatan</label>
					<input type="text" id="kecamatan" class="form-control" name="kecamatan" required>
				</div>
				<div class="form-group">
					<label for="nama">Masukkan Kelurahan</label>
					<input type="text" id="kelurahan" class="form-control" name="kelurahan" required>
				</div>
				<div class="form-group">
					<label for="nama">Masukkan No Tlp</label>
					<input type="text" id="kodepos" class="form-control" name="kodepos" required>
				</div>
				<hr/>
				<input type="submit" value="Simpan" class="btn btn-info" name="simpan" id="submit">
				<input type="reset" value="reset" class="btn btn-danger">
			</div>
		</form>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){

			$("#submit").click(function(){

				if($("#cita_cita").val()==='-- Pilih --'){
					alert('Data belum lengkap');
					return false;
				}


			});

		});
	</script>
</body>
</html>