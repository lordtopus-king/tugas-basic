<?php
include 'db_connect.php';
$id = $_GET['id'];
$sql = "DELETE FROM satuan WHERE kode_satuan = '$id'";
if ($conn->query($sql) === TRUE) {
header("Location: satuan_list.php");
exit();
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
?>