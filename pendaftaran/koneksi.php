<?php
	$hostname='localhost';
	$username='root';
	$password='';
	$database='serbadesa';

	mysql_connect($hostname, $username, $password);
	$tes= mysql_select_db($database);
	if(!$tes){
		echo "gagal koneksi";
	}
	// else{
	// 	echo "berhasil koneksi";
	// }
?>