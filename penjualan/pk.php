<?php
include "db/koneksi.php";
$op=isset($_GET['op'])?$_GET['op']:null;
if($op=='ambilbarang'){
    $data=mysql_query("select * from tblbarang");
    echo"<option>Kode Barang</option>";
    while($r=mysql_fetch_array($data)){
        echo "<option value='$r[kode]'>$r[kode]</option>";
    }
}elseif($op=='ambildata'){
    $kode=$_GET['kode'];
    $dt=mysql_query("select * from tblbarang where kode='$kode'");
    $d=mysql_fetch_array($dt);
    echo $d['nama']."|".$d['hrg_jual']."|".$d['stok'];
}elseif($op=='barang'){
    $brg=mysql_query("select * from tblsementara");
    echo "<thead>
            <tr>
                <td>Kode Barang</td>
                <td>Nama</td>
                <td>Harga</td>
                <td>Jumlah Beli</td>
                <td>Subtotal</td>
                <td>Tools</td>
            </tr>
        </thead>";
    $total=mysql_fetch_array(mysql_query("select sum(subtotal) as total from tblsementara"));
    while($r=mysql_fetch_array($brg)){
        echo "<tr>
                <td>$r[kode]</td>
                <td>$r[nama]</td>
                <td>$r[harga]</td>
                <td><input type='text' name='jum' value='$r[jumlah]' class='span2'></td>
                <td>$r[subtotal]</td>
                <td><a href='pk.php?op=hapus&kode=$r[kode]' id='hapus'>Hapus</a></td>
            </tr>";
    }
    echo "<tr>
        <td colspan='3'>Total</td>
        <td colspan='4'>$total[total]</td>
    </tr>";
}elseif($op=='tambah'){
    $kode=$_GET['kode'];
    $nama=$_GET['nama'];
    $harga=$_GET['harga'];
    $jumlah=$_GET['jumlah'];
    $subtotal=$harga*$jumlah;
    
    $tambah=mysql_query("INSERT into tblsementara (kode,nama,harga,jumlah,subtotal)
                        values ('$kode','$nama','$harga','$jumlah','$subtotal')");
    
    if($tambah){
        echo "sukses";
    }else{
        echo "ERROR";
    }
}elseif($op=='hapus'){
    $kode=$_GET['kode'];
    $del=mysql_query("delete from tblsementara where kode='$kode'");
    if($del){
        echo "<script>window.location='index.php?page=penjualan&act=tambah';</script>";
    }else{
        echo "<script>alert('Hapus Data Berhasil');
            window.location='index.php?page=penjualan&act=tambah';</script>";
    }
}elseif($op=='proses'){
    $nota=$_GET['nota'];
    $tanggal=$_GET['tanggal'];
    $to=mysql_fetch_array(mysql_query("select sum(subtotal) as total from tblsementara"));
    $tot=$to['total'];
    $simpan=mysql_query("insert into penjualan(nonota,tanggal,total)
                        values ('$nota','$tanggal','$tot')");
    if($simpan){
        $query=mysql_query("select * from tblsementara");
        while($r=mysql_fetch_row($query)){
            mysql_query("insert into detailpenjualan(nonota,kode,harga,jumlah,subtotal)
                        values('$nota','$r[0]','$r[2]','$r[3]','$r[4]')");
            mysql_query("update tblbarang set stok=stok-'$r[3]'
                        where kode='$r[0]'");
        }
        //hapus seluruh isi tabel sementara
        mysql_query("truncate table tblsementara");
        echo "sukses";
    }else{
        echo "ERROR";
    }
}
?>