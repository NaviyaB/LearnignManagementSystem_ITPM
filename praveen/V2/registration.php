<?php

session_start();


$con = mysqli_connect('localhost','root','','march9') or die("could not connect to database");

// mysql_select_db($con, 'march9');

$name = $_POST['name'];
$dob = $_POST['date'];
$gender = $_POST['gender'];
$nic = $_POST['nic'];
$username = $_POST['user_name'];
$mobile = $_POST['mobile'];
$address = $_POST['address'];
$email = $_POST['mail_address'];
$guardian_name = $_POST['g_name'];
$password = $_POST['password'];

$s = " select * from user_table where name = '$name'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1){
    echo "User Name already taken!";
}else{
    $reg = "insert into user_table(name , dob , gender , nic , username , mobile , address , email , guardian_name , password) values ('$name' , '$date' , '$gender' , '$nic' , '$user_name' , '$mobile' , '$address' , '$mail_address' , '$g_name' , '$password')";
    mysqli_query($con, $reg);
    echo "Registration Successful!";
}

?>
