<?php
    //include berfungsi untuk mengkoneksikan kodingan dengan localhost
    include('koneksi.php');

    //menginisiasi variabel-variabel yang dikirimkan dari form-->input name
    //fix problem : undefined index...
    if( isset($_POST['nama_pengguna'])  &&
        isset($_POST['kata_sandi'])     &&
        isset($_POST['ulang_katasandi'])
      )
    {
        $namapengguna   = $_POST['nama_pengguna'];
        $katasandi      = $_POST['kata_sandi'];
        $ulangkatasandi = $_POST['ulang_katasandi'];
    }else{
        //otomatis mengalihkan ke halaman pendaftaran jika terjadi undefined index
        header("location:pendaftaran.php");
    }

    if  (
        empty($namapengguna) ||  //jika nama_pengguna kosong
        empty($katasandi)    ||  //jika kata_sandi kosong
        empty($ulangkatasandi)   //jika ulang_katasandi kosong
        )
    {
        //pernyataan yang keluar jika salah satu atau beberapa kemungkinan di atas terjadi
        echo "ada kolom yang belum diisi";
        echo "<a href='pendaftaran.php'>Kembali ke halaman pendaftaran</a>";
    }else{
        //jika user telah memasukkan semua data yang dibutuhkan, koreksi kata sandi
        if($katasandi == $ulangkatasandi){
            //jika kata sandi sama

            //mengambil informasi dari nama tabel "informasi_pengguna" pada kolom "namaPengguna"
            $ambilDataSql     = mysql_query("SELECT * FROM informasi_pengguna WHERE namaPengguna = '$namapengguna'");
            //mengambil informasi dari seluruh kolom namaPengguna
            $cek_namapengguna = mysql_num_rows($ambilDataSql);
            //mengecek ketersediaan identitas
            if($cek_namapengguna == 0){//jika nama pengguna tidak ditemukan/belum terdaftar
                //lakukan penambahan data
                mysql_query("INSERT INTO informasi_pengguna VALUES('$namapengguna','$katasandi')");
                echo "pendaftaran berhasil";
                echo "<a href='pendaftaran.php'>Kembali ke halaman pendaftaran</a>";
            }else{
                echo "nama pengguna sudah terdaftar";
                echo "<a href='pendaftaran.php'>Kembali ke halaman pendaftaran</a>";
            }
        }else{
            //jika kata sandi tidak sama
            echo "kata sandi tidak sama";
            echo "<a href='pendaftaran.php'>Kembali ke halaman pendaftaran</a>";
        }
    }
?>