<?php
if(!isset($_GET['account_id']) && !isset($_GET['email_id']) or !isset($_GET['account_id']) or !isset($_GET['email_id'])) {
  header("location: home.php");
} else {
  include ('class.php');
  $account_id = $_GET['account_id'];
  $email_id   = $_GET['email_id'];
  $code       = base64_encode(md5(uniqid()));
  $db         = new db();
  if($result = $db->mysqli->query("SELECT * FROM user WHERE email = '$email_id'")) {
    if($result = mysqli_fetch_array($result)) {
      if($account_id == $result['activate_code']) {
        $msg = "
        <form method='post'>
        <div class='col-sm-9'>
          <input type='password' class='form-control' id='inputEmail3' placeholder='Password Baru' name='pass' required><br />
        </div>
        <div class='col-sm-9'>
          <input type='password' class='form-control' id='inputEmail3' placeholder='Konfirmasi Password' name='cpass' required><br />
          <button class='btn btn-success' type='submit' name='btn-reset-password'>SUBMIT</button>
        </div>
        </form>

        ";
      } else {
        $msg = "

         <div class='alert alert-warning'>Maaf, account id anda tidak valid!</div>

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
          <center>  <span class="glyphicon glyphicon-lock"></span> RESET PASSWORD</center>
          </div>
          <div class="panel-body">
            <?php
            if(isset($msg)) {
              if(isset($_POST['btn-reset-password'])) {
                $db       = new db();
                $pass     = trim(md5(md5($_POST['pass'])));
                $new_pass = trim(md5(md5($_POST['cpass'])));
                if($pass != $new_pass) {
                  echo "

                  <div class='alert alert-danger'>Konfirmasi Password baru harus sama.</div>

                  ";
                } else {
                  if($db->mysqli->query("UPDATE user SET password = '$new_pass' WHERE email = '$email_id'")) {
                    echo "

                    <div class='alert alert-success'>Sukses, Password anda telah berhasil diperbarui :)</div>

                    ";

                    $db->mysqli->query("UPDATE user SET activate_code = '$code' WHERE email='$email_id'");

                  }
                }


              }
              echo $msg;
            }
            ?>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  <hr>
                  Copyright &copy; <?php echo date("Y") ?> rizalfakhri
  </body>
  </html>
<?php
}
