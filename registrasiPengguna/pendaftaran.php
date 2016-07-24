
<html>
    <head>
        <title>index-access : Pendaftaran</title>
    </head>
    <body bgcolor="#0066FF">
        <form action="konfirmasi.php" method="POST">
        <table>
            <tr>
                <td>Nama Lengkap</td><td>:</td><td><input type="text" name="nama_pengguna" placeholder="" maxlength="50"/></td>
            </tr>
            <tr>
                <td>Email</td><td>:</td><td><input type="text" name="Email" placeholder="" maxlength="50"/></td>
            </tr>
            <tr>
                <td>Password</td><td>:</td><td><input type="password" name="kata_sandi" placeholder="" maxlength="15"/></td>
            <tr/>
            <tr>
                <td>Ulangi Password</td><td>:</td><td><input type="password" name="ulang_katasandi" placeholder="" maxlength="15"/></td>
            <tr/>
            <tr>
                <td>Provinsi</td><td>:</td><td><input type="text" name="Provinsi" placeholder="" maxlength="50"/></td>
            </tr>
            <tr>
                <td>Kab/Kota</td><td>:</td><td><input type="text" name="Kab/Kota" placeholder="" maxlength="50"/></td>
            </tr>
            <tr>
                <td>Kecamatan</td><td>:</td><td><input type="text" name="Kecamatan" placeholder="" maxlength="50"/></td>
            </tr>
            <tr>
                <td>Kelurahan</td><td>:</td><td><input type="text" name="Kelurahan" placeholder="" maxlength="50"/></td>
            </tr>
            <tr>
                <td>Kode Pos</td><td>:</td><td><input type="text" name="Kode_Pos" placeholder="" maxlength="50"/></td>
            </tr>
        </table>
        <input type="submit" value="Daftar"/><br/>
        </form>
    </body>
</html>