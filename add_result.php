<?php
include "db.php";

if (isset($_POST['save'])) {
    $student_id = $_POST['student_id'];
    $course = $_POST['course'];
    $marks = $_POST['marks'];

    mysqli_query($conn, "INSERT INTO results (student_id, course, marks)
    VALUES ('$student_id', '$course', '$marks')");

    echo "Result added successfully";
}

$students = mysqli_query($conn, "SELECT * FROM students");
?>

<h2>Add Result</h2>
<link rel="stylesheet" href="style.css">

<form method="POST">
    Student:
    <select name="student_id">
        <?php while ($row = mysqli_fetch_assoc($students)) { ?>
            <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
        <?php } ?>
    </select><br><br>

    Course: <br>
    <input type="text" name="course" required><br><br>

    Marks: <br>
    <input type="number" name="marks" required><br><br>

    <button name="save">Save Result</button>
</form>

<a href="dashboard.php">Back</a>
