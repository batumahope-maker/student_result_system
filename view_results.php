<?php
include "db.php";

$results = mysqli_query($conn, "
SELECT students.name, students.regno, results.course, results.marks
FROM results
JOIN students ON students.id = results.student_id
");
?>

<h2>Student Results</h2>
<link rel="stylesheet" href="style.css">

<table border="1" cellpadding="10">
<tr>
    <th>Name</th>
    <th>Reg No</th>
    <th>Course</th>
    <th>Marks</th>
</tr>
<th>Grade</th>
<td>
<?php
$m = $row['marks'];
if ($m >= 80) echo "A";
elseif ($m >= 70) echo "B";
elseif ($m >= 60) echo "C";
elseif ($m >= 50) echo "D";
else echo "F";
?>
</td>


<?php while ($row = mysqli_fetch_assoc($results)) { ?>
<tr>
    <td><?= $row['name'] ?></td>
    <td><?= $row['regno'] ?></td>
    <td><?= $row['course'] ?></td>
    <td><?= $row['marks'] ?></td>
</tr>
<?php } ?>
</table>

<a href="dashboard.php">Back</a>
