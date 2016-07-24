<?php
include ('class.php');
$email_id   = $_GET['email_id'];
$account_id = $_GET['account_id'];

$server  = $_SERVER['SERVER_NAME'];
$db      = new db();
$stmt    = "SELECT * FROM user WHERE email = '$email_id'";
if($result = $db->mysqli->query($stmt)) {
  if($result = mysqli_fetch_array($result)) {
    if($result['is_active'] == "N") {
      if($result['activate_code'] == $account_id) {
        $db->mysqli->query("UPDATE user SET is_active = 'Y' WHERE email = '$email_id'");
        $msg = "

        <div class='alert alert-success'>
         <b>Selamat!</b> Akun anda berhasil di konfirmasi :), Silahkan login dengan klik tombol dibawah ini :)
        </div>
        <a class='btn btn-success' style='width:100%' href='http://$server/?do=login'>LOGIN</a>


        ";
      } else {
        $msg = "

        <div class='alert alert-warning'>Terjadi kesalahan, Account id anda tidak valid!</div>

        ";
      }
    } else {
      $msg = "

      <div class='alert alert-warning'>Akun anda sudah diaktivasi sebelumnya, SIlahkan login dengan klik tombol dibawah ini.
      </div>
      <a class='btn btn-success' style='width:100%' href='http://$server/?do=login'>LOGIN</a>

      ";
    }
  }
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Belajar sistem register, login, logout dengan PHP dan MySQL</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<style>
      body {
      background: url(http://lorempixel.com/1920/1920/city/9/) no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
      }
      .panel-default {
      opacity: 0.9;
      margin-top:30px;
      }
      .form-group.last { margin-bottom:0px; }
</style>
<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-default">
        <div class="panel-heading">
          <span class="glyphicon glyphicon-check"></span> KONFIRMASI
        </div>
        <div class="panel-body">

          <?php if(isset($msg)) { echo $msg; } ?>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-3">
                <hr>
                Copyright &copy; <?php echo date("Y") ?> rizalfakhri
</body>
</html>
