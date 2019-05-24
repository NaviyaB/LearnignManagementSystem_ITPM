<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "course";
$columnname = "CName";
$columid = "CID";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM admin";
$result = mysqli_query($conn, $sql);
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Upload</title>
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
<!-- JQuery -->
<script type='text/javascript'>
$(document).ready(function(){
$('#softwares').val($('#selectdata option:selected').data('softwares'));
$(function(){
    $('#selectdata').change(function(){
        $('#softwares').val($('#selectdata option:selected').data('softwares'));
    });
});
});
</script>


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

  	<FORM name="form1" method="post" action="PageMultiUploadToMySQL2.php" enctype="multipart/form-data">
    <div class="container">
	
	<!-- Panel -->
	<div class="panel panel-primary">
	<div class="panel-heading">File Upload</div>
	<div class="panel-body">
    
	<!-- Dropdown -->
	<div class="form-group">
	<label>Subject Name :</label>
	<select class="form-control" id="selectdata"  name="SName">
	<?php
	if(mysqli_connect_errno()){
	echo "Failed to connect ".mysqli_connect_error();
	}
	echo "<option>-Select One-</option>";
	$query = mysqli_query($koneksi, "SELECT * FROM admin ") or die (mysqli_error());
	while ( $row=mysqli_fetch_assoc($query)) {
	echo "<option value='".$row['CName']."' data-softwares='".$row['CID']."'>".$row['CName']."</option>";

	}
	
	
	
	echo $_SESSION['SubID'];
	?>
	</select>
	</div>
	
	<!-- Textbox -->
	<div class="form-group">
	<label>Subject ID :</label>
	<input type="text" class="form-control" id="softwares" name="SID" readonly><br>
	

	<label>Weeks</label>
	<select class="form-control" name="week">
		<option>Week</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
	</select><br>
	
	<label>Lecture</label>
	<input type="file" name="filUpload[]" class="form-control" ><br>
	<label>Tute</label>
	<input type="file" name="filUpload[]" class="form-control"><br>
	<label>Lab</label>
	<input type="file" name="filUpload[]" class="form-control"><br>
	<label>Assignment</label>
	<input type="file" name="filUpload[]" class="form-control"><br>
	<label>Notice</label><br>
	<textarea rows="4" cols="50" name="notice"></textarea>



	<input name="btnSubmit" type="submit" value="Submit" class="form-control" style="background-color:black; color:white; ">
	
	

	</div>
	
	</div>
	<div class="panel-footer"></div>
	</div>
	
	</div>

	


    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>




	</FORM>

	

<script type="text/javascript">
  $('#users').on('change',function(){
    var value = $('#users').val();
    //showUser(value);
    $.ajax({
      url:'AJAX.php',
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
        xmlhttp.open("GET","AJAX.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
</body>
</html>