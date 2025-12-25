<?php
session_start();
include "db.php";

$regno = $_SESSION['regno'];

$q = mysqli_query($conn, "
SELECT students.name, results.course, results.marks
FROM results
JOIN students ON students.id = results.student_id
WHERE students.regno='$regno'
");
?>

<h2>Your Results</h2>
<link rel="stylesheet" href="style.css">

<table border="1" cellpadding="10">
<tr>
<th>Course</th>
<th>Marks</th>
</tr>

<?php while ($r = mysqli_fetch_assoc($q)) { ?>
<tr>
<td><?= $r['course'] ?></td>
<td><?= $r['marks'] ?></td>
</tr>
<?php } ?>
</table>
<br>
<button onclick="window.print()">Print Results</button>

