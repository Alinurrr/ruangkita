<?php
include "../lib/koneksi.php";
$email = $_POST['Email'];
$password = $_POST['Password'];

$login = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE email='$email' AND password = '$password'");
$ketemu = mysqli_num_rows($login);
$r = mysqli_fetch_array($login);

// apabila Email dan password ditemukan 
if ($ketemu > 0) {
    session_start();
    $_SESSION['email'] = $r['email'];
    $_SESSION['password'] = $r['password'];
    header('location:adminweb.php?module=home');
} else {
    echo "<center>LOGIN GAGAL! <br>
        Email atau password anda tidak benar. <br>
        atau akun anda sedang di blokir <br>";
    echo "<a href=index.php><b>ULANGI LAGI</b></a></center>";
}
