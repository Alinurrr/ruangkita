

<?php 

session_start();
if (!isset($_SESSION['username']) AND !isset($_SESSION['password'])) {
    echo "<center>Untuk mengakses modul, Anda harus login dulu <br>";
    echo "<a href=$admin_url><b>LOGIN</b></a></center>";
  }else {
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idBiaya = $_GET['id_biaya_kirim'];
    $queryHapus = mysqli_query($koneksi, "DELETE FROM tbl_biaya_kirim WHERE id_biaya_kirim='$idBiaya'");
    if ($queryHapus) {
        echo "<script>alert('Data biaya Berhasil Dihapus');window.location='$admin_url'+'adminweb.php?module=biaya';</script>";
    } else {
       echo "<script>alert('Data biaya Gagal Dihapus');window.location='$admin_url'+'adminweb.php?module=biaya';</script>";
    }
    
  }
?>