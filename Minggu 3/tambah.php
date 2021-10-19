<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data</title>
</head>
<body>
	<a href="index.php">Go to Home</a><br><br>

	<form action="tambah.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr>
				<td>NIM</td>
				<td><input type="text" name="nim"></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama"></td>
			</tr>
			<tr>
				<td>Gender (L/P)</td>
				<td><input type="text" name="jkel"></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><input type="text" name="alamat"></td>
			</tr>
			<tr>
				<td>Tanggal Lahir</td>
				<td><input type="text" name="tgllhr"></td>
			</tr>
			<tr>
				<td>Agama</td>
				<td><input type="text" name="agama"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="Submit" name="Submit" value="Tambah"></td>
			</tr>
		</table>
	</form>

	<?php
		if (isset($_POST['Submit'])) {
			$nim = $_POST['nim'];
			$nama = $_POST['nama'];
			$jkel = $_POST['jkel'];
			$alamat = $_POST['alamat'];
			$tgllhr = $_POST['tgllhr'];
			$agama = $_POST['agama'];

			include_once("koneksi.php");

			$result = mysqli_query($connect, "INSERT INTO mahasiswa (nim, nama, jkel, alamat, tgllhr, agama) VALUES ('$nim', '$nama', '$jkel', '$alamat', '$tgllhr', '$agama')");

			echo "Data Berhasil disimpan . <a href = 'index.php'>View Users</a>" ;
		}
	?>
</body>
</html>