<?php  
$host = "localhost";
$username = "root";
$pw = "";
$DBname = "akademik";

$connect = mysqli_connect($host, $username, $pw, $DBname);

if (!$connect) {
	echo "EROR : " . mysqli_connect_error();
	exit();
}
?>