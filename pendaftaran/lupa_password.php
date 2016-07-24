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
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-default">
        <div class="panel-heading">
          <center><span class="glyphicon glyphicon-lock"></span> LUPA SANDI</center>
        </div>
        <div class="panel-body">
          <?php
          if(isset($_POST['btn-lupa-password'])) {
            include ('class.php');
            $db    = new db();
            $email = $_POST['email'];
            if($result = $db->mysqli->query("SELECT * FROM user WHERE email = '$email'")) {
              if($result->num_rows > 0 ) {
                if($result = mysqli_fetch_array($result)) {
                  $server  = $_SERVER['SERVER_NAME'];
                  $nama    = $result['nama'];
                  $code    = $result['activate_code'];
                  $subject = "LUPA PASSWORD LAYANANMU";
                  $body    = "

                  Hai $nama, <br /><br />
                  Beberapa saat yang lalu, Kami mendapat permintaan reset password dari akun anda, <br /><br />
                  Untuk meresetnya, silahkan klik link dibawah ini.<br /><br />
                  <a href='http://$server/reset_password.php?account_id=$code&email_id=$email'>http://$server/reset_password.php?account_id=$code&email_id=$email</a><br /><br />
                  WARNING!! <br />
                  Jika anda tidak melakukanya jangan pernah klik link diatas :) <br />
                  Terimakasih.

                  ";

                  $db->send_mail($subject,$body,$email);

                  echo "

                  <div class='alert alert-success'>Sukses, Silahkan cek email anda untuk reset password :) </div>

                  ";
                }
              }
            }
          }

          ?>
          <form method="post">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
            <div class="col-sm-9">
              <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email" required><br />
              <button class='btn btn-success' type="submit" name="btn-lupa-password">SUBMIT</button>
            </div>
          </form>

          </div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-3">
                <hr>
                Copyright &copy; <?php echo date("Y") ?> rizalfakhri
</body>
</html>
