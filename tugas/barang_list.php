<?php
include 'db_connect.php';
$sql ="SELECT * FROM barang";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Daftar Barang</title>
<style>
body {
font-family: Arial, sans-serif;
margin: 20px;
}
table {
width: 100%;
border-collapse: collapse;
margin-top: 20px;
}
table, th, td {
border: 1px solid #ccc;
}
th, td {
padding: 10px;
text-align: left;
}
th {
background-color: #f4f4f4;
}
.button-container {
margin-bottom: 10px;
}
.add-button {
padding: 10px 15px;
background-color: #4CAF50;
color: white;
border: none;
cursor: pointer;
}
.back-button {
padding: 10px 15px;
background-color: #ed0e0e;
color: white;
border: none;
cursor: pointer;
}
.add-button:hover {
background-color: #45a049;
}
.back-button:hover {
background-color: #7d0418;
}
</style>
</head>
<body>
<h1>Daftar Barang</h1>
<div class="button-container">
<a href="Barang_tambah.php"><button class="add-button">Tambah Data</button></a>
<a href="index.php"><button class="back-button">Kembali</button></a>
</div>
<table>
<thead>
<tr>
<th>No</th>
<th>Kode</th>
<th>Nama</th>
<th>Satuan</th>
<th>Harga</th>
<th>Stok</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
<?php
if ($result->num_rows > 0) {
$no = 1;
while ($row = $result->fetch_assoc()) {
echo "<tr>";
echo "<td>" . $no++ . "</td>";
echo "<td>" . $row['kode_barang'] . "</td>";
echo "<td>" . $row['nama_barang'] . "</td>";
echo "<td>" . $row['satuan'] . "</td>";
echo "<td>" . $row['harga'] . "</td>";
echo "<td>" . $row['stok'] . "</td>";
echo "<td><a href='barang_edit.php?id=" . $row['kode_barang'] . "'><button>Edit</button></a>| <a href='barang_delete.php?id=" . $row['kode_barang'] . "'><button>Hapus</button></a>";
echo "</tr>";
}
}
?>
</tbody>
</table>
</body>
</html>