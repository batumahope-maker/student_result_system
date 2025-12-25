<?php
include "db.php"; // database connection

$registration_number = "admin";
$new_password = "1234"; // new plain password

$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

$sql = "UPDATE students SET password=? WHERE registration_number=?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ss", $hashed_password, $registration_number);

if(mysqli_stmt_execute($stmt)){
    echo "Password reset successfully!";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
