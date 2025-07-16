<?php
$servername = "localhost";
$username = "root";
$password =
"";
$dbname =

"latihan_crud";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
?>