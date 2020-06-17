<?php 

session_start();
if (!isset($_SESSION['username']) AND !isset($_SESSION['password'])) {
    echo "<center>Untuk mengakses modul, Anda harus login dulu <br>";
    echo "<a href=$admin_url><b>LOGIN</b></a></center>";
  }else {
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idKota = $_POST['id_kota'];
    $namaKota = $_POST['nama_kota'];
    $namaKot = trim($namaKota); //untuk menghapus spasi dia awal
    if ($namaKot=="") {
        echo "<script> alert('Data Kota Harus Diisi'); window.location='$admin_url'+'adminweb.php?module=edit_kota&id_kota='+'$idKota';</script>";
    }else {
    $queryEdit = mysqli_query($koneksi, "UPDATE tbl_kota SET nama_kota='$namaKota' WHERE id_kota='$idKota'");


    if ($queryEdit) {
        echo "<script>alert('Data Kota Berhasil Diubah');window.location='$admin_url'+'adminweb.php?module=kota';</script>";
    } else {
       echo "<script>alert('Data Kota Gagal Diubah');</script>";
    }
  }
  }
?>