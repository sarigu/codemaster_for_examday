<?php 
include('header.php');
?>
<h2>Lessons</h2>
<a href="lesson_add.php" class="btn btn-success">Add Lesson</a>

<?php
if(isset($_GET["mode"])) {
	$id=$_GET["id"];
	$sql=" delete from lesson where lesson_id='$id' ";
		$result = mysqli_query($con,$sql);
}

$sql ="SELECT * from lesson order by lesson_id desc";

$result = mysqli_query($con,$sql);
?>
<br/><br/>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Title</th>
                <th>Video Link</th>
                <th>Script</th>
                <th>Exercise Explanation</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
<?php
    while($row = mysqli_fetch_array($result)) {
        // print_r($row);
        // exit();
	echo "<tr>";
    echo "<td>".$row['title']."</td>";
    echo "<td>".$row['video_link']."</td>";
    echo "<td>".$row['script']."</td>";
    echo "<td>".$row['exercise_explanation']."</td>";
	echo "<td><a href='lesson_update.php?id={$row['lesson_id']}'>Update</a> <a href='?mode=delete&id={$row['lesson_id']}'>Delete</a></td>";
	echo "</tr>";

}
?>
        </tbody>
     
    </table>
<?php
include('footer.php');
?>
