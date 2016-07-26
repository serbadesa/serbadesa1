<!DOCTYPE html>
<html>
<head>
	<title>Data Pendaftaran</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
	<?php
		include('koneksi.php');
		$simpan= $_GET['nik'];
		$query= mysql_query("select * from tbl_data where nik='$simpan'; ");
		$data= mysql_fetch_assoc($query);
	?>
	<div class="container">
	<h2 align="center">Data Mahasiswa Pranata</h2>
		<form method="POST" action="aksi.php">
			<input type="hidden" name="nik" value=<?php echo '"'.$data['nik'].'"' ?>>
			<a href="index.php">Beranda</a>
			<hr/>
			<div class="col-sm-4" style="border:1px solid #eee;">
				<br/>
				<div class="form-group">
					<label for="idm">Masukkan IDM</label>
					<input type="text" id="idm" class="form-control" name="idm" required value=<?php echo '"'.$data['idm'].'"' ?>>
				</div>
				<hr/>
				<div class="form-group">
					<label for="nama">Masukkan namamu</label>
					<input type="text" id="nama" class="form-control" name="nama" required value=<?php echo '"'.$data['nama'].'"' ?>>
				</div>
				<hr/>
				<div class="form-group">
					<label for="nama">Tempat Tanggal Lahir</label>
					<input type="text" id="ttl" class="form-control" name="ttl" required value=<?php echo '"'.$data['ttl'].'"' ?>>
				</div>
				<hr/>
				<div class="form-group">
					<label>Jenis Kelamin Anda</label><br/>
					<label class="radio-inline"><input type="radio" value="laki-laki" name="jk" required 
					<?php if($data['jk']=='laki-laki')echo 'checked' ?>>Laki Laki</label>
					<label class="radio-inline"><input type="radio" value="perempuan" name="jk" required
					<?php if($data['jk']=='perempuan')echo 'checked' ?>
					>Perempuan</label>
				</div>
				<hr/>
				<div class="form-group">
					<label for="nama">Alamat</label>
					<input type="text" id="alamat" class="form-control" name="alamat" required value=<?php echo '"'.$data['alamat'].'"' ?>>
				</div>
				<hr/>
				<div class="form-group">
					<label for="nama">Agama</label>
					<input type="text" id="agama" class="form-control" name="agama" required value=<?php echo '"'.$data['agama'].'"' ?>>
				</div>
				<hr/>
				<div class="form-group">
					<label for="nama">Golongan Darah</label>
					<input type="text" id="goldar" class="form-control" name="goldar" required value=<?php echo '"'.$data['goldar'].'"' ?>>
				</div>
				<hr/>
				<div class="form-group">
					<label>Status</label><br/>
					<label class="radio-inline"><input type="radio" value="nikah" name="status" required 
					<?php if($data['status']=='nikah')echo 'checked' ?>>Nikah</label>
					<label class="radio-inline"><input type="radio" value="belum_menikah" name="status" required
					<?php if($data['status']=='belum_menikah')echo 'checked' ?>
					>Belum Menikah</label>
				</div>
				<hr/>
				<div class="form-group">
					<label for="pekerjaan">Pekerjaan</label>
					<select class="form-control" id="pekerjaan" name="pekerjaan">
						<option>-- Pilih --</option>
						<option <?php if($data['pekerjaan']=='PNS') echo 'selected' ?> >PNS</option>
						<option <?php if($data['pekerjaan']=='Mahasiswa') echo 'selected' ?> >Mahasiswa</option>
						<option <?php if($data['pekerjaan']=='Wirasuwasta') echo 'selected' ?> >Wirasuwasta</option>
						<option <?php if($data['pekerjaan']=='lain-lain') echo 'selected' ?> >Lain-lain</option>
					</select>
				</div>
				<hr/>
				<div class="form-group">
					<label for="kewarganegaraan">Kewarganegaraan</label>
					<textarea id="kewarganegaraan" class="form-control" rows="5" style="resize:none;" name="kewarganegaraan"><?php echo $data['kewarganegaraan'] ?></textarea>
				</div>
				<hr/>
				<input type="submit" value="Update" class="btn btn-info" name="update" id="submit">
				<input type="reset" value="reset" class="btn btn-danger">
			</div>
		</form>
	</div>
	<hr/>
	<hr/>
	<hr/>
	<hr/>
	<script type="text/javascript">
		$(document).ready(function(){

			$("#submit").click(function(){

				if($("#pekerjaan").val()==='-- Pilih --'){
					alert('Data belum lengkap');
					return false;
				}


			});

		});
	</script>
</body>
</html>