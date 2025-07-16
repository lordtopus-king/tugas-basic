<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "final_exam"; // HARUS sama dengan nama database yang dibuat di phpMyAdmin

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
