<?php
session_start();
if(!isset($_SESSION['login_user'])){
    header("location: login.php");
    die();
}
include('../config/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $kodepelanggan = $_POST['kodepelanggan'];
    $namapelanggan = $_POST['namapelanggan'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];

    $sql = "UPDATE pelanggan SET kodepelanggan='$kodepelanggan', namapelanggan='$namapelanggan', alamat='$alamat', kota='$kota', telepon='$telepon', email='$email' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("location: pelanggan.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM pelanggan WHERE id='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Pelanggan</title>
</head>
<body>
    <h2>Edit Pelanggan</h2>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label>Kode Pelanggan:</label>
        <input type="text" name="kodepelanggan" value="<?php echo $row['kodepelanggan']; ?>" required><br>
        <label>Nama Pelanggan:</label>
        <input type="text" name="namapelanggan" value="<?php echo $row['namapelanggan']; ?>" required><br>
        <label>Alamat:</label>
        <input type="text" name="alamat" value="<?php echo $row['alamat']; ?>" required><br>
        <label>Kota:</label>
        <input type="text" name="kota" value="<?php echo $row['kota']; ?>" required><br>
        <label>Telepon:</label>
        <input type="text" name="telepon" value="<?php echo $row['telepon']; ?>" required><br>
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br>
        <input type="submit" value="Update Pelanggan">
    </form>
</body>
</html>
