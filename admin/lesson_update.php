<?php 
include('header.php');
$id=$_GET["id"];


if(isset($_POST["submit"])) {
  $title = $_POST["title"];
  $exercise_explanation = $_POST["exercise_explanation"];
  $video_link = $_POST["video_link"];
  $script = $_POST["script"];

  $sql=" UPDATE lesson SET title='$title',video_link='$video_link', script='$script', exercise_explanation='$exercise_explanation' WHERE lesson_id='$id'";

  $r= mysqli_query($con,$sql);	
  echo "Data Updated.";
}


$sql=" SELECT * from lesson where lesson_id='$id'";
$r=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($r)) {
  $title=$row['title'];
  $video_link=$row['video_link'];
  $script=$row['script'];
  $exercise_explanation=$row['exercise_explanation'];
}





?>
<h2>Update Lesson</h2>
<form method="POST" action="#" enctype="multipart/form-data">
<div class="form-group">
    <label for="inputAddress2">Select course</label><br/>
    <select id="course " name="course_id">
    <?php 
      $sql ="select * from course order by course_id";
      $result = mysqli_query($con,$sql);
      
      while($row = mysqli_fetch_array($result)) {
    ?>
    <option value="<?= $row["course_id"] ?>"><?= $row["title"]; ?></option>
      <?php } ?>
  </select>
  </div>
  <div class="form-group">
    <label for="inputAddress">Title</label>
    <input type="text" class="form-control"  name="title" id="inputAddress" value="<?= $title ?>">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Video Link</label>
    <textarea class="form-control" id="inputAddress2" name="video_link"> <?= $video_link ?></textarea>
  </div>
  <div class="form-group">
    <label for="inputAddress2">Script</label>
    <textarea class="form-control" id="inputAddress2" name="script"><?= $script?></textarea>
  </div>
  <div class="form-group">
    <label for="inputAddress2">Exercise Explanation</label>
    <textarea class="form-control" id="inputAddress2" name="exercise_explanation"><?= $exercise_explanation ?></textarea>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>

<?php

include('footer.php');
?>