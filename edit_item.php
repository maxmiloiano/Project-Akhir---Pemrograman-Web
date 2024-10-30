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

    $sql = "UPDATE item SET nama='$nama', hargabeli='$hargabeli', hargajual='$hargajual', stok='$stok', satuan='$satuan' WHERE kodeitem='$kodeitem'";

    if ($conn->query($sql) === TRUE) {
        header("location: item.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $kodeitem = $_GET['kodeitem'];
    $sql = "SELECT * FROM item WHERE kodeitem='$kodeitem'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Item not found";
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Item</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="sidebar">
        <a href="dashboard.php">Home</a>
        <div class="dropdown">
            <button class="dropbtn">Master</button>
            <div class="dropdown-content">
                <a href="item.php">Item</a>
                <a href="pelanggan.php">Pelanggan</a>
                <a href="pemasok.php">Pemasok</a>
                <a href="rekening.php">Rekening</a>
                <a href="setting.php">Setting</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </div>
    <div class="main-content">
        <h2>Edit Item</h2>
        <form action="" method="post">
            <input type="hidden" name="kodeitem" value="<?php echo htmlspecialchars($row['kodeitem']); ?>">
            <label>Nama:</label>
            <input type="text" name="nama" value="<?php echo htmlspecialchars($row['nama']); ?>" required><br>
            <label>Harga Beli:</label>
            <input type="text" name="hargabeli" value="<?php echo htmlspecialchars($row['hargabeli']); ?>" required><br>
            <label>Harga Jual:</label>
            <input type="text" name="hargajual" value="<?php echo htmlspecialchars($row['hargajual']); ?>" required><br>
            <label>Stok:</label>
            <input type="text" name="stok" value="<?php echo htmlspecialchars($row['stok']); ?>" required><br>
            <label>Satuan:</label>
            <input type="text" name="satuan" value="<?php echo htmlspecialchars($row['satuan']); ?>" required><br>
            <input type="submit" value="Update Item">
        </form>
    </div>
</body>
</html>
