<?php

define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', 'root');
define('DBNAME', 'login');

/**
 * $dbconnect : koneksi kedatabase
 */
$dbconnect = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

/**
 * Check Error yang terjadi saat koneksi
 * jika terdapat error maka die() // stop dan tampilkan error
 */
if ($dbconnect->connect_error) {
	die('Database Not Connect. Error : ' . $dbconnect->connect_error);
}
