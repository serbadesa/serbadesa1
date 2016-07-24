<html>
    <head>
        <title>index-access : Halaman Utama</title>
    </head>
    <body>
    <?php
        //koneksi ke database
        include('koneksi.php');
        
        //ambil data pada kolom nama pengguna di tabel informasi_pengguna
        $kueri = mysql_query("SELECT namaPengguna FROM data_user");
        
        //inisiasi variabel yang digunakan untuk memberikan nomor pada tabel
        $number = 0;
        
        //buat tabel yang menayangkan data
        echo "<table>";
        echo "<tr>";
        echo "<th>Nomor</th><th>nama</th>";
        echo "</tr>";
        while($user = mysql_fetch_assoc($kueri)){
            $number++;
            echo "<tr>";
            echo "<td>".$number."</td><td>".$user['namaPengguna']."</td>";
            echo "</tr>";
        }
        echo "</table>";
    ?>
        <a href="pendaftaran.php">Tambah Data</a>
    </body>
</html>