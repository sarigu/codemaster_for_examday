<?php 
ob_start();
include_once('connection.php'); 


$userid = $_SESSION['user_id'];

//$userid = 67;
//$lessonId = 17;

$lessonId =  $_POST['lesson'];


$sql_update ="UPDATE user_learning SET lesson_status = 1 WHERE lesson_id = $lessonId AND user_id = $userid";
$q = mysqli_query($con,$sql_update); 
  


$sql_counters ="SELECT counter FROM lesson_counter WHERE user_id = $userid";
$result = mysqli_query($con,$sql_counters); 
$row = mysqli_fetch_array($result);

$lessonsDone = $row["counter"]% 2 ;
if($lessonsDone = $row["counter"]% 2  == 0){
  echo $row["counter"];
}
?>