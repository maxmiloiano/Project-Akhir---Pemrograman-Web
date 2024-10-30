<?php
session_start();
if(!isset($_SESSION['login_user'])){
    header("location: login.php");
    die();
}
include('../config/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kodepemasok = $_POST['kodepemasok'];
    $namapemasok = $_POST['namapemasok'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];

    $sql = "INSERT INTO pemasok (kodepemasok, namapemasok, alamat, kota, telepon, email) VALUES ('$kodepemasok', '$namapemasok', '$alamat', '$kota', '$telepon', '$email')";

    if ($conn->query($sql) === TRUE) {
        header("location: pemasok.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Pemasok</title>
</head>
<body>
    <h2>Add Pemasok</h2>
    <form action="" method="post">
        <label>Kode Pemasok:</label>
        <input type="text" name="kodepemasok" required><br>
        <label>Nama Pemasok:</label>
        <input type="text" name="namapemasok" required><br>
        <label>Alamat:</label>
        <input type="text" name="alamat" required><br>
        <label>Kota:</label>
        <input type="text" name="kota" required><br>
        <label>Telepon:</label>
        <input type="text" name="telepon" required><br>
        <label>Email:</label>
        <input type="email" name="email" required><br>
        <input type="submit" value="Add Pemasok">
    </form>
</body>
</html>
