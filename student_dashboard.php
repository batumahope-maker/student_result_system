<?php
session_start();
if(!isset($_SESSION['student_id'])){
    header("Location: student_login.php");
    exit;
}
echo "<h2>Welcome, ".$_SESSION['student_name']."</h2>";
echo "<p>Here you can view your results.</p>";

// Example: Fetch and display results
include 'db_connection.php';
$student_id = $_SESSION['student_id'];
$query = "SELECT * FROM results WHERE student_id='$student_id'";
$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($result)){
    echo "Subject: ".$row['subject']." - Score: ".$row['score']."<br>";
}
?>
