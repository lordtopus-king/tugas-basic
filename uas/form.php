<?php include 'koneksi.php'; ?>

<?php
$err = "";
$first = $last = $email = $phone = $subject = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first   = $_POST['first'];
    $last    = $_POST['last'];
    $email   = $_POST['email'];
    $phone   = $_POST['phone'];
    $subject = $_POST['subject'] ?? '';
    $message = $_POST['message'];
    $date    = date("Y-m-d");

    if ($first && $last && $email && $phone && $subject && $message) {
        $conn->query("INSERT INTO data (first_name, last_name, email, phone, subject, message, tanggal)
                      VALUES ('$first', '$last', '$email', '$phone', '$subject', '$message', '$date')");
        header("Location: data.php");
    } else {
        $err = "Semua field harus diisi!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>UAS</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="page">
        <img src="data:image/png;base64,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" alt="Unimal" class="logo-kiri">
    <h2>230170188</h2>
    <?php if ($err) echo "<p style='color:red;'>$err</p>"; ?>
    <form method="POST">
    <!-- Dua kolom untuk nama dan kontak -->
   <div class="flex-row">
    <div class="flex-column">
        <label for="first">First Name:</label>
        <input type="text" id="first" name="first"
            value="<?= htmlspecialchars($first) ?>"
            class="<?= empty($first) && $_SERVER['REQUEST_METHOD'] == 'POST' ? 'error-border' : '' ?>" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email"
            value="<?= htmlspecialchars($email) ?>"
            class="<?= empty($email) && $_SERVER['REQUEST_METHOD'] == 'POST' ? 'error-border' : '' ?>" required>
    </div>

    <div class="flex-column">
        <label for="last">Last Name:</label>
        <input type="text" id="last" name="last"
            value="<?= htmlspecialchars($last) ?>"
            class="<?= empty($last) && $_SERVER['REQUEST_METHOD'] == 'POST' ? 'error-border' : '' ?>" required>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone"
            value="<?= htmlspecialchars($phone) ?>"
            class="<?= empty($phone) && $_SERVER['REQUEST_METHOD'] == 'POST' ? 'error-border' : '' ?>" required>
    </div>
</div>

    <!-- Radio Button + Message dalam satu baris -->
<div class="flex-row-subject">
    <div class="subject-group">
        <p>Subject:</p>
        <label><input type="radio" name="subject" value="Project Enquiry" <?= $subject == "Project Enquiry" ? "checked" : "" ?>> Project Enquiry</label><br>
        <label><input type="radio" name="subject" value="Feedback" <?= $subject == "Feedback" ? "checked" : "" ?>> Feedback</label><br>
        <label><input type="radio" name="subject" value="Others" <?= $subject == "Others" ? "checked" : "" ?>> Others</label>
    </div>

    <div class="message-group">
        <p>Message:</p>
        <textarea name="message"
            class="<?= empty($message) && $_SERVER['REQUEST_METHOD'] == 'POST' ? 'error-border' : '' ?>"
            required><?= htmlspecialchars($message) ?></textarea>

    <button type="submit">Send</button>
</form>

</div>
</body>
</html>

