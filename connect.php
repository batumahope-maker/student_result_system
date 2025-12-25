<?php
session_start();
include "db_connection.php";

$reg = $_POST['registration_number'];
$pass = $_POST['password'];

$query = "SELECT * FROM students WHERE registration_number='$reg'";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);

    if (password_verify($pass, $row['password'])) {
        $_SESSION['student_id'] = $row['id'];
        $_SESSION['student_name'] = $row['name'];
        header("Location: student_dashboard.php");
        exit;
    } else {
        echo "Wrong password";
    }
} else {
    echo "Student not found";
}
?>
