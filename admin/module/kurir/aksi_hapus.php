<?php 

session_start();
if (!isset($_SESSION['username']) AND !isset($_SESSION['password'])) {
    echo "<center>Untuk mengakses modul, Anda harus login dulu <br>";
    echo "<a href=$admin_url><b>LOGIN</b></a></center>";
  }else {
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idKurir = $_GET['id_kurir'];
    $queryHapus = mysqli_query($koneksi, "DELETE FROM tbl_kurir WHERE id_kurir='$idKurir'");
    if ($queryHapus) {
        echo "<script>alert('Data Kurir Berhasil Dihapus');window.location='$admin_url'+'adminweb.php?module=kurir';</script>";
    } else {
       echo "<script>alert('Data Kurir Gagal Dihapus');window.location='$admin_url'+'adminweb.php?module=kurir';</script>";
    }
    
  }
?>