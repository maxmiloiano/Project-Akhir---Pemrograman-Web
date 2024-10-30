<?php
session_start();
if(!isset($_SESSION['login_user'])){
    header("location: login.php");
    die();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/styles.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
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
        <h2>Welcome to PT Jaya Dashboard</h2>
    </div>
</body>
</html>
