<?php
	//database connection
	$connection = mysqli_connect('localhost', 'root', '', 'arkademy');
?>
<?php
// Delete data
	if (isset($_GET['del'])) 
	{
		$id = $_GET['del'];
		mysqli_query($connection, "DELETE FROM produk WHERE id=$id");
	}
?>
<html>
	<head>
		<title>Read All Data</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<table>
	<thead>
		<tr>
			<th>Id</th>
			<th>Nama Produk</th>
			<th>Keterangan</th>
            <th>Harga</th>
            <th>Jumlah</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	<?php $results = mysqli_query($connection, "SELECT * FROM produk");
		while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['nama']; ?></td>
			<td><?php echo $row['ket']; ?></td>
            <td><?php echo $row['harga']; ?></td>
            <td><?php echo $row['jumlah']; ?></td>
			<td>
				<a href="edit.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="read.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
	<tr>
			<td><a href="index.php"><button type="button" name="back" class="btn">Back</button></a></td>
		</tr>
</table>

	</body>
</html>