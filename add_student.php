<?php
session_start();
include "db.php";

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $regno = $_POST['regno'];

    mysqli_query($conn, "INSERT INTO students (name, regno) VALUES ('$name', '$regno')");
    echo "Student added successfully";
}
?>

<h2>Add Student</h2>
<link rel="stylesheet" href="style.css">

<form method="POST">
    Name: <br>
    <input type="text" name="name" required><br><br>

    Registration Number: <br>
    <input type="text" name="regno" required><br><br>

    <button name="add">Add Student</button>
</form>

<a href="dashboard.php">Back to Dashboard</a>
