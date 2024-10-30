<?php
session_start();
if(!isset($_SESSION['login_user'])){
    header("location: login.php");
    die();
}
include('../config/database.php');

$id = $_GET['id'];
$sql = "DELETE FROM rekening WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    header("location: rekening.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
