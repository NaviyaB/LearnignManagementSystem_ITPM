<html>
<head>
<title></title>
</head>
<body>
<?php

    session_start();
	$conn = mysqli_connect('localhost', 'root', '', 'course');

	$strSQL = "INSERT INTO article ";
	$strSQL .="(`Content`,`CName`,`St_name`) VALUES ('{$_POST['SName']}','{$_POST['content']}','{$_POST['stname']}')";

	if (mysqli_query($conn,$strSQL)){
        echo "File uploaded successfully";
    }
    
   
   

    
    
       
      

?>



</body>
</html>