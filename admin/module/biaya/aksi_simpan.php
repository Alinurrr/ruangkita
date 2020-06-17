<?php
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    echo "<center>Anda harus login terlebih dahulu<br>";
    echo "<a href=../../index.php>Klik disini untuk Login</a></center>";
} else {
 include "../../../lib/config.php";
include "../../../lib/koneksi.php";

    $kota = $_POST['kota'];
    $kurir = $_POST['kurir'];
    $biaya = $_POST['biaya'];
    
    $biy = trim($biaya); //untuk menghapus spasi dia awal
    if ($biy=="") {
        echo "<script> alert('Biaya Kirim Harus Diisi'); window.location='$admin_url'+'adminweb.php?module=tambah_biaya';</script>";
    }
    elseif (!is_numeric($biy)) {
        echo "<script> alert('Data Biaya Kirim Harus Berisi Angka'); window.location='$admin_url'+'adminweb.php?module=tambah_biaya';</script>";
    } 
    else {
        
        $QuerySimpan = mysqli_query($koneksi, "INSERT INTO tbl_biaya_kirim (id_kota , id_kurir , biaya) VALUES ('$kota','$kurir','$biaya')");
        if ($QuerySimpan) {
            echo "
            <script>
                alert('Data berhasil disimpan');
                window.location = '$admin_url'+'adminweb.php?module=biaya';
            </script>";
        } else {
            echo "
            <script>
                alert('Data gagal disimpan');
                window.location = '$admin_url'+'adminweb.php?module=tambah_biaya';
            </script>";
        }
    }

            
}