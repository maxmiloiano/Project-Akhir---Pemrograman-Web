<?php
session_start();
if(!isset($_SESSION['login_user'])){
    header("location: login.php");
    die();
}
include('../config/database.php');

$search_query = "";
if (isset($_POST['search'])) {
    $search_query = $_POST['search_query'];
    $sql = "SELECT * FROM item WHERE nama LIKE '%$search_query%' OR kodeitem LIKE '%$search_query%'";
} else {
    $sql = "SELECT * FROM item";
}
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Item</title>
</head>
<body>
    <h2>Search Item</h2>
    <form action="" method="post">
        <input type="text" name="search_query" value="<?php echo htmlspecialchars($search_query); ?>" placeholder="Search by name or code">
        <input type="submit" name="search" value="Search">
    </form>
    <a href="item.php">Back to Item</a>
    <table>
        <tr>
            <th>Kode Item</th>
            <th>Nama</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Stok</th>
            <th>Satuan</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["kodeitem"] . "</td>";
                echo "<td>" . $row["nama"] . "</td>";
                echo "<td>" . $row["hargabeli"] . "</td>";
                echo "<td>" . $row["hargajual"] . "</td>";
                echo "<td>" . $row["stok"] . "</td>";
                echo "<td>" . $row["satuan"] . "</td>";
                echo "<td><a href='edit_item.php?id=" . $row["id"] . "'>Edit</a> | <a href='delete_item.php?id=" . $row["id"] . "'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No results found</td></tr>";
        }
        ?>
    </table>
</body>
</html>
