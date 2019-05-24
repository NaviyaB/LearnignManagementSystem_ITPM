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
$result = mysqli_query($con,"SELECT * FROM article WHERE Content = '".$q."'") or die(mysqli_error($con));


echo "<table>
<tr>
<th>Artical ID</th>
<th>Course Name</th>
<th>Content</th>
<th>Student Name</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['Ar_id'] . "</td>";
    echo "<td>" . $row['CName'] . "</td>";
    echo "<td>" . $row['Content'] . "</td>";
    echo "<td>" . $row['St_name'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>