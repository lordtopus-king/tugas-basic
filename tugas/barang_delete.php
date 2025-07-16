<?php
include 'db_connect.php';
$id = $_GET['id'];
$sql = "DELETE FROM barang WHERE kode_barang = '$id'";
if ($conn->query($sql) === TRUE) {
header("Location: barang_list.php");
exit();
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
?>