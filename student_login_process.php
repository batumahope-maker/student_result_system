<?php
session_start();
include 'db_connection.php'; // your database connection file

$reg = $_POST['registration_number'];
$pass = $_POST['password'];

// Check if student exists
$query = "SELECT * FROM students WHERE registration_number='$reg'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if($row && password_verify($pass, $row['password'])) {
    $_SESSION['student_id'] = $row['id']; // store student id in session
    $_SESSION['student_name'] = $row['name'];
    header("Location: student_dashboard.php");
    exit;
} else {
    echo "Invalid registration number or password!";
}
?>
