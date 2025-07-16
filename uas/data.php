<?php include 'koneksi.php'; ?>

<?php
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $conn->query("DELETE FROM data WHERE id=$id");
    header("Location: data.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="page">
    <h2>DATA</h2>
    <a href="form.php" class="link-top">+ Tambah Data</a>

    <table>
        <tr>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
        <?php
        $res = $conn->query("SELECT * FROM data ORDER BY id DESC");
        while ($row = $res->fetch_assoc()) {
            echo "<tr>
                <td>{$row['first_name']} {$row['last_name']}</td>
                <td>{$row['tanggal']}</td>
                <td>
                    <a href='edit.php?id={$row['id']}'>Edit</a> |
                    <a href='data.php?hapus={$row['id']}' onclick=\"return confirm('Yakin hapus?')\">Hapus</a>
                </td>
            </tr>";
        }
        ?>
    </table>
</div>
</body>
</html>

