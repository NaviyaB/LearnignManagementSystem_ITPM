<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "course";
$columnname = "CName";
$columid = "CID";
$week = "";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM admin";
$result = mysqli_query($conn, $sql);

if(isset($_POST['lecture'])){
  $wid = $_POST['weekid'];
  $str = " ";
  $sqla = "UPDATE teacher SET `LecName`='$str' WHERE `SID` = '$wid'" ;
  $sqlh = "Select `LecName` FROM teacher WHERE `SID` = '$wid' ";
  $e = mysqli_query($conn,$sqlh);
  $r = mysqli_fetch_array($e);
  $fname = $r['LecName'];
  $path = 'myfile/'.$fname;
  //echo $path;exit;
  //print_r($r);exit;
  unlink($path);
  //echo $sqlh;exit;
  
 // mysql_select_db('course');
  $retvale = mysqli_query($conn, $sqla);
            
   if(! $retvale ) {
       die('Could not delete data: ' . mysql_error());
    }
            
   echo "Deleted data successfully\n";

}

if(isset($_POST['tute'])){
  $wid = $_POST['weekid'];
  $stra = " ";
  $sqlb = "UPDATE teacher SET `TuteName`='$stra' WHERE `SID` = '$wid'" ;
  //echo $sqla;exit;

  $sqlh = "Select `TuteName` FROM teacher WHERE `SID` = '$wid' ";
  $e = mysqli_query($conn,$sqlh);
  $r = mysqli_fetch_array($e);
  $fname = $r['TuteName'];
  $path = 'myfile/'.$fname;
  unlink($path);
  
 // mysql_select_db('course');
  $retvalea = mysqli_query($conn, $sqlb);
            
   if(! $retvalea ) {
       die('Could not delete data: ' . mysql_error());
    }
            
   echo "Deleted data successfully\n";

}

if(isset($_POST['lab'])){
  $wid = $_POST['weekid'];
  $strb = " ";
  $sqlc = "UPDATE teacher SET `LabName`='$strb' WHERE `SID` = '$wid'" ;
  //echo $sqla;exit;
  $sqlh = "Select `LabName` FROM teacher WHERE `SID` = '$wid' ";
  $e = mysqli_query($conn,$sqlh);
  $r = mysqli_fetch_array($e);
  $fname = $r['LabName'];
  $path = 'myfile/'.$fname;
  unlink($path);

  
 // mysql_select_db('course');
  $retvaleb = mysqli_query($conn, $sqlc);
            
   if(! $retvaleb ) {
       die('Could not delete data: ' . mysql_error());
    }
            
   echo "Deleted data successfully\n";

}

if(isset($_POST['assignement'])){
  $wid = $_POST['weekid'];
  $strb = " ";
  $sqlc = "UPDATE teacher SET `AssignmentName`='$strb' WHERE `SID` = '$wid'" ;
  //echo $sqla;exit;
  $sqlh = "Select `AssignmentName` FROM teacher WHERE `SID` = '$wid' ";
  $e = mysqli_query($conn,$sqlh);
  $r = mysqli_fetch_array($e);
  $fname = $r['AssignmentName'];
  $path = 'myfile/'.$fname;
  unlink($path);

  
 // mysql_select_db('course');
  $retvaleb = mysqli_query($conn, $sqlc);
            
   if(! $retvaleb ) {
       die('Could not delete data: ' . mysql_error());
    }
            
   echo "Deleted data successfully\n";

}

if(isset($_POST['notice'])){
  $wid = $_POST['weekid'];
  $strb = " ";
  $sqlc = "UPDATE teacher SET `Notices`='$strb' WHERE `SID` = '$wid'" ;
  //echo $sqlc;exit;
  

  
 // mysql_select_db('course');
  $retvaleb = mysqli_query($conn, $sqlc);
            
   if(! $retvaleb ) {
       die('Could not delete data: ' . mysql_error());
    }
            
   echo "Deleted data successfully\n";

}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
</head>
<body>

	<?php
  	session_start();
  	$koneksi = mysqli_connect('localhost', 'root', '', 'course');

  	global $sname;
    global $sid;

  	?>

  	<FORM >
		<br><select name="users" id="users" class="form-control">
			<option>Select Course</option>
        	<?php  

      			if($result)
      			{
        			while ($row=mysqli_fetch_array($result)) {
                	$cname = $row["$columnname"];
          				$cid = $row["$columid"];
           				echo "<option value=".$cid.">$cname<br></option>";
        			}
      			}
    		?>
  		</select><br>
	</FORM>

	<div id="txtHint"><b>Show Details about the course...</b></div><br><br>





  <div class="panel panel-primary">
  <div class="panel-heading"align="center">File Delete</div>
  <div class="panel-body">

  <FORM method = "post" action = "<?php $_PHP_SELF ?>" >

  <label>Please Enter Your week ID</label>
  <input type="text" name="weekid"  class="form-control" required><br><br>

  <input name="lecture" type="submit"  value="Remove Lecture" id="lecture"class="form-control"style="background-color:black; color:white; "><br>
  <input name="tute" type="submit"  value="Remove Tute" id="tute"class="form-control"style="background-color:black; color:white; "><br>
  <input name="lab" type="submit"  value="Remove Lab" id="lab"class="form-control"style="background-color:black; color:white; "><br>
  <input name="assignement" type="submit"  value="Remove Assignement" id="assignement"class="form-control"style="background-color:black; color:white; "><br>
  <input name="notice" type="submit"  value="Remove Notice" id="notice"class="form-control"style="background-color:black; color:white; ">
  </FORM>
  </div>
  </div>
  </div>






<script type="text/javascript">
  $('#users').on('change',function(){
    var value = $('#users').val();
    //showUser(value);
    $.ajax({
      url:'AJAX2.php',
      type:'get',
      data:{'q':value},
      success:function(response){
        //document.getElementById("txtHint").innerHTML = response;
        $('#txtHint').empty();
        $('#txtHint').append(response);
      },
      error:function(error){
          console.log(error.responseText);
      }
     });
  });
</script>



<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","AJAX2.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
</body>
</html>