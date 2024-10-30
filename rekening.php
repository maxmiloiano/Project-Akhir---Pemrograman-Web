<?php
session_start();
if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
    die();
}
include('../config/database.php');

// Query untuk mendapatkan data dari tabel rekening
$sql = "SELECT * FROM rekening";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Rekening</title>
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
        <h2>Rekening</h2>
        <a href="add_rekening.php">Add Rekening</a>
        <form method="get" action="search.php">
            <input type="hidden" name="type" value="rekening">
            <input type="text" name="query" placeholder="Search...">
            <input type="submit" value="Search">
        </form>
        <a href="generate_pdf_rekening.php">Generate PDF</a>
        <table>
            <thead>
                <tr>
                    <th>Kode Rekening</th>
                    <th>Nama Rekening</th>
                    <th>Saldo</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row["koderekening"]); ?></td>
                    <td><?php echo htmlspecialchars($row["namarekening"]); ?></td>
                    <td><?php echo htmlspecialchars($row["saldo"]); ?></td>
                    <td>
                        <a href="edit_rekening.php?koderekening=<?php echo htmlspecialchars($row['koderekening']); ?>">Edit</a> |
                        <a href="delete_rekening.php?koderekening=<?php echo htmlspecialchars($row['koderekening']); ?>">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
