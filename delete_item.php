<?php
session_start();
if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
    die();
}
include('../config/database.php');

// Ambil kodeitem dari URL
$kodeitem = $_GET['kodeitem'];

// Hapus item dari database
$sql = "DELETE FROM item WHERE kodeitem = '$kodeitem'";
if ($conn->query($sql)) {
    header("location: item.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
