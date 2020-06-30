<?php 
include "../../../lib/config.php";
include "../../../lib/koneksi.php";

$nama_pengguna = $_POST['Nama_pengguna'];
$username = $_POST['Username'];
$password = $_POST['Password'];
$no_hp = $_POST['No_hp'];
$email = $_POST['Email'];
$status = $_POST['Status'];

if($status == 1){
$querySimpan = mysqli_query($koneksi, "INSERT INTO tb_customer (nama_pengguna, username, password, no_hp, email) VALUES 
                                                  ('$nama_pengguna','$username','$password','$no_hp','$email')");

            if ($querySimpan) {
                echo "<script> alert('Data member Berhasil Masuk'); window.location='$admin_url'+'index.php';</script>";
            } 
            else {
			echo "<script> alert('Data Member Gagal Dimasukkan'); window.location='$admin_url'+'register.php'; </script>";
            }
}else{
$querySimpan = mysqli_query($koneksi, "INSERT INTO tb_founder (nama_founder, username, password, no_hp, email) VALUES 
                                                  ('$nama_pengguna','$username','$password','$no_hp','$email')");

            if ($querySimpan) {
                echo "<script> alert('Data member Berhasil Masuk'); window.location='$admin_url'+'index.php';</script>";
            } 
            else {
			echo "<script> alert('Data Member Gagal Dimasukkan'); window.location='$admin_url'+'register.php'; </script>";
            }


}
?>