<?php 
	session_start();
	include'db.php';
	if ($_SESSION['status_login'] !=true ) {
		echo'<script>window.location="login.php"</script>';
	}

		$kategori = mysqli_query($conn, "SELECT * FROM tb_category WHERE category_id = '".$_GET['id']."' ");
		if(mysqli_num_rows($kategori) == 0 )
			echo '<script>window.location="data-kategori.php"</script>';
		$k = mysqli_fetch_object($kategori);
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
		<h1><a href="dashboard.php"><img src="img/header.png" style="width: 35%;"></a></h1>
		<ul>
			<li><a href="dashboard.php">Dashboard</a></li>
			<li><a href="profile.php">Profile</a></li>
			<li><a href="data-kategori.php">Data Kategori</a></li>
			<li><a href="data-produk.php">Data Produk</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
		</div>
	</header>
	<!--Content-->
	<div class="section">
		<div class="container">
			<h3>Edit Data Kategori</h3>
			<div class="box">
				<form action="" method="POST">
					<input type="text" name="tambah_data"placeholder="Nama Kategori" class="input-control" value=" <?php echo $k->category_name ?>" required>
					<input type="submit" name="submit" value="Submit" class="btn">
				</form>
				<?php 
					if(isset($_POST['submit'])){

						$tambah_data = ucwords($_POST['tambah_data']);

						$update = mysqli_query($conn, "UPDATE tb_category SET
							category_name = '".$tambah_data."' WHERE category_id = '".$k->category_id."' ");

						if($update){
								echo '<script>alert("Edit Data Kategori Berhasil")</script>';
								echo '<script>window.location = "data-kategori.php"</script>';
						}else{
							echo 'Edit Data Kategori Gagal' .mysqli_error($conn);
						}
					}
				 ?>
			</div>
		</div>
	</div>

	<!--Footer-->
	<footer>
		<div class="container">
			<small> Copyright &copy; 2021 - Sembako Online </small>
		</div>
	</footer>
</body>
</html>