<?php 
	session_start();
	include'db.php';
	if ($_SESSION['status_login'] !=true ) {
		echo'<script>window.location="login.php"</script>';
	}

	$query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '".$_SESSION['id']."'");
	$s = mysqli_fetch_object($query); 

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sembako Online</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="shortcut icon" href="img/favicon.png">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
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
			<h3>Profile</h3>
			<div class="box">
				<form action="" method="POST">
					<input type="text" name="nama"placeholder="Nama Lengkap" class="input-control" value="<?php echo $s->admin_name ?>" required>
					<input type="text" name="user"placeholder="Username" class="input-control" value="<?php echo $s->username ?>" required>
					<input type="text" name="hp"placeholder="No. HP" class="input-control" value="<?php echo $s->admin_telp ?>" required>
					<input type="text" name="email"placeholder="Alamat Email" class="input-control" value="<?php echo $s->admin_email ?>" required>
					<input type="text" name="alamat"placeholder="Alamat Lengkap" class="input-control" value="<?php echo $s->admin_address ?>" required>
					<input type="submit" name="submit" value="Update Profile" class="btn">
				</form>
				<?php 
					if(isset($_POST['submit'])){

						$nama 	= ucwords($_POST['nama']);
						$user 	= $_POST['user'];
						$hp 	= $_POST['hp'];
						$email 	= $_POST['email'];
						$alamat = ucwords($_POST['alamat']);

						$update = mysqli_query($conn, "UPDATE tb_admin SET 
							admin_name = '".$nama."',
							username = '".$user."',
							admin_telp = '".$hp."',
							admin_email = '".$email."',
							admin_address = '".$alamat."'
							WHERE admin_id = '".$s->admin_id."'");

						if($update){
							echo '<script>alert("Update Data Berhasil")</script>';
							echo '<script>window.location=profile.php</script>';
						}else{
							echo 'Gagal' .mysqli_error($conn);

						}

					}
				 ?>
			</div>
			<h3>Ubah Password</h3>
			<div class="box">
				<form action="" method="POST">
					<input type="password" name="passbar1"placeholder="Password Baru" class="input-control" required>
					<input type="password" name="passbar2"placeholder="Ulangi Password" class="input-control" required>
					<input type="submit" name="ubah_password" value="Ubah Password" class="btn">
				</form>
				<?php 
					if(isset($_POST['ubah_password'])){

						$passbar1 	= $_POST['passbar1'];
						$passbar2 	= $_POST['passbar2'];

						if($passbar2 != $passbar1){
							echo '<script>alert("Konfirmasi Password Baru Salah!")</script>';
						}else{
							$u_pass = mysqli_query($conn, "UPDATE tb_admin SET 
							password = '".$passbar1."'
							WHERE admin_id = '".$s->admin_id."'");

						if($u_pass){
							echo '<script>alert("Update Pasword Berhasil")</script>';
							echo '<script>window.location=profile.php</script>';
						}else{
							echo 'Ubah Password Gagal' .mysqli_error($conn);
						}
						
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