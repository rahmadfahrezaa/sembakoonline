<?php 

	error_reporting(0);
	include 'db.php';
	$alamat = mysqli_query($conn, "SELECT admin_address, admin_telp FROM tb_admin WHERE admin_id = 1");
	$a = mysqli_fetch_object($alamat);

	$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."' ");
	$p = mysqli_fetch_object($produk);
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
		<h1><a href="index.php"><img src="img/header.png" style="width: 35%;"></a><img src=""></h1>
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

	<!--Detail Produk-->
	<div class="section">
		<div class="container">
			<h3>Detail Produk</h3>
			<div class="box">
				<div class="col-2">
					<img src="produk/<?php echo $p->product_image ?>" width = "100%">
				</div>
				<div class="col-2">
					<h4 style="margin-bottom: 10px; text-align: center;">Detail Produk</h4>
					<h4 style="float: left; "><?php echo $p->product_name ?></h4><br>
					<h4 style="float: left; color: steelblue;">Rp. <?php echo number_format ($p->product_price) ?></h4><br><br><br>
					<p>Deskripsi Produk :
						<?php echo $p->product_description ?>
					</p>
					<p>Kontak via Whatsapp</p>
					<a href="https://api.whatsapp.com/send?phone=<?php echo $a->admin_telp ?>&text=Assalamu'alaykum, saya tertarik dengan produk Anda." target="_blank"><img src="img/whatsapp.ico"></a>
				</div>
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