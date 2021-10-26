<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data</title>
	<style>
		.error {color: #FF0000;}
	</style>
</head>
<body>

	<?php
		$namaErr = $emailErr = $genderErr = $websiteErr = "";
		$nama = $email = $gender = $comment = $website = "";
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST["nama"])) {
				$namaErr = "Nama harus diisi";
			}else {
				$nama = test_input($_POST["nama"]);
			}
			if (empty($_POST["email"])) {
				$emailErr = "Email harus diisi";
			}else {
				$email = test_input($_POST["email"]);
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$emailErr = "Email tidak sesuai format";
				}
			}
			if (empty($_POST["website"])) {
				$website = "";
			}else {
				$website = test_input($_POST["website"]);
			}
			if (empty($_POST["komentar"])) {
				$comment = "";
			}else {
				$comment = test_input($_POST["komentar"]);
			}
			if (empty($_POST["gender"])) {
				$genderErr = "Gender harus dipilih";
			}else {
				$gender = test_input($_POST["gender"]);
			}
		}

		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
	?>

	<h2>Posting Komentar </h2>
	<p><span class = "error">* Harus Diisi.</span></p>

	<form action="validasi.php" method="post" name="form1">
		<table width="25%" border="0">

			<tr>
				<td>
					<input type="hidden" name="id">
				</td>
			</tr>
			<tr>
				<td>Nama : </td>
				<td>
					<input type="text" name="nama">
					<span class = "error">* <?php echo $namaErr;?></span>
				</td>
			</tr>
			<tr>
				<td>E-mail : </td>
				<td>
					<input type="text" name="email">
					<span class = "error">* <?php echo $namaErr;?></span>
				</td>
			</tr>
			<tr>
				<td>Website : </td>
				<td>
					<input type="text" name="website">
				</td>
			</tr>
			<tr>
				<td>Komentar:</td>
				<td><textarea name = "komentar" rows = "5" cols = "40"></textarea></td>
			</tr>
			<tr>
				<td>Gender : </td>
				<td>
					<input type = "radio" name = "gender" value = "Laki-Laki">Laki-Laki
					<input type = "radio" name = "gender" value = "Perempuan">Perempuan
					<span class = "error">* <?php echo $namaErr;?></span>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="Submit" name="Submit" value="Tambah"></td>
			</tr>
		</table>
	</form>

	<?php
		if (isset($_POST['Submit'])) {
			$nama = $_POST['nama'];
			$email = $_POST['email'];
			$website = $_POST['website'];
			$komentar = $_POST['komentar'];
			$gender = $_POST['gender'];

			include_once("koneksi.php");

			$result = mysqli_query($connect, "INSERT INTO users (id, nama, email, website, komentar, gender) VALUES (' ', '$nama', '$email', '$website', '$komentar', '$gender')");
		}
	?>

	<?php
		echo "<h2>Data yang anda isi:</h2>";
		echo $nama;
		echo "<br>";
		echo $email;
		echo "<br>";
		echo $website;
		echo "<br>";
		echo $comment;
		echo "<br>";
		echo $gender;
	?>
</body>
</html>