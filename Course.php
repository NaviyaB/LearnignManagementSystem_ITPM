<?php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "course";
   /*$sbid ="SID";
   $coid ="CID";
   $coname ="CName";
   $weeks = "Week";
   $lecture ="Lecture";
   $tute ="Tute";
   $lab ="Lab";
   $notice = "Notice";
   $assigment = "Assigment";
   $index = "Index";*/
  
    $conn = new mysqli($servername, $username, $password, $dbname);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }

   $sqli = 'SELECT * FROM admin';
   $resultE = mysqli_query($conn, $sqli);
   
   
   //echo "Fetched data successfully\n";
   
  


?>
</!DOCTYPE html>
<html>
<head>
   <style>

   table {
    width: 100%;
    border-collapse: collapse;
   }

   table, td, th {
    border: 0px solid black;
    padding: 5px;
   }
   </style>
  <title></title>
</head>
<body>
  

   <form method="post"  id="cont-form" enctype="multipart/form-data">
             
              
              <?php 
              
              if(mysqli_num_rows($resultE) > 0)
              {
                while ($r=mysqli_fetch_array($resultE)) {
                echo"<a href='details.php?ID={$r['Index']}'>{$r['CName']}</a><br>\n";
                //$cnames = $r["$coname"];
                  }
                
              } 
                 ?>
              
                
              
             
             <?php
                
                //echo($sq);exit; 
             ?>
            <br> 
          

    </form>             
</body>
</html>