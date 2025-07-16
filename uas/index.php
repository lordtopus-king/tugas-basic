<?php include 'koneksi.php'; ?>

<?php
$err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first  = $_POST['first'];
    $last   = $_POST['last'];
    $email  = $_POST['email'];
    $phone  = $_POST['phone'];
    $subject= $_POST['subject'] ?? '';
    $message= $_POST['message'];
    $date   = date("Y-m-d");

    if ($first && $last && $email && $phone && $subject && $message) {
        $conn->query("INSERT INTO data (first_name, last_name, email, phone, subject, message, tanggal)
                      VALUES ('$first', '$last', '$email', '$phone', '$subject', '$message', '$date')");
        header("Location: index.php");
    } else {
        $err = "Semua field harus diisi!";
    }
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $conn->query("DELETE FROM data WHERE id=$id");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>UAS</title>
    <style>
        input, textarea { width: 300px; margin: 5px 0; }
        .error { border: 1px solid red; }
        table { border-collapse: collapse; width: 80%; margin-top: 30px; }
        th, td { border: 1px solid black; padding: 10px; text-align: left; }
    </style>
</head>
<body>
<h2>Form Input</h2>
<?php if ($err) echo "<p style='color:red;'>$err</p>"; ?>
<form method="POST">
    <input type="text" name="first" placeholder="First Name" required><br>
    <input type="text" name="last" placeholder="Last Name" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="text" name="phone" placeholder="Phone" required><br>

    <p>Subject:</p>
    <label><input type="radio" name="subject" value="Project Enquiry"> Project Enquiry</label><br>
    <label><input type="radio" name="subject" value="Feedback"> Feedback</label><br>
    <label><input type="radio" name="subject" value="Others"> Others</label><br><br>

    <textarea name="message" placeholder="Message" required></textarea><br>

    <button type="submit">Send</button>
</form>

<hr>

<h2>Daftar Data</h2>
<table>
    <tr>
        <th>Nama</th>
        <th>Tanggal</th>
        <th>Aksi</th>
    </tr>
    <?php
    $res = $conn->query("SELECT * FROM data");
    while ($row = $res->fetch_assoc()) {
        echo "<tr>
            <td>{$row['first_name']} {$row['last_name']}</td>
            <td>{$row['tanggal']}</td>
            <td>
                <a href='edit.php?id={$row['id']}'>Edit</a> |
                <a href='?hapus={$row['id']}' onclick=\"return confirm('Yakin hapus?')\">Hapus</a>
            </td>
        </tr>";
    }
    ?>
</table>
</body>
</html>
