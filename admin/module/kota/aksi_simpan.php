<?php 
include "../../../lib/config.php";
include "../../../lib/koneksi.php";

// untuk menangkap variabel 'namaKota' yang dikirim oleh form_tambah.php
$namaKota = $_POST['namaKota'] ;
$namaKot = trim($namaKota); //untuk menghapus spasi dia awal
    if ($namaKot=="") {
        echo "<script> alert('Data Kota Harus Diisi'); window.location='$admin_url'+'adminweb.php?module=tambah_kota';</script>";
    }else {
// query untuk menyimapn tabel ke tabel tbl_kota
$querySimpan = mysqli_query($koneksi, "INSERT INTO tbl_kota (nama_kota) VALUES ('$namaKota')");

// jike query berhasil maka akan tampil alert dan halaman akan kembali ke daftar kota
if ($querySimpan) {
    echo "<script> alert('Data Kota Berhasil Masuk'); window.location='$admin_url'+'adminweb.php?module=kota';</script>";
} else {
    echo "<script> alert('Data Kota Gagal Dimasukkan'); window.location='$admin_url'+'adminweb.php?module=tambah_kota';</script>";
}
}



?>