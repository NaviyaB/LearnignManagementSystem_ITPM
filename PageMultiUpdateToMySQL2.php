<html>
<head>
<title>ThaiCreate.Com Tutorial</title>
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
            			
					echo "File uploaded successfully";

					$return = true;
					}
			}

			
		}


	}

	if($return == true){
	
	   if(isset($_POST['lec'])) {

            $strSQL ="UPDATE teacher SET LecName='$lec' WHERE SID='{$_POST['weekid']}'";

	
	       if (mysqli_query($conn,$strSQL)){
             echo "File uploaded successfully";
           }
        }

        if(isset($_POST['tute'])) {

            $strSQL ="UPDATE teacher SET TuteName='$tut' WHERE SID='{$_POST['weekid']}'";

    
            if (mysqli_query($conn,$strSQL)){
             echo "File uploaded successfully";
           }
        }

        if(isset($_POST['lab'])) {

            $strSQL ="UPDATE teacher SET LabName='$lab' WHERE SID='{$_POST['weekid']}'";

    
            if (mysqli_query($conn,$strSQL)){
             echo "File uploaded successfully";
           }
        }

        if(isset($_POST['assign'])) {

            $strSQL ="UPDATE teacher SET AssignmentName='$assign' WHERE SID='{$_POST['weekid']}'";

    
            if (mysqli_query($conn,$strSQL)){
             echo "File uploaded successfully";
           }
        }

     }

     if(isset($_POST['notice'])) {

            $strSQL ="UPDATE teacher SET Notices='{$_POST['noticedeta']}' WHERE SID='{$_POST['weekid']}'";

    
            if (mysqli_query($conn,$strSQL)){
             echo "File uploaded successfully";
           }
        }


    //echo $strSQL;exit;
	echo "Copy/Upload Complete<br>";
?>



</body>
</html>