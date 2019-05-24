<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "course";
$columnname = "CName";
$columid = "Ar_id";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
<?php
if(isset($_POST['btnSubmit'])) {

            $strSQL ="UPDATE article SET CName='{$_POST['article']}' WHERE Ar_id='{$_POST['AID']}'";

	
	       if (mysqli_query($conn,$strSQL)){
             echo "File uploaded successfully";
           }

           else{
           	echo "File not upload";
           }
 }

?>
</body>
</html>