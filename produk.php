<?php 

	error_reporting(0);
	include 'db.php';
	$alamat = mysqli_query($conn, "SELECT admin_address FROM tb_admin WHERE admin_id = 1");
	$a = mysqli_fetch_object($alamat);
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sembako Online</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
	<link rel="shortcut icon" href="img/favicon.png">
</head>
<body>

	<!--Header-->
	<header>
		<div class="container">
		<h1><a href="index.php"><img src="img/header.png" style="width: 35%;"></a></h1>
		<ul>
			<li><a href="produk.php">Produk</a></li>
		</ul>
		</div>
	</div>
		</div>	
	</header>

	<!--Search-->
	<div class="search">
		<div class="container">
			<form action="produk.php">
				<input type="text" name="search" placeholder="Cari Produk" value=" <?php echo $_GET['search'] ?>">
				<input type="hidden" name="kat" <?php echo $_GET['kat'] ?>>
				<input type="submit" name="Cari" value=" Search ">
			</form>	
		</div>
	</div>

	<!--Produk Baru-->
	<div class="section">
		<div class="container">
			<h3 style="text-align: left;">Produk</h3>
			<div class="box">
				<?php 
				if($_GET['search'] !='' || $_GET['kat'] !='' ){
					$dimana = "AND product_name LIKE '%".$_GET['search']."%' AND category_id LIKE '%".$_GET['kat']."%' ";}

				$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 $dimana ORDER BY product_id DESC");

				if(mysqli_num_rows($produk) >0){
					while($p = mysqli_fetch_array($produk)){
				?>
				<a href="detail-produk.php?id=<?php echo $p['product_id'] ?>">
				<div class="col-3">
					<img src="produk/<?php echo $p['product_image'] ?>">
					<p class="nama"><?php echo substr($p['product_name'], 0, 30)  ?></p>
					<p class="harga">Rp. <?php echo number_format($p['product_price']) ?></p>
				</div>
				</a>
				<?php }}else{ ?>
				<p>Produk Tidak Ada</p>
				<?php } ?>
			</div>
		</div>
	</div>

	<!--Footer-->
	<footer>
		<div class="container">
			<img src="img/find.png" style="height: 35px; width: 26px;">
			<h4>Alamat</h4>
			<p><?php echo $a->admin_address ?></p>
			<small style="float: right; margin-top: 20px;"> Copyright &copy; 2021 - Sembako Online </small>
		</div>
	</footer>
</body>
</html>