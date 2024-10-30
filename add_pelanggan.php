<?php
session_start();
if(!isset($_SESSION['login_user'])){
    header("location: login.php");
    die();
}
include('../config/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kodepelanggan = $_POST['kodepelanggan'];
    $namapelanggan = $_POST['namapelanggan'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];

    $sql = "INSERT INTO pelanggan (kodepelanggan, namapelanggan, alamat, kota, telepon, email) VALUES ('$kodepelanggan', '$namapelanggan', '$alamat', '$kota', '$telepon', '$email')";

    if ($conn->query($sql) === TRUE) {
        header("location: pelanggan.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Pelanggan</title>
</head>
<body>
    <h2>Add Pelanggan</h2>
    <form action="" method="post">
        <label>Kode Pelanggan:</label>
        <input type="text" name="kodepelanggan" required><br>
        <label>Nama Pelanggan:</label>
        <input type="text" name="namapelanggan" required><br>
        <label>Alamat:</label>
        <input type="text" name="alamat" required><br>
        <label>Kota:</label>
        <input type="text" name="kota" required><br>
        <label>Telepon:</label>
        <input type="text" name="telepon" required><br>
        <label>Email:</label>
        <input type="email" name="email" required><br>
        <input type="submit" value="Add Pelanggan">
    </form>
</body>
</html>
