<?php  
$host = "localhost";
$username = "root";
$pw = "";
$DBname = "akademik";

$con = mysqli_connect($host, $username, $pw, $DBname);

if (!$con) {
	echo "EROR : " . mysqli_connect_error();
	exit();
}
?>