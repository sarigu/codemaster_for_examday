<?php 
require_once('nav.php'); 
include_once('connection.php'); 
include_once('userDashboard.php'); 


//echo $userid;

//echo $course;

$nbr1 =""; 
$nbr2 = ""; 
//Done classes

$sql ="SELECT COUNT(*) As count FROM finished_classes fc
INNER JOIN lesson l ON fc.lesson_id = l.lesson_id
WHERE user_id = $user_id  AND l.course_id = $course ";
$courses = mysqli_query($con,$sql);


while ($row = mysqli_fetch_array($courses)){ 
    $nbr1 = $row[count];
}

//Number of lessons in course

$sql2 ="SELECT COUNT(*) As count  FROM lesson WHERE course_id = $course ";
$result = mysqli_query($con,$sql2);

while ($row2 = mysqli_fetch_array($result)){ 
    $nbr2 = $row2[count];
}

echo $nbr1;
echo $nbr2;

$result = $nbr1 / $nbr2;
echo $result;


 ?>