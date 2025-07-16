<?php 
include 'db_connect.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    $kode = $conn->real_escape_string($_POST['kode']); 
    $nama = $conn->real_escape_string($_POST['nama']); 
    $satuan = $conn->real_escape_string($_POST['satuan']); 
    $harga = $conn->real_escape_string($_POST['harga']); 
    $stok = $conn->real_escape_string($_POST['stok']); 

    $sql = "UPDATE barang 
            SET nama_barang = '$nama', 
                satuan = '$satuan', 
                harga = '$harga', 
                stok = '$stok' 
            WHERE kode_barang = '$kode'";

    if ($conn->query($sql) === TRUE) { 
        header("Location: barang_list.php"); 
        exit(); 
    } else { 
        echo "Error: " . $sql . "<br>" . $conn->error; 
    } 
} 
?>
