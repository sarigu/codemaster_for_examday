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
    
    
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

    
?>