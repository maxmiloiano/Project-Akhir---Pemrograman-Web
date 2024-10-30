<?php
session_start();
include('../config/auth.php'); // Include file konfigurasi

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cek username dan password
    if ($username === USERNAME && $password === PASSWORD) {
        $_SESSION['login_user'] = $username;
        header("location: dashboard.php");
    } else {
        $error = "Username atau Password salah.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="" method="post">
        <label>Username:</label>
        <input type="text" name="username" required><br>
        <label>Password:</label>
        <input type="password" name="password" required><br>
        <input type="submit" value="Login">
        <?php
        if (isset($error)) {
            echo "<p style='color:red;'>$error</p>";
        }
        ?>
    </form>
</body>
</html>
