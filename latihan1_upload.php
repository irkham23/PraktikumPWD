<?php 
	$lokasi_file = $_FILES['fupload']['tmp_name'];
	$nama_file = $_FILES['fupload']['name'];
	$deskripsi = $_POST['deskripsi'];

	$direktori = "C:\xampp\htdocs\PWD\Praktikum\Minggu 1\File Upload\$nama_file";

	if (move_uploaded_file($lokasi_file, $direktori)) {
		echo "Nama File : <br>$nama_file</b> berhasil diupload <br>";
		echo "Deskripsi File : <br>$deskripsi";
	}
	else {
		echo "File Gagal Diupload";
	}
?>