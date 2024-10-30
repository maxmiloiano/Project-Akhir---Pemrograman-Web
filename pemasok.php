<?php
session_start();
if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
    die();
}
include('../config/database.php');

// Query untuk mendapatkan data dari tabel pemasok
$sql = "SELECT * FROM pemasok";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pemasok</title>
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
        <h2>Pemasok</h2>
        <a href="add_pemasok.php">Add Pemasok</a>
        <form method="get" action="search.php">
            <input type="hidden" name="type" value="pemasok">
            <input type="text" name="query" placeholder="Search...">
            <input type="submit" value="Search">
        </form>
        <a href="generate_pdf_pemasok.php">Generate PDF</a>
        <table>
            <thead>
                <tr>
                    <th>Kode Pemasok</th>
                    <th>Nama Pemasok</th>
                    <th>Alamat</th>
                    <th>Kota</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row["kodepemasok"]); ?></td>
                    <td><?php echo htmlspecialchars($row["namapemasok"]); ?></td>
                    <td><?php echo htmlspecialchars($row["alamat"]); ?></td>
                    <td><?php echo htmlspecialchars($row["kota"]); ?></td>
                    <td><?php echo htmlspecialchars($row["telepon"]); ?></td>
                    <td><?php echo htmlspecialchars($row["email"]); ?></td>
                    <td>
                        <a href="edit_pemasok.php?kodepemasok=<?php echo htmlspecialchars($row['kodepemasok']); ?>">Edit</a> |
                        <a href="delete_pemasok.php?kodepemasok=<?php echo htmlspecialchars($row['kodepemasok']); ?>">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
