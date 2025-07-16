<?php include 'koneksi.php'; ?>
<?php
$id = $_GET['id'];
$data = $conn->query("SELECT * FROM data WHERE id=$id")->fetch_assoc();

if (isset($_POST['update'])) {
    $first  = $_POST['first'];
    $last   = $_POST['last'];
    $email  = $_POST['email'];
    $phone  = $_POST['phone'];
    $subject= $_POST['subject'];
    $message= $_POST['message'];

    $conn->query("UPDATE data SET 
        first_name='$first', last_name='$last', email='$email', 
        phone='$phone', subject='$subject', message='$message' 
        WHERE id=$id");

    header("Location: data.php");
}
?>

<h2>Edit Data</h2>
<form method="POST">
    <input type="text" name="first" value="<?= $data['first_name'] ?>"><br>
    <input type="text" name="last" value="<?= $data['last_name'] ?>"><br>
    <input type="email" name="email" value="<?= $data['email'] ?>"><br>
    <input type="text" name="phone" value="<?= $data['phone'] ?>"><br>

    <p>Subject:</p>
    <label><input type="radio" name="subject" value="Project Enquiry" <?= $data['subject']=='Project Enquiry'?'checked':'' ?>> Project Enquiry</label><br>
    <label><input type="radio" name="subject" value="Feedback" <?= $data['subject']=='Feedback'?'checked':'' ?>> Feedback</label><br>
    <label><input type="radio" name="subject" value="Others" <?= $data['subject']=='Others'?'checked':'' ?>> Others</label><br><br>

    <textarea name="message"><?= $data['message'] ?></textarea><br>

    <button type="submit" name="update">Update</button>
</form>
