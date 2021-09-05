<?php 
	session_start();
	include'db.php';
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
	<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
</head>
<body>
	<!--Header-->
	<header>
		<div class="container">
		<h1><a href="dashboard.php">Sembako Online</a></h1>
		<ul>
			<li><a href="dashboard.php"><img src="img/header.png" style="width: 35%;"></a></li>
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
			<h3>Tambah Data Produk</h3>
			<div class="box">
				<form action="" method="POST" enctype="multipart/form-data">
					<select class="input-control" name="kategori" required="">
						<option value="">--Pilih--</option>
						<?php 
							$kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
							while ($r = mysqli_fetch_array($kategori))  {
						 ?>
						 <option value="<?php echo $r['category_id'] ?>"><?php echo $r['category_name'] ?></option>
						<?php } ?>
					</select>



					<input type="text" name="nama" class="input-control" placeholder="Nama Produk" required>
					<input type="text" name="harga" class="input-control" placeholder="Harga Produk" required>
					<input type="file" name="gambar" class="input-control" required>
					<textarea class="input-control" name="deskripsi" placeholder="Deskripsi"></textarea><br>
					<select class="input-control" name="status">
						<option value="">--Pilih--</option>
						<option value="1">Aktif</option>
						<option value="0">Tidak Aktif</option>
					</select>
					<input type="submit" name="submit" value="Submit" class="btn">
				</form>
				<?php 
					if(isset($_POST['submit'])){

						// print_r($_FILES['gambar']);

						// Menampung Input dari Form
						$kategori 	= $_POST['kategori'];
						$nama 		= $_POST['nama'];
						$harga 		= $_POST['harga'];
						$deskripsi 	= $_POST['deskripsi'];
						$status 	= $_POST['status'];

						// Menampung Data File yang di Upload
						$filename = $_FILES['gambar']['name'];
						$tmp_name = $_FILES['gambar']['tmp_name'];

						$type1 = explode('.', $filename);
						$type2 = $type1[1];

						$newname = 'produk' .time(). '.' .$type2;

						// Menampung Fata Format File yang Diizinkan
						$tipe_diperbolehkan = array('jpg', 'jpeg', 'png');

						// Validasi format file
						if(!in_array($type2, $tipe_diperbolehkan)){

						//Jika Format File tidak Sesuai dengan dalam array diperbolehkan
							echo '<script>alert("Format File Tidak Diperbolehkan")</script>';
						}else{

						//Jika Format File Sesuai dengan dalam array diperbolehkan
						// Proses Upload File dan Insert database
							move_uploaded_file($tmp_name, './produk/' .$newname);

							$insert = mysqli_query($conn, "INSERT INTO tb_product VALUES (
									null,
									'".$kategori."',
									'".$nama."',
									'".$harga."',
									'".$deskripsi."',
									'".$newname."',
									'".$status."',
									null
									) ");

							if($insert){
								echo '<script>alert("Simpan Data Berhasil")</script>';
								echo '<script>window.location = "data-produk.php"</script>' ;
							}else{
								echo 'Gagal'.mysqli_error($conn);
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

	<script>
		CKEDITOR.replace( 'deskripsi' );
    </script>
</body>
</html>