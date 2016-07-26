<!DOCTYPE html>
<html>
<head>
	<title>Data Mahasiswa</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body background="green">
	<?php include('koneksi.php') ?>
	<div class="container">
		<a href="tambah.php">Tambah</a>
		<table class="table table-bordered">
		<tr>
			<th>Nama</th>
			<th>Email</th>
			<th>Password</th>
			<th>Ulangi Password</th>
			<th>Provinsi</th>
			<th>Kab/Kota</th>
			<th>Kecamatan</th>
			<th>Kelurahan</th>
			<th>No.Tlp</th>
			<th>Aksi</th>
		</tr>
		<?php
			$query= mysql_query('select * from tbl_data') or die(mysql_error());
			if(mysql_num_rows($query)==0){
				echo "data kosong";
			}
			else{
				while($data= mysql_fetch_assoc($query)){
					echo '<tr>';
						echo '<td>'.$data['nama'].'</td>';
						echo '<td>'.$data['email'].'</td>';
						echo '<td>'.$data['password'].'</td>';
						echo '<td>'.$data['upassword'].'</td>';
						echo '<td>'.$data['provinsi'].'</td>';
						echo '<td>'.$data['kab'].'</td>';
						echo '<td>'.$data['kecamatan'].'</td>';
						echo '<td>'.$data['kelurahan'].'</td>';
						echo '<td>'.$data['kodepos'].'</td>';

						
					
							echo '<td>';			
							echo '<a href="edit.php?nik='.$data['nik'].'" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i></a> ';
							echo '<a href="aksi.php?hapus='.$data['nik'].'" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></a> ';
						echo '</td>';
					echo '</tr>';
				}
			}


		?>
		</table>
		<script type="text/javascript">
			$(document).ready(function(){



			});
		</script>
	</div>
</body>
</html>