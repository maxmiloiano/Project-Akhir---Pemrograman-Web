<?php
session_start();
if(!isset($_SESSION['login_user'])){
    header("location: login.php");
    die();
}
include('../config/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kodeitem = $_POST['kodeitem'];
    $nama = $_POST['nama'];
    $hargabeli = $_POST['hargabeli'];
    $hargajual = $_POST['hargajual'];
    $stok = $_POST['stok'];
    $satuan = $_POST['satuan'];

    $sql = "INSERT INTO item (kodeitem, nama, hargabeli, hargajual, stok, satuan) VALUES ('$kodeitem', '$nama', '$hargabeli', '$hargajual', '$stok', '$satuan')";

    if ($conn->query($sql) === TRUE) {
        header("location: item.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Item</title>
</head>
<body>
    <h2>Add Item</h2>
    <form action="" method="post">
        <label>Kode Item:</label>
        <input type="text" name="kodeitem" required><br>
        <label>Nama:</label>
        <input type="text" name="nama" required><br>
        <label>Harga Beli:</label>
        <input type="text" name="hargabeli" required><br>
        <label>Harga Jual:</label>
        <input type="text" name="hargajual" required><br>
        <label>Stok:</label>
        <input type="text" name="stok" required><br>
        <label>Satuan:</label>
        <input type="text" name="satuan" required><br>
        <input type="submit" value="Add Item">
    </form>
</body>
</html>
