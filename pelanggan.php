<?php
session_start();
if(!isset($_SESSION['login_user'])){
    header("location: login.php");
    die();
}
include('../config/database.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pelanggan</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/styles.css">
</head>
<body>
    <div class="sidebar">
        <a href="dashboard.php">Home</a>
        <div class="dropdown">
            <button class="dropbtn">Master 
                <i class="fa fa-caret-down"></i>
            </button>
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

    <div class="content">
        <h2>Pelanggan</h2>
        <a href="add_pelanggan.php">Add Pelanggan</a>
        <a href="search.php">Search</a>
        <a href="generate_pdf_pelanggan.php">Generate PDF</a>
        <table>
            <tr>
                <th>Kode Pelanggan</th>
                <th>Nama Pelanggan</th>
                <th>Alamat</th>
                <th>Kota</th>
                <th>Telepon</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            <?php
            $sql = "SELECT * FROM pelanggan";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["kodepelanggan"] . "</td>";
                    echo "<td>" . $row["namapelanggan"] . "</td>";
                    echo "<td>" . $row["alamat"] . "</td>";
                    echo "<td>" . $row["kota"] . "</td>";
                    echo "<td>" . $row["telepon"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td><a href='edit_pelanggan.php?id=" . $row["id"] . "'>Edit</a> | <a href='delete_pelanggan.php?id=" . $row["id"] . "'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "0 results";
            }
            ?>
        </table>
    </div>
</body>
</html>
