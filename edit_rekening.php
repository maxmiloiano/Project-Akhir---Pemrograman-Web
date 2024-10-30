<?php
session_start();
if(!isset($_SESSION['login_user'])){
    header("location: login.php");
    die();
}
include('../config/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $koderekening = $_POST['koderekening'];
    $namarekening = $_POST['namarekening'];
    $saldo = $_POST['saldo'];

    $sql = "UPDATE rekening SET koderekening='$koderekening', namarekening='$namarekening', saldo='$saldo' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("location: rekening.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM rekening WHERE id='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Rekening</title>
</head>
<body>
    <h2>Edit Rekening</h2>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label>Kode Rekening:</label>
        <input type="text" name="koderekening" value="<?php echo $row['koderekening']; ?>" required><br>
        <label>Nama Rekening:</label>
        <input type="text" name="namarekening" value="<?php echo $row['namarekening']; ?>" required><br>
        <label>Saldo:</label>
        <input type="text" name="saldo" value="<?php echo $row['saldo']; ?>" required><br>
        <input type="submit" value="Update Rekening">
    </form>
</body>
</html>
