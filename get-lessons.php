<?php

try {

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "e_learning";
    
    // Create connection
    $con = new mysqli($servername, $username, $password);
    $db = mysqli_select_db($con, $dbname) or die(mysqli_error());
    
    // Check connection
    if ($con->connect_error) {
      die("Connection failed: " . $con->connect_error);
    } 
    //echo "Connected successfully";


    $lessonId =  $_POST['lesson'];
    //echo $lessonId ;
  //$lessonId =  17;
    $sql_lesson ="SELECT * FROM lesson WHERE lesson_id = $lessonId";
    $lesson = mysqli_query($con,$sql_lesson); 
    $row = mysqli_fetch_array($lesson);
    //var_dump( $row );
    echo json_encode( $row );


    
    }
catch(PDOException $e)
    {
    //echo "Connection failed: " . $e->getMessage();
    }

    



?>