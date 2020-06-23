<?php
include_once 'nav.php';
include_once('connection.php'); 
$userid = $_SESSION['user_id'];



?>
<table class="table">
  <thead>
    <tr>
      <th scope="col"> Your Favourites</th>
    </tr>
  </thead>
  <tbody>
<?php
$sql ="CALL GetFavourites($userid)";
$faves = mysqli_query($con,$sql);
while ($row = mysqli_fetch_array($faves)){     
    ?>
    <tr>
    <td><a href="lesson.php?id= <?= $row[lesson_id]?>"><?= $row[title] ?></a></td>
    </tr>   
    <?php }   ?>
                    
</tbody>
</table>