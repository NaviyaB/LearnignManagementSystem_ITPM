<?php  
if(isset($_GET['ID'])){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "course";
$coname ="CName";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$ID =mysqli_real_escape_string($conn, $_GET['ID']);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sqli = "SELECT * FROM `admin` WHERE `Index`='".$ID."' ";


$result= mysqli_query($conn,$sqli) or die("Bad Query: $sqli");
$row = mysqli_fetch_array($result);


$i =$row['CName'];
//echo $i;exit;

$sqla = "SELECT * FROM `teacher` WHERE `CName`='".$i."'";
//echo $sqla;exit;
$value= mysqli_query($conn,$sqla) or die("Bad Query: $sqla");


}
?>
<!DOCTYPE html>
<html>
<head>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<style>
		table {
    		width: 100%;
    		border-collapse: collapse;
		}

		table, td, th {
    		border: 0.5px solid grey;
    		padding: 10px;
		}

		th {text-align: left;}
	</style>

  <title></title>
</head>
<body>

 <form method="post"  id="cont-form" enctype="multipart/form-data">

<div class="panel panel-primary">
<div class="panel-heading">File Update</div>
<div class="panel-body">

<?php 

//$s = "Hello";
              
              if(mysqli_num_rows($value) > 0)
              {
              	//$res = "<div style='width:100px;height:100px;background-color:#ff9955;'>".$s."</div></body></html>";

              			//echo $res;exit;
              	
              	//print_r($r);
                 while ($r=mysqli_fetch_array($value)) {
                
                $i = $r['LecName'];
                $t = $r['TuteName'];
                $l = $r['LabName'];
                $a = $r['AssignmentName'];
                $n = $r['Notices'];
                echo"<table>";
                echo"<tr>";
                echo"<td>";
                echo"<label > Week </label>"; 

                echo $r['Week']; echo"<br>";
               	
               	echo"<label > Lecture: </label>"; 

               	echo "<a download = '$i' href = 'myfile/$i' readonly>" .$i. "</a>";echo"<br>" ;
                
                echo"<label > Tute: </label>";

                echo "<a download = '$t' href = 'myfile/$t'>" .$t. "</a>";echo"<br>";
                
                echo"<label > Lab: </label>"; 

                echo "<a download = '$l' href = 'myfile/$l'>" .$l. "</a>";echo"<br>";

                echo"<label > Assigment: </label>"; 

                echo "<a download = '$a' href = 'myfile/$a'>" .$a. "</a>";echo"<br>";

                echo"<label > Notice: </label>"; 

                echo $n; echo"<br>";



                echo"</td>";
                echo"</tr>";
                echo"</table>";
                
               	 }
                
              }else{
              	echo "no rec";
              }
?>

</div>
</div>
</div>
</form>
</body>
</html>