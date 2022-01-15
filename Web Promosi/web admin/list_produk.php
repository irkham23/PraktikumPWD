<?php 

error_reporting(0);
require_once '../config/config.php';
require_once '../config/koneksi.php';

session_start();
	if (!isset($_SESSION['pembeli'])) {
	}


$limit = 9;
if(isset($_GET['p']))
{
    $noPage = $_GET['p'];
}
else $noPage = 1;

$offset = ($noPage - 1) * $limit;

$terkini = 'SELECT
produk.id_produk,
produk.Nama,
produk.gambar,
produk.nama_kategori,
produk.qty,
produk.harga
FROM
produk
ORDER BY
produk.id_produk DESC
LIMIT '
.$offset.",". $limit;

$qry = $mysqli->query($terkini);

$sql_rec = "SELECT id_produk FROM produk";

$total_rec = $mysqli->query($sql_rec);

$total_rec_num = $total_rec->num_rows;

$total_page = ceil($total_rec_num/$limit);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../asset/bootstrap/css/bootstrap.min.css?v=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../asset/font-awesome/css/font-awesome.min.css">
  	<link rel="stylesheet" type="text/css" href="../asset/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="../dist/css/admin-style.css?v=<?php echo time(); ?>">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
	<div class="header" style="background: black; height: 50px; width: 100%; position: fixed;">
		<h3>Amanah Batu Ukir</h3>
	</div>
	<div class="container">
		<nav class="sidebar">
			<div class="text">Side Menu</div>
			<ul>
				<li><a href="dashboard-admin.php">Dashboard</a></li>
				<li>
					<a href="#" class="prod-btn ">Produk
						<span class="fas fa-caret-down first"></span>
					</a>
					<ul class="prod-show">
						<li><a href="add_produk.php">Add Produk</a></li>
						<li><a href="list_produk.php">List Produk</a></li>
					</ul>
				</li>
				<li>
					<a href="#" class="ord-btn ">Orders
						<span class="fas fa-caret-down second"></span>
					</a>
					<ul class="ord-show">
						<li><a href="new-order.php">New Orders</a></li>
						<li><a href="list-order.php">List Orders</a></li>
					</ul>
				</li>
				<li><a href="customer.php" >Customers</a></li>
				<li><a href="seller.php">Sellers</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</nav>
	</div>

	<!-- produk -->
	<section class="relief" id="relief">
		<div class="container produk">
			<div class="container" style="padding: 30px; margin-bottom: 30px;">
				<form action="search-produk.php" method="GET" role="search">
					<input type="text" name="cari" placeholder="Search" class="form-control" id="seacrh-form" style="width: 250px; float: right;">
				</form>	
			</div>
			<?php while ($index = $qry->fetch_assoc()) { ?>
                <div class="list-produk">
                        <img src="<?php echo $base_url."image/gambar produk/".$index['gambar']; ?>" class="wow fadeIn">
                            <br><br><h5 class="text-center"><?php echo $index['Nama']; ?></h5>
                            <br><p class="text-center" style="color: black; font-size: 0.7em;">
	                            	<?php echo $index['nama_kategori']; ?>&nbsp&nbsp|&nbsp&nbsp
	                            	Stok <?php echo $index['qty']; ?>&nbsp&nbsp|&nbsp&nbsp	
	                            	Rp. <?php echo number_format($index['harga'],0,',','.'); ?>
                            	</p>
                            <hr style="color: black; font-size: 1px;">
                        <a class="btn btn-primary" href="edit-produk.php?id=<?=$index['id_produk']?>" style="width: 100px; float: left;">Edit</a> <a onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini?');" class="btn btn-danger" href="hapus-produk.php?id=<?=$index['id_produk']?>" style="width: 100px; float: right;">Hapus</a>
                </div> 
            <?php } ?>
            <div style="padding: 55px; margin-left: 15px;">
                <nav aria-label="Page navigation example">
                </nav>
                <ul class="pagination">
                <?php if ($total_rec_num > $limit) { ?>
                <?php if ($noPage > 1 ) { ?>
                	<li class="page-item">
                		<a class="page-link" href="<?php echo $base_url."web admin/list_produk.php?p=".($noPage-1);?>">
                			<span aria-hidden="true">&laquo;</span>
                    	</a>
                    </li>
                    <?php } ?>
                    <?php for ($page=1; $page <= $total_page ; $page++) { ?>
                    	<?php if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $total_page)) { ?>
                        	<?php
                                $showPage = $page;
                                if ($page==$total_page && $noPage <= $total_page-5) echo "<li class='active page-item'><a class='page-link'>...</a></li>";
                                if ($page == $noPage) echo "<li class='active page-item'><a class='page-link' href='#'>".$page."</a></li> ";
                               	else echo   " <li class='page-item' ><a class='page-link' href='".$_SERVER['PHP_SELF']."?p=".$page."'>".$page."</a></li> ";
                                if ($page == 1 && $noPage >=6) echo "<li class='active page-item'><a class='page-link'>...</a></li>";
                            ?>
                        <?php } ?>
                    <?php } ?>
                    <?php if ($noPage < $total_page) { ?>
                    	<li class="page-item">
                        	<a class="page-link" href="<?php echo $base_url."web admin/list_produk.php?p=".($noPage+1); ?>">
                            	<span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    <?php } ?>
                <?php } ?>
                </ul>
           	</div>
		</div>
	</section>
	<!-- end produk -->

	<script>
		$('.prod-btn').click(function(){
			$('nav ul .prod-show').toggleClass("show"); 
		});
		$('.ord-btn').click(function(){
			$('nav ul .ord-show').toggleClass("show1"); 
		});
	</script>
</body>
</html>