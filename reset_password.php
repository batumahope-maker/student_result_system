<?php
include "db.php"; // your database connection

$registration_number = "admin"; // student to update
$new_password = "1234"; // new plain password

// generate hash safely
$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

// update in database
$sql = "UPDATE students SET password=? WHERE registration_number=?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ss", $hashed_password, $registration_number);

if(mysqli_stmt_execute($stmt)){
    echo "Password updated successfully!";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
