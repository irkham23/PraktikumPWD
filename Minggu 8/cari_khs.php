<?php
include 'koneksi.php';
?>

<h3>Form Pencarian DATA KHS Dengan PHP </h3>
<form action="" method="get">
	<label>Cari :</label>
	<input type="text" name="cari">
	<input type="submit" value="Cari">
</form>

<?php
if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	echo "<b>Hasil pencarian : ".$cari."</b>";
}
?>

<table border="1">
	<tr>
		<th>No</th>
		<th>NIM</th>
		<th>Nama Mahasiswa</th>
		<th>Kode MK</th>
		<th>Nama Matakuliah</th>
		<th>Nilai</th>
	</tr>

<?php
if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	$sql="SELECT khs.nim, mahasiswa.nama, khs.kodeMK, matakuliah.namaMK, khs.nilai FROM khs JOIN mahasiswa ON khs.nim = mahasiswa.nim JOIN matakuliah ON khs.kodeMK = matakuliah.kodeMK WHERE khs.nim = '$cari'";
	$tampil = mysqli_query($con,$sql);
}else{
	$sql="SELECT khs.nim, mahasiswa.nama, khs.kodeMK, matakuliah.namaMK, khs.nilai FROM khs JOIN mahasiswa ON khs.nim = mahasiswa.nim JOIN matakuliah ON khs.kodeMK = matakuliah.kodeMK";
	$tampil = mysqli_query($con,$sql);
}

$no = 1;
while($r = mysqli_fetch_array($tampil)){
?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $r['nim']; ?></td>
		<td><?php echo $r['nama']; ?></td>
		<td><?php echo $r['kodeMK']; ?></td>
		<td><?php echo $r['namaMK']; ?></td>
		<td><?php echo $r['nilai']; ?></td>
	</tr>
<?php } ?>
</table>