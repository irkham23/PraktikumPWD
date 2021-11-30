<?php
	session_start();
	include "koneksi.php";
	$id_user = $_POST['id_user'];
	$pass=md5($_POST['paswd']);
	$sql="SELECT * FROM users WHERE id_user='$id_user' AND password='$pass'";

	if ($_POST["captcha_code"] == $_SESSION["captcha_code"]) {
		$login=mysqli_query($con,$sql);
		$ketemu=mysqli_num_rows($login);
		$r= mysqli_fetch_array($login);

		if ($ketemu > 0){
			$_SESSION['users'] = 1;
			$_SESSION['iduser'] = $r['id_user'];
			$_SESSION['passuser'] = $r['password'];
			mysqli_query($con, "UPDATE users SET status='Sedang Aktif' WHERE id_user='$id_user'");
			echo"USER BERHASIL LOGIN<br>";
			echo "id user =",$_SESSION['iduser'],"<br>";
			echo "password=",$_SESSION['passuser'],"<br>";
			echo "<a href=logout.php><b>LOGOUT</b></a></center>";
		}
		else{
			echo "<center>Login gagal! username & password tidak benar<br>";
			echo "<a href=form_login.php><b>ULANGI LAGI</b></a></center>";
		}
		mysqli_close($con);
	}
	else {
		echo "<center>Login gagal! Captcha tidak sesuai<br>";
		echo "<a href=form_login.php><b>ULANGI LAGI</b></a></center>"; 
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table border="1">
		<tr>
			<th>ID USER</th>
			<th>NAMA</th>
			<th>STATUS</th>
		</tr>
	<?php  
	include 'koneksi.php';
		$result = mysqli_query($con, "SELECT * FROM users");
		while ($data = mysqli_fetch_array($result)) {
	?>
		<tr>
			<td><?php echo $data['id_user']; ?></td>
			<td><?php echo $data['nama_lengkap'] ?></td>
			<?php  
				if ($data['status']=="Sedang Aktif") {
			?>
			<td style="color: blue; font-weight: bold;"><?php echo $data['status'] ?></td>
			<?php  
				}else{
			?>
			<td style="color: red; font-weight: bold;"><?php echo $data['status'] ?></td>
			<?php  
				}
			?>
		</tr>

	<?php 
		}
	?>
	</table>
</body>
</html>