<?php
class db {
  public $mysqli;
  var $site_key   = "site key kamu"; // replace dengan site key kamu
  var $secret_key = "secret key kamu "; // replace dengan secret key kamu

  function __construct() {
    $this->mysqli = new mysqli('myhost','myuser','mypass','mydb');
    if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
    }
  }

  function register($nama,$email,$password,$role,$code) {
    $db     = new db();
    $server = $_SERVER['SERVER_NAME'];
    $stmt   = "INSERT INTO user(nama,email,password,role,is_active,activate_code) VALUES('$nama','$email','$password','$role','N','$code')";
    if($db->mysqli->query($stmt) == true) {
      /* email section */
      $subject = "Register Akun Baru - LAYANANMU";
      $body    = "

      <h1>SELAMAT DATANG DI LAYANANMU</h1><br /><br />
      <b>Hai $nama.</b> Kami mendapat permintaan akun baru dengan email ini. <br />
      Akun anda sudah dibuat, Tapi belum dikonfirmasi, Silahkan klik link dibawah ini untuk konfirmaskan akun anda :)
      <br /><br />
      <a href='http://$server/konfirmasi.php?account_id=$code&email_id=$email'>http://$server/konfirmasi.php?account_id=$code&email_id=$email</a><br /><br />
      Terimakasih :)

      ";

      $db->send_mail($subject,$body,$email);
      return true;
    } else {
      return false;
    }
  }

  function login($email,$password) {
    $db   = new db();
    $stmt = "SELECT * FROM user WHERE email = '$email'";
    if($udata = $db->mysqli->query($stmt)) {
      if($udata = mysqli_fetch_array($udata)) {
        if($password == $udata['password']) {
          if($udata['is_active'] == "Y") {
            $_SESSION["userSession"] = $email;
            echo "<script type='text/javascript'>window.top.location='home.php';</script>";
          } else {
            echo "<script type='text/javascript'>window.top.location='?do=login&r=itv';</script>";
          }
        } else {
          echo "<script type='text/javascript'>window.top.location='?do=login&r=wp';</script>";
        }
      }
    }
  }

  function send_mail($subject,$body,$email) {
    require 'phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;
    //$mail->SMTPDebug = 3;                               // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.kamu.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'email@domainkamu.com';                 // SMTP username
    $mail->Password = 'passwordmu';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to
    $mail->setFrom('email@domainkamu.com', 'NAMA LAYANANMU');
    $mail->addAddress($email);     // Add a recipient
    $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $body;

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }

  }
}
