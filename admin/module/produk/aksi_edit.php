<?php 

session_start();
if (!isset($_SESSION['username']) AND !isset($_SESSION['password'])) {
    echo "<center>Untuk mengakses modul, Anda harus login dulu <br>";
    echo "<a href=$admin_url><b>LOGIN</b></a></center>";
  }else {
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    // ambil data yang dikirim dari form 
    $nama_file = $_FILES['gambar']['name'] ;
    $ukuran_file = $_FILES['gambar']['size'] ;
    $tipe_file = $_FILES['gambar']['type'] ; 
    $tmp_file = $_FILES['gambar']['tmp_name'] ;
    $path="../../upload/".$nama_file;

    $idProduk = $_POST['id_produk'];
    $idKategori = $_POST['idKategori'];
    $idMerek = $_POST['idMerek'];
    $namaProduk = $_POST['nama_produk'];
    $deskripsiProduk = $_POST['deskripsi'];
    $hargaProduk = $_POST['harga'];
    $slide = $_POST['slide'];
    $rekomendasi = $_POST['rekomendasi'];

    
    $namaPrdk= trim($namaProduk);
    $desk= trim($deskripsiProduk);
    $hrg= trim($hargaProduk);
    if ($namaPrdk=="") {
        echo "<script> alert('Nama Produk Harus Diisi'); window.location='$admin_url'+'adminweb.php?module=edit_produk&id_produk='+'$idProduk';</script>";
    } 

    else if ($desk=="") {
        echo "<script> alert('Deskripsi Produk Harus Diisi'); window.location='$admin_url'+'adminweb.php?module=edit_produk&id_produk='+'$idProduk';</script>";
    } 

    else if ($hrg=="") {
        echo "<script> alert('Harga Produk Harus Diisi'); window.location='$admin_url'+'adminweb.php?module=edit_produk&id_produk='+'$idProduk';</script>";
    } 
    elseif (!is_numeric($hrg)) {
        echo "<script> alert('Harga Produk Harus Berisi Angka'); window.location='$admin_url'+'adminweb.php?module=edit_produk&id_produk='+'$idProduk';</script>";
    }

    else {

    if (empty($nama_file)) {
        //jika user tidak mau update foto
        $queryEdit = mysqli_query($koneksi, "UPDATE tbl_produk SET 
                    id_kategori= '$idKategori' , 
                    id_merek = '$idMerek' , 
                    nama_produk='$namaProduk' , 
                    deskripsi ='$deskripsiProduk' , 
                    harga ='$hargaProduk' , 
                    slide ='$slide' , 
                    rekomendasi ='$rekomendasi' 
                    WHERE id_produk='$idProduk'");

        if ($queryEdit) {
            echo "<script>alert('Data Produk Berhasil Diubah');
            window.location='$admin_url'+'adminweb.php?module=produk';</script>";
        } else {
        echo "<script>
                alert('Data gagal diubah');
            
                </script>";
        }
            
    } else {
        if ($tipe_file == "image/jpeg" || $tipe_file = "image/png") {
               if ($ukuran_file <= 10000000) {
                   if (move_uploaded_file($tmp_file, $path)) {
                       $queryEdit = mysqli_query($koneksi, "UPDATE tbl_produk SET 
                           id_kategori= '$idKategori' , 
                           id_merek = '$idMerek' , 
                           nama_produk='$namaProduk' , 
                           deskripsi ='$deskripsiProduk' , 
                           harga ='$hargaProduk' , 
                           gambar ='$nama_file' , 
                           slide ='$slide' , 
                           rekomendasi ='$rekomendasi' 
                           WHERE id_produk='$idProduk'");
       
           if ($queryEdit) {
               echo "<script>alert('Data Produk Berhasil Diubah');
               window.location='$admin_url'+'adminweb.php?module=produk';</script>";
           } else {
              echo "<script>
                   alert('Data gagal diubah');
                   window.location = '$admin_url'+'adminweb.php?module=tambah_produk';
                   </script>";
           }
       } else {
           echo "
                       <script>
                           alert('Data gambar gagal');
                           window.location = '$admin_url'+'adminweb.php?module=tambah_produk';
                       </script>";
       }
       } else {
            echo "
                   <script>
                       alert('Data gambar terlalu besar');
                       window.location = '$admin_url'+'adminweb.php?module=tambah_produk';
                   </script>";
       }
       } else {
            echo "
               <script>
                   alert('Type gambar salah');
                   window.location = '$admin_url'+'adminweb.php?module=tambah_produk';
               </script>";
       }
        
    }

    
}
} 
    
?>