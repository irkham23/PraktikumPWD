<?php
	include_once("koneksi.php");

	if(isset($_POST['update']))
	{
 		$nim = $_POST['nim'];
 		$nama=$_POST['nama'];
		$jkel=$_POST['jkel'];
		$alamat=$_POST['alamat'];
		$tgllhr=$_POST['tgllhr'];
		$agama=$_POST['agama'];

	$result = mysqli_query($connect, "UPDATE mahasiswa SET nama='$nama', jkel='$jkel', alamat='$alamat', tgllhr='$tgllhr', agama='$agama' WHERE nim='$nim'");

	header("Location: index.php");
	}
?>
<?php
	$nim = $_GET['nim'];

	$result = mysqli_query($connect, "SELECT * FROM mahasiswa WHERE nim='$nim'");
	while($user_data = mysqli_fetch_array($result))
	{
		$nim = $user_data['nim'];
		$nama = $user_data['nama'];
		$jkel = $user_data['jkel'];
		$alamat = $user_data['alamat'];
		$tgllhr = $user_data['tgllhr'];
		$agama = $user_data['agama'];
	}
?>
<html>
<head>
	<title>Edit Data Mahasiswa</title>
</head>
<body>
 	<a href="index.php">Home</a><br/><br/>
	<form name="update_mahasiswa" method="post" action="edit.php">
		<table border="0">
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama" value=<?php echo $nama;?>></td>
			</tr>
			<tr>
				<td>Gender</td>
				<td><input type="text" name="jkel" value=<?php echo $jkel;?>></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><input type="text" name="alamat" value=<?php echo $alamat;?>></td>
			</tr>
			<tr>
				<td>Tanggal Lahir</td>
				<td><input type="text" name="tgllhr" value=<?php echo $tgllhr;?>></td>
			</tr>
			<tr>
				<td>Agama</td>
				<td><input type="text" name="agama" value=<?php echo $agama;?>></td>
			</tr>
			<tr>
				<td><input type="hidden" name="nim" value=<?php echo $_GET['nim'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
