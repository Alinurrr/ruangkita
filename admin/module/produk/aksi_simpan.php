<?php 
include "../../../lib/config.php";
include "../../../lib/koneksi.php";

// ambil data yang dikirim dari form
$nama_file = $_FILES['gambar']['name'] ;
$ukuran_file = $_FILES['gambar']['size'] ;
$tipe_file = $_FILES['gambar']['type'] ;
$tmp_file = $_FILES['gambar']['tmp_name'] ;

// data selain gambar
$idKategori = $_POST['idKategori'];
$idMerek = $_POST['idMerek'];
$namaProduk = $_POST['namaProduk'];
$deskripsi = $_POST['deskripsiProduk'];
$hargaProduk = $_POST['hargaProduk'];
$slide = $_POST['slide'];
$rekomendasi = $_POST['rekomendasi'];
// set path folder tempat menyimpan gambar
$path="../../upload/".$nama_file;

$namaPrdk= trim($namaProduk);
$desk= trim($deskripsi);
$hrg= trim($hargaProduk);
// nama produk kosong
if ($namaPrdk=="") {
    echo "<script> alert('Nama Produk Harus Diisi'); window.location='$admin_url'+'adminweb.php?module=tambah_produk';</script>";
} 
// deskripsi kosong
else if ($desk=="") {
    echo "<script> alert('Deskripsi Produk Harus Diisi'); window.location='$admin_url'+'adminweb.php?module=tambah_produk';</script>";
} 
// data harga kosong
else if ($hrg=="") {
    echo "<script> alert('Harga Produk Harus Diisi'); window.location='$admin_url'+'adminweb.php?module=tambah_produk';</script>";
}
// data harga bukan angka
elseif (!is_numeric($hrg)) {
    echo "<script> alert('Harga Produk Harus Berisi Angka'); window.location='$admin_url'+'adminweb.php?module=tambah_produk';</script>";
}
// data gambar kosong
else if ($nama_file=="") {
    echo "<script> alert('Gambar Produk Harus Diisi'); window.location='$admin_url'+'adminweb.php?module=tambah_produk';</script>";
} 
// data sudah terisi semua
else {
    
    if ($tipe_file=='image/jpeg'||$tipe_file=='image/png') {
        if ($ukuran_file <= 1000000) {
            if (move_uploaded_file($tmp_file, $path)) {
                $querySimpan = mysqli_query($koneksi, "INSERT INTO tbl_produk(id_kategori, id_merek, nama_produk, deskripsi,  harga, gambar, slide,rekomendasi) VALUES  ('$idKategori','$idMerek','$namaProduk','$deskripsi','$hargaProduk','$nama_file','$slide','$rekomendasi')");
                if ($querySimpan) {
                    echo "<script> alert('Data Produk Berhasil Masuk'); window.location='$admin_url'+'adminweb.php?module=produk';</script>";
                } else {
                    echo "<script> alert('Data Produk Gagal Dimasukkan'); window.location='$admin_url'+'adminweb.php?module=tambah_produk'; </script>";
                }
            }else {
                echo "<script> alert('Data Gambar Produk Gagal Dimasukkan'); window.location='$admin_url'+'adminweb.php?module=tambah_produk';</script>";
        }
    }else {
        echo "<script> alert('Data Gambar Produk Gagal Dimasukkan'); window.location='$admin_url'+'adminweb.php?module=tambah_produk';</script>";
    }
    
}
}



?>