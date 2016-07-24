<?php
session_start();
include ('class.php');
if(isset($_GET['do']) && $_GET['do'] == "register") {
  ?>
  <!DOCTYPE html>
  <html>
  <head>
  <title>Belajar sistem register, login, logout dengan PHP dan MySQL</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   <script src='https://www.google.com/recaptcha/api.js'></script>
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
  		<div class="col-md-4 col-md-offset-7">
  			<div class="panel panel-default">
  				<div class="panel-heading">
  					<span class="glyphicon glyphicon-lock"></span> Register
  				</div>
  				<div class="panel-body">
            <?php
            /* Kode PHP Disini digunakan untuk memproses data yang dikirim user */
            if(isset($_POST['btn-register'])) {
              $db         = new db();
              $nama       = trim($_POST['name']);
              $email      = trim($_POST['email']);
              $pass       = trim(md5(md5($_POST['password'])));
              $g_response = $_POST['g-recaptcha-response'];
              $code       = base64_encode(base64_encode(uniqid()));
              $role       = "Moderator"; // default admin, silahkan ganti sesuai keinginan. saya may coba jadi moderator
              $verify     = file_get_contents("https://www.google.com/recaptcha/api/siteverify?response=".$g_response."&secret=".$db->secret_key."&remoteip=".$_SERVER['REMOTE_ADDR']);
              if(preg_match("/true/",$verify) == true) {
                $stmt       = "SELECT * FROM user WHERE email = '$email'";
                if($result = $db->mysqli->query($stmt)) {
                  if($result->num_rows > 0 ) {
                    echo "

                    <div class='alert alert-danger'>Maaf user dengan email <b>$email</b> Sudah terdaftar.</div>

                    ";
                  } else {
                    if($db->register($nama,$email,$pass,$role,$code) == true ) {
                      echo "

                      <div class='alert alert-success'>Selamat!, Akun kamu telah berhasil dibuat :), Silahkan cek email kamu untuk konfirmasi akun :)</div>

                      ";
                    } else {
                      echo "

                      <div class='alert alert-warning'>Maaf, Terjadi kesalahan, Harap coba lagi :)</div>

                      ";
                    }

                  }
                }
              } else {
                echo "

                <div class='alert alert-danger'>Maaf, Captcha error, Harap isi captcha dengan benar!</div>

                ";
              }
            }

            ?>

  					<form class="form-horizontal" role="form" method="post">
  						<div class="form-group">
  							<label for="inputEmail3" class="col-sm-3 control-label">Username</label>
  							<div class="col-sm-9">
  								<input type="text" class="form-control" id="inputEmail3" placeholder="Username" name="name" required></div>
  						</div>
              <div class="form-group">
  							<label for="inputEmail3" class="col-sm-3 control-label">Email</label>
  							<div class="col-sm-9">
  								<input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email" required></div>
  						</div>
  						<div class="form-group">
  							<label for="inputPassword3" class="col-sm-3 control-label">Password</label>
  							<div class="col-sm-9">
  								<input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password" required><br/>
  							</div>
                <div class='col-md-6 col-md-ofset-4'>
                  <br />
                 <div class="g-recaptcha" style="margin-left:15px;" name="g_response" data-sitekey="<?php $db= new db(); echo $db->site_key; ?>"></div>
               </div>
               <div class='col-sm-9'>
                 <br />
                 <button class="btn btn-success" type="submit" name="btn-register">REGISTER</button> OR <a class="btn btn-warning" href="?do=login">LOGIN</a>
               </div>
             </form>
  						</div>
  						<div class="form-group">
  							<div class="col-sm-9">
  								<hr>
                  Copyright &copy; <?php echo date("Y") ?> rizalfakhri
  </body>
  </html>
<?php
} elseif(isset($_GET['do']) && $_GET['do'] == "login") {
?>
<!DOCTYPE html>
<html>
<head>
<title>Belajar sistem register, login, logout dengan PHP dan MySQL</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <script src='https://www.google.com/recaptcha/api.js'></script>
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
    <div class="col-md-4 col-md-offset-7">
      <div class="panel panel-default">
        <div class="panel-heading">
          <span class="glyphicon glyphicon-lock"></span> Login
        </div>
        <div class="panel-body">
          <?php
          if(isset($_GET['r']) && $_GET['r'] == "itv") {
            echo "

            <div class='alert alert-warning'>Maaf, Akun in belum dikonfirmasi, SIlahkan cek email anda dan klik link konfirmasinya :)</div>

            ";
          }
          if(isset($_GET['r']) && $_GET['r'] == "wp") {
            echo "

            <div class='alert alert-danger'>Password yang anda masukan salah!, Silahkan coba lagi :)</diV>

            ";
          }
          /* Kode PHP Disini digunakan untuk memproses data yang dikirim user */
          if(isset($_POST['btn-login'])) {
            $db          = new db();
            $email       = trim($_POST['email']);
            $password    = trim(md5(md5($_POST['password'])));
            $g_response  = $_POST['g-recaptcha-response'];
            $verify      = file_get_contents("https://www.google.com/recaptcha/api/siteverify?response=".$g_response."&secret=".$db->secret_key."&remoteip=".$_SERVER['REMOTE_ADDR']);
            if(preg_match("/true/",$verify)) {
              if($result = $db->mysqli->query("SELECT * FROM user WHERE email = '$email'")) {
                if($result->num_rows > 0) {
                  $db->login($email,$password);
                } else {
                  echo "

                  <div class='alert alert-danger'>Maaf username dengan email <b>$email</b>, Belum terdaftar.</div>

                  ";
                }
              }
            } else {
              echo "

               <div class='alert alert-danger'>Maaf, Capctha Error, Harap isi captcha dengan benar!</div>

              ";
            }
          }

          ?>

          <form class="form-horizontal" role="form" method="post">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
              <div class="col-sm-9">
                <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email" required></div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password" required><br/>
                <a href="lupa_password.php" style="text-align:right;">Lupa Password</a>
              </div>
            </div>
              <div class="col-md-6">
                <br />
                <div class="g-recaptcha" style="margin-right:200px;" name="g_response" data-sitekey="<?php $db= new db(); echo $db->site_key; ?>"></div>
              </div>
              <div class="col-md-9">
                <br />
                <button class="btn btn-success" type="submit" name="btn-login">LOGIN</button> OR <a class="btn btn-warning" href="?do=register">REGISTER</a>
              </div>

            <div class="form-group">
              <div class="col-md-9 col-md-offset-2">
                <hr>
                Copyright &copy; <?php echo date("Y") ?> rizalfakhri
</body>
</html>
<?php
} elseif (isset($_GET['do']) && $_GET['do'] == "logout") {
  session_destroy();
  header("location: ?do=login");
} else {
  if(empty($_SESSION['userSession'])) {
    header("location: ?do=login");
  } else {
    header("location: home.php");
  }
}
