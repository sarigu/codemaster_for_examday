<?php 
ob_start();
include_once('connection.php'); 
$userid = $_SESSION['user_id'];



   $lessonId =  $_POST['lesson'];
    //echo $lessonId ;

    $sql_lesson ="SELECT * FROM lesson WHERE lesson_id = $lessonId";
    $lesson = mysqli_query($con,$sql_lesson); 
    $row = mysqli_fetch_array($lesson);
    echo json_encode( $row );


    $error = '';

    $exist = 0;

    $sql_learning ="SELECT * FROM user_learning WHERE  user_id = $userid";
    $result = mysqli_query($con,$sql_learning); 
    while ($resultRow = mysqli_fetch_array($result)){  
     if( $resultRow["lesson_id"] ==  $lessonId){
      $exist = 1;

     }  
    }

    if($exist != 1){
      $sql = "INSERT INTO `user_learning` (user_id, lesson_id, lesson_status) VALUES ('$userid', '$lessonId', '0')";
      if ($error == '') {
        $r = mysqli_query($con,$sql);
      } else {
      }
    }


?>