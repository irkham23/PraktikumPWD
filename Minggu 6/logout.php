<?php
session_start();
$id_user = $_SESSION['iduser'];

include 'koneksi.php';
mysqli_query($con, "UPDATE users SET status='Sedang Tidak Aktif' WHERE id_user='$id_user'");

session_destroy();
echo "Anda telah sukses keluar sistem <b>LOGOUT</b><br>";
echo "<a href=form_login.php><b>LOGIN LAGI!</b></a>";

?>