<?php
	//database connection
    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "arkademy";

    $connection = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($connection));

    if(isset($_POST['update'])){
        $id = $_GET['edit']; 
	$nama = $_POST['nama'];
	$ket = $_POST['ket'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];

	$update = mysqli_query($connection, "UPDATE produk SET nama='$nama', ket='$ket', harga='$harga', jumlah='$jumlah'  WHERE id=$id");
        if($update) {
            echo "<script>
                    alert('Sukses');
                    document.location='insert.php';
                    </script>";
        } else {
            echo "<script>
                    alert('Gagal');
                    document.location='insert.php';
                    </script>";
        }
    }
?>
<html>
	<head>
		<title>CRUD Operations</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<?php 
            //  get the appropriate data of id
            
            if(isset($_GET['edit'])){
				if($_GET['edit']){ 
				$results = mysqli_query($connection, "SELECT * FROM produk WHERE id='$_GET[edit]'");
                    $data = mysqli_fetch_array($results);
                    if ($data) {
                    $nama = $data['nama'];
                    $keterangan = $data['ket'];
                    $harga = $data['harga'];
                    $jumlah = $data['jumlah'];
                    }
                }
            }
		?>	
		<form method="post">
		<h3 align="center"><I>Edit DATA</I></h3>
		<div class="input-group">
			<label>Nama Produk</label>
			<input type="text" name="nama" value="<?php echo $nama; ?>">
		</div>
		<div class="input-group">
			<label>Keterangan</label>
			<input type="text" name="ket" value="<?php echo $keterangan; ?>">
		</div>
		<div class="input-group">
			<label>Harga</label>
			<input type="text" name="harga" value="<?php echo $harga; ?>">
        </div>
        <div class="input-group">
			<label>Jumlah</label>
			<input type="text" name="jumlah" value="<?php echo $jumlah; ?>">
		</div>
		<div class="input-group">
			<button class="btn" type="submit" name="update" align="center">Edit</button>
			<a href="read.php"><button type="button" name="back" class="btn">Back</button></a>
		</div>
	</form>
	</body>
</html>