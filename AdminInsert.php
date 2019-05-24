<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "course";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if(isset($_POST['Insert']))
{
 $CID = ($_POST['CID']);
 $CName = ($_POST['CName']);
 
 

$sql = "INSERT INTO admin (CID,CName)
VALUES ('$CID','$CName')";

if ($conn->query($sql) === TRUE) 
{
    echo "New record created successfully";
} 
else 
{
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}
?>

<html>
<head>

	 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<form method="post" action ="AdminInsert.php" id="contact-form" class="form-control">

<div class="panel panel-primary">
<div class="panel-heading">File Upload</div>
<div class="panel-body">
    
<div class="form-group">
<label>Course ID</label>
<input type="text" name="CID" placeholder="CID" class="form-control" required /><br>

<LABEL>Course Name</LABEL>
<input type="text" name="CName"  placeholder="CName" class="form-control" required /><br>

<input type="submit"  name="Insert" value="Insert"  class="form-control" style="background-color:black; color:white; " >

</div>
</div>
</div>
</div>
</form>

</body>

</html>

































