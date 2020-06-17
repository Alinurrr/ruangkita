<?php 
include "../../../lib/config.php";
include "../../../lib/koneksi.php";

// untuk menangkap variabel 'namaKurir' yang dikirim oleh form_tambah.php
$namaKurir = $_POST['namaKurir'] ;
$namaKur = trim($namaKurir); //untuk menghapus spasi dia awal
if ($namaKur=="") {
    echo "<script> alert('Data Kurir Harus Diisi'); window.location='$admin_url'+'adminweb.php?module=tambah_kurir';</script>";
}else {
// query untuk menyimapn tabel ke tabel tbl_kurir
$querySimpan = mysqli_query($koneksi, "INSERT INTO tbl_kurir (nama_kurir) VALUES ('$namaKurir')");

// jike query berhasil maka akan tampil alert dan halaman akan kembali ke daftar kurir
if ($querySimpan) {
    echo "<script> alert('Data Kurir Berhasil Masuk'); window.location='$admin_url'+'adminweb.php?module=kurir';</script>";
} else {
    echo "<script> alert('Data Kurir Gagal Dimasukkan'); window.location='$admin_url'+'adminweb.php?module=tambah_kurir';</script>";
}
}



?>