<?php
session_start();
if(!isset($_SESSION['login_user'])){
    header("location: login.php");
    die();
}
include('../config/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $koderekening = $_POST['koderekening'];
    $namarekening = $_POST['namarekening'];
    $saldo = $_POST['saldo'];

    $sql = "INSERT INTO rekening (koderekening, namarekening, saldo) VALUES ('$koderekening', '$namarekening', '$saldo')";

    if ($conn->query($sql) === TRUE) {
        header("location: rekening.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Rekening</title>
</head>
<body>
    <h2>Add Rekening</h2>
    <form action="" method="post">
        <label>Kode Rekening:</label>
        <input type="text" name="koderekening" required><br>
        <label>Nama Rekening:</label>
        <input type="text" name="namarekening" required><br>
        <label>Saldo:</label>
        <input type="text" name="saldo" required><br>
        <input type="submit" value="Add Rekening">
    </form>
</body>
</html>
