<html>
<head>
<title></title>
</head>
<body>
<?php

    session_start();
	$conn = mysqli_connect('localhost', 'root', '', 'course');

    global $lec;
    global $tut;
    global $lab;
    global $assign;
    global $return;

	for($i=0;$i<count($_FILES["filUpload"]["name"]);$i++)
	{
		if($_FILES["filUpload"]["name"][$i] != "")
		{
			$filesName = $_FILES['filUpload']['name'][$i];
			$extension = pathinfo($filesName, PATHINFO_EXTENSION);
			

            if (!in_array($extension, ['pptx', 'pdf', 'docx'])) {
        		echo "You file extension must be .zip, .pdf or .docx";
    		}
    		else{
            		if(move_uploaded_file($_FILES["filUpload"]["tmp_name"][$i],"myfile/".$_FILES["filUpload"]["name"][$i]))
					{
						$fileName = $_FILES['filUpload']['name'][$i];

						 if( $i == 0){
            				$lec = $fileName;
            	
            			 }
            			if( $i == 1){
            				$tut = $fileName;
            	
           				 }
            			if( $i == 2){
            				$lab = $fileName;
            	
            			 }
           			    if( $i == 3){
            				$assign = $fileName;
            	
            			 }
            			
					//echo "File uploaded successfully";

					$return = true;
					}
			}

			
		}


	}
    $w = $_POST['week'];
    $c = $_POST['SName'];
    //echo $w; exit;

    $sq = "Select `Week`,`CName` From teacher Where `CName`= '$c' and `Week`='$w' ";
    //echo $sq;exit;
   
    $e = mysqli_query($conn,$sq);

    if(mysqli_num_rows($e) > 0){
         echo"Data Already Have";
    }
    else{
    if($return == true){
	$strSQL = "INSERT INTO teacher ";
	$strSQL .="(`CID`,`CName`,`Week`,`LecName`,`TuteName`,`LabName`,`AssignmentName`,`Notices`) VALUES ( '{$_POST['SID']}','{$_POST['SName']}','{$_POST['week']}','$lec','$tut','$lab','$assign','{$_POST['notice']}')";
	//echo $strSQL;exit;		
				
	if (mysqli_query($conn,$strSQL)){
        echo "File uploaded successfully";
    }
    
    }
   

    } 
    
       
      
	//echo "Copy/Upload Complete<br>";

?>



</body>
</html>