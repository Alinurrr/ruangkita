<?php 

session_start();
if (!isset($_SESSION['username']) AND !isset($_SESSION['password'])) {
    echo "<center>Untuk mengakses modul, Anda harus login dulu <br>";
    echo "<a href=$admin_url><b>LOGIN</b></a></center>";
  }else {
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idBiayaKirim = $_POST['id_biaya_kirim'];
    $Kota = $_POST['kota'];
    $Kurir = $_POST['kurir'];
    $Biaya = $_POST['biaya']; 

    $biy = trim($Biaya); //untuk menghapus spasi dia awal
    if ($biy=="") {
        echo "<script> alert('Biaya Kirim Harus Diisi'); window.location='$admin_url'+'adminweb.php?module=edit_biaya&id_biaya_kirim='+'$idBiayaKirim';</script>";
    }
    elseif (!is_numeric($biy)) {
      echo "<script> alert('Data Biaya Kirim Harus Berisi Angka'); window.location='$admin_url'+'adminweb.php?module=edit_biaya&id_biaya_kirim='+'$idBiayaKirim';</script>";
    }
     else {
    $queryEdit = mysqli_query($koneksi, "UPDATE tbl_biaya_kirim SET id_kota='$Kota', id_kurir='$Kurir' , biaya='$Biaya' WHERE id_biaya_kirim='$idBiayaKirim'");


    if ($queryEdit) {
        echo "<script>alert('Data Biaya Kirim Berhasil Diubah');window.location='$admin_url'+'adminweb.php?module=biaya';</script>";
    } else {
       echo "<script>alert('Data Biaya Kirim Gagal Diubah');window.location='$admin_url'+'adminweb.php?module=edit_biaya';</script>";
    }
    
  }
}
?>