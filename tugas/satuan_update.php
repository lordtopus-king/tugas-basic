<?php
include 'db_connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$kode = $conn->real_escape_string($_POST['kode']);
$nama = $conn->real_escape_string($_POST['nama']);
$sql = "UPDATE satuan SET nama_satuan = '$nama' WHERE kode_satuan = '$kode'";
if ($conn->query($sql) === TRUE) {
header("Location: satuan_list.php");
exit();
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>