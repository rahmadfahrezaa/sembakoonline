<?php 
	session_start();
	if ($_SESSION['status_login'] !=true ) {
		echo'<script>window.location="login.php"</script>';
	}
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
			<h3>Dashboard</h3>
			<div class="box">
				<h4>Selamat Datang <?php echo $_SESSION['a_global']->admin_name?> di Sembako Online</h4>
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