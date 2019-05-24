<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php

$q = $_GET['q'];


$con = mysqli_connect('localhost','root','','course');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$result = mysqli_query($con,"SELECT * FROM teacher WHERE CID = '".$q."'") or die(mysqli_error($con));



echo "<table>
<tr>

<th>Week</th>
<th>WeekID</th>
<th>LectureName</th>
<th>TuteName</th>
<th>LabName</th>
<th>Assignment</th>
<th>Notice</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['Week'] . "</td>";
    echo "<td>" . $row['SID'] . "</td>";
    echo "<td>" . $row['LecName'] . "</td>";
    echo "<td>" . $row['TuteName'] . "</td>";
    echo "<td>" . $row['LabName'] . "</td>";
     echo "<td>" . $row['AssignmentName'] . "</td>";
    echo "<td>" . $row['Notices'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>