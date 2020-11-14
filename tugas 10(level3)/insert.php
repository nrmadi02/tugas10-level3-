<?php


    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "arkademy";

    $connection = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($connection));


	if(isset($_POST['save'])){
        $simpan = mysqli_query($connection, "INSERT INTO produk (id, nama, ket, harga, jumlah)
                                            VALUES ('',
                                                    '$_POST[nama]',
                                                    '$_POST[ket]',
                                                    '$_POST[harga]',
                                                    '$_POST[jml]')
                                            ");
        if($simpan) {
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
		
		<form method="post" action="insert.php" >
		<h3 align="center"><I>ADD NEW DATA</I></h3>
		<div class="input-group">
			<label>Name Produk</label>
			<input type="text" name="nama" value="">
		</div>
		<div class="input-group">
			<label>Keterangan</label>
			<input type="text" name="ket" value="">
		</div>
		<div class="input-group">
			<label>Harga</label>
			<input type="text" name="harga" value="">
		</div>
        <div class="input-group">
			<label>Jumlah</label>
			<input type="text" name="jml" value="">
		</div>
		<div class="input-group">
			<button class="btn" type="submit" name="save" align="center">Save</button>
			<a href="index.php"><button type="button" name="back" class="btn">Back</button></a>
		</div>
	</form>
	</body>
</html>