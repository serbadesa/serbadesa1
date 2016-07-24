<?php
session_start();
if(empty($_SESSION["userSession"])) {
  // kode yang akan di eksekusi jika user belum login, misal di redirect ke login page dll
  echo "anda belum login";
} else {
  // kode yang akan di eksekusi jika use rberhasil login.
  include('class.php');
  $db      = new db();
  $email   = $_SESSION["userSession"];
  $role    = $db->mysqli->query("SELECT * FROM user WHERE email = '$email'");
  if($role = mysqli_fetch_array($role)) {
    echo " Hai ". $role['nama'].", Role / Pangkat anda adalah ". $role['role']." | <a href='//".$_SERVER['REMOTE_ADDR']."?do=logout'>Logout</a>";
  }
}

 ?>
