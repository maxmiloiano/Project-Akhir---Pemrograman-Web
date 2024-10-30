<?php
session_start();
if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
    die();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $company_name = $_POST['company_name'];
    $company_address = $_POST['company_address'];
    $company_phone = $_POST['company_phone'];
    $company_email = $_POST['company_email'];
    $currency = $_POST['currency'];

    // Update settings in the configuration file
    $settings = [
        'company_name' => $company_name,
        'company_address' => $company_address,
        'company_phone' => $company_phone,
        'company_email' => $company_email,
        'currency' => $currency,
    ];

    file_put_contents('../config/settings.php', '<?php return ' . var_export($settings, true) . ';');

    $success = "Pengaturan berhasil diperbarui!";
}

// Load current settings
$settings = include('../config/settings.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Setting</title>
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
        <h2>Setting</h2>
        <form action="" method="post">
            <label>Company Name:</label>
            <input type="text" name="company_name" value="<?php echo htmlspecialchars($settings['company_name']); ?>" required><br>
            <label>Address:</label>
            <input type="text" name="company_address" value="<?php echo htmlspecialchars($settings['company_address']); ?>" required><br>
            <label>Phone:</label>
            <input type="text" name="company_phone" value="<?php echo htmlspecialchars($settings['company_phone']); ?>" required><br>
            <label>Email:</label>
            <input type="email" name="company_email" value="<?php echo htmlspecialchars($settings['company_email']); ?>" required><br>
            <label>Currency:</label>
            <input type="text" name="currency" value="<?php echo htmlspecialchars($settings['currency']); ?>" required><br>
            <input type="submit" value="Save Changes">
            <?php
            if (isset($success)) {
                echo "<p style='color:green;'>$success</p>";
            }
            ?>
        </form>
    </div>
</body>
</html>
