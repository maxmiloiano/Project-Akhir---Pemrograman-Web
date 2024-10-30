<?php
session_start();
if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
    die();
}
include('../config/database.php');

// Query untuk mendapatkan data dari tabel item
$sql = "SELECT * FROM item";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Item</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
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
        <h2>Item</h2>
        <a href="add_item.php">Add Item</a>
        <form method="get" action="search.php">
            <input type="hidden" name="type" value="item">
            <input type="text" name="query" placeholder="Search...">
            <input type="submit" value="Search">
        </form>
        <a href="generate_pdf_item.php">Generate PDF</a>
        <table>
            <thead>
                <tr>
                    <th>Kode Item</th>
                    <th>Nama</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Stok</th>
                    <th>Satuan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row["kodeitem"]); ?></td>
                    <td><?php echo htmlspecialchars($row["nama"]); ?></td>
                    <td><?php echo htmlspecialchars($row["hargabeli"]); ?></td>
                    <td><?php echo htmlspecialchars($row["hargajual"]); ?></td>
                    <td><?php echo htmlspecialchars($row["stok"]); ?></td>
                    <td><?php echo htmlspecialchars($row["satuan"]); ?></td>
                    <td>
                        <a href="edit_item.php?kodeitem=<?php echo htmlspecialchars($row['kodeitem']); ?>">Edit</a> |
                        <a href="delete_item.php?kodeitem=<?php echo htmlspecialchars($row['kodeitem']); ?>">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
