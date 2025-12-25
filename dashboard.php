<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Welcome Admin</h2>

<ul>
    <li>Add Student (coming next)</li>
    <li>Add Results (coming next)</li>
    <li><a href="logout.php">Logout</a></li>
</ul>

</body>
</html>
