<?php 
ob_start();
include_once('connection.php'); 

//echo $_POST["user"] ;
//echo $_POST["lesson"];



$user = $_POST["user"];
$lesson = $_POST["lesson"];
$error = '';

$sql = "INSERT INTO `user_favourite` (user_id, lesson_id) VALUES ('$user', '$lesson')";
 if ($error == '') {
    $r = mysqli_query($con,$sql);
    echo "New record created successfully";
  } else {
    echo "already exits. ";
  }
?>