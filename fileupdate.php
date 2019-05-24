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

  $sqla = "DELETE FROM teacher WHERE SID = $wid" ;
 
  
 // mysql_select_db('course');
  $retvale = mysqli_query($conn, $sqla);
            
   if(! $retvale ) {
       die('Could not delete data: ' . mysql_error());
    }
            
   echo "Deleted data successfully\n";

}


?>



<!DOCTYPE html>
<html>
<head>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>


  	<FORM >
		<br><select name="users" id="users" class="form-control" >
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
	<div class="panel-heading">File Update</div>
	<div class="panel-body">

	<FORM name="form1" method="post" action="PageMultiUpdateToMySQL2.php" enctype="multipart/form-data">
	<label>Pleace Enter Your week ID</label>
 	 <input type="text" name="weekid"  class="form-control" required><br><br>
	<label>Lecture</label>
	<input type="file" name="filUpload[]" class="form-control" ><br>
	<input name="lec" type="submit" value="lec" class="form-control" style="background-color:black; color:white; ">
	<br>
	
	<label>Tute</label>
	<input type="file" name="filUpload[]" class="form-control"><br>
	<input name="tute" type="submit" value="tute" class="form-control" style="background-color:black; color:white; ">
	<br>
	
	<label>Lab</label>
	<input type="file" name="filUpload[]" class="form-control"><br>
	<input name="lab" type="submit" value="lab" class="form-control" style="background-color:black; color:white; ">
	
	<br>

  <label>Assigment</label>
  <input type="file" name="filUpload[]" class="form-control"><br>
  <input name="assign" type="submit" value="assign" class="form-control" style="background-color:black; color:white; ">
  
  <br>

  <label>Notice</label><br>
  <textarea rows="4" cols="50" name="noticedeta" class="form-control"></textarea><br>
  <input name="notice" type="submit" value="notice" class="form-control" style="background-color:black; color:white; ">
  
  <br>

	
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