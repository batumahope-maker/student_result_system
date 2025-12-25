<!DOCTYPE html>
<html>
<head>
    <title>Student Login</title>
</head>
<body>

<h2>Student Login</h2>

<form method="POST" action="student_login.php">
    <label>Registration Number</label><br>
    <input type="text" name="registration_number" required><br><br>

    <label>Password</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit" name="login">Login</button>
</form>

<?php
session_start();
include "db.php";

if (isset($_POST['login'])) {

    $reg = $_POST['registration_number'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM students WHERE registration_number = '$reg'";
    $result = mysqli_query($conn, $sql);

    if ($result === false) {
        die("Database error: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_assoc($result);

        if (password_verify($pass, $row['password'])) {
            $_SESSION['student_id'] = $row['id'];
            $_SESSION['student_name'] = $row['name'];
            header("Location: student_dashboard.php");
            exit;
        } else {
            echo "<p style='color:red'>Wrong password</p>";
        }

    } else {
        echo "<p style='color:red'>Student not found</p>";
    }
}
?>

</body>
</html>
