<?php
	include('koneksi.php');
	if(isset($_POST['simpan'])){
		simpan();
	}
	if(isset($_POST['update'])){
		update();
	}
	if(isset($_GET['hapus'])){
		hapus();
	}

	// else if(isset($_GET['hapus'])){
	// 	hapus();
	// }else{
	// 	echo 'tdiak cocok';
	// }
	function simpan()
	{
		$nama= $_POST['nama'];
		$email= $_POST['email'];
		$password= $_POST['password'];
		$upassword= $_POST['upassword'];
		$provinsi= $_POST['provinsi'];
		$kab= $_POST['kab'];
		$kecamatan= $_POST['kecamatan'];
		$kelurahan= $_POST['kelurahan'];
		$kodepos= $_POST['kodepos'];
		
		$query1= "insert into `tbl_data`(`nama`, `email`, `password`, `upassword`, `provinsi`,`kab`,`kecamatan`,`kelurahan`,`kodepos`) values('$nama', '$email', '$password', '$upassword', '$provinsi', '$kab', '$kecamatan', '$kelurahan', '$kodepos'); ";
		$query= mysql_query($query1) or die(mysql_error());

		if($query)
		{
			echo "Berhasil simpan";
		}
		header("location: index.php");
	}
	function update(){
		$nik= $_POST['nik'];
		$nama= $_POST['nama'];
		$email= $_POST['email'];
		$password= $_POST['password'];
		$upassword= $_POST['upassword'];
		$provinsi= $_POST['provinsi'];
		$kab= $_POST['kab'];
		$kecamatan= $_POST['kecamatan'];
		$kelurahan= $_POST['kelurahan'];
		$kodepos= $_POST['kodepos'];

		$query1= "UPDATE `tbl_data` SET `nama`='$nama',`email`='$email',`password`='$password',`upassword`='$upassword',`provinsi`='$provinsi',`kab`='$kab',`kecamatan`='$kecamatan',`kelurahan`='$kelurahan',`kodepos`='$kodepos' WHERE `nik`='$nik'";
		//$query1= "UPDATE `mahasiswa` SET `nama`='$nama',`ttl`='$ttl',`jk`='$jk',`alamat`='$alamat',`agama`='$agama',`goldar`='$goldar',`status`='$status',`pekerjaan`='$pekerjaan',`kewarganegaraan`='$kewarganegaraan' WHERE `id`='$id'";
		$query= mysql_query($query1) or die(mysql_error());

		if($query){
			
			echo "Berhasil Update";
		}
		header("location: index.php");
	}
	function hapus(){
		$nik= $_GET['hapus'];
		$query= mysql_query("delete from `tbl_data` where nik='$nik';   ");
		if($query){
			echo 'berhasil';
		}else{
			echo 'gagal';
		}
		header("location: index.php");
	}
?>