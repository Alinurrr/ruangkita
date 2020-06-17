<?php 

session_start();
if (!isset($_SESSION['username']) AND !isset($_SESSION['password'])) {
    echo "<center>Untuk mengakses modul, Anda harus login dulu <br>";
    echo "<a href=$admin_url><b>LOGIN</b></a></center>";
  }else {
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idKurir = $_POST['id_kurir'];
    $namaKurir = $_POST['nama_kurir'];
    $namaKur = trim($namaKurir); //untuk menghapus spasi dia awal
    if ($namaKur=="") {
        echo "<script> alert('Data Kurir Harus Diisi'); window.location='$admin_url'+'adminweb.php?module=edit_kurir&id_kurir='+'$idKurir';</script>";
    }else {
    $queryEdit = mysqli_query($koneksi, "UPDATE tbl_kurir SET nama_kurir='$namaKurir' WHERE id_kurir='$idKurir'");


    if ($queryEdit) {
        echo "<script>alert('Data Kurir Berhasil Diubah');window.location='$admin_url'+'adminweb.php?module=kurir';</script>";
    } else {
       echo "<script>alert('Data Kurir Gagal Diubah');</script>";
    }
  }
  }
?>