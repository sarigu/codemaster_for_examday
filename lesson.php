<?php
ob_start();
require_once('nav.php'); 
include_once('connection.php'); 

if(isset($_SESSION['user_id'])){
  $userid = $_SESSION['user_id'];
} else {
  $userid = 0;
}


$lessonID;

if(isset($_GET['courseid'])){
  $courseID = $_GET['courseid'];
  $getLesson ="SELECT * from lesson where course_id = $courseID LIMIT 1";
  $lessonResult = mysqli_query($con,$getLesson);  
 
  while($lessonRow = mysqli_fetch_array($lessonResult)){
    //var_dump( $lessonRow["lesson_id"]);
    $lessonID = $lessonRow["lesson_id"];
  }
} else {
  $courseID= 0;
}

if(isset($_GET['lessonid'])){
  $lessonID = $_GET['lessonid'];
} 






$finishedLessons = [];
    
$sql ="select * from finished_classes where user_id = $userid ";
$finishedClasses = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($finishedClasses)){
  //print_r ($row[lesson_id] ) ;
  $obj = new stdClass();
  $obj->lesson = $row[lesson_id];
    array_push( $finishedLessons ,$obj);
}

$arr =  json_encode($finishedLessons);


$faveArr = [];

$sqlFaves ="SELECT lesson_id from user_favourite where user_id = $userid ";
$faveLessons = mysqli_query($con,$sqlFaves);
while($rowFaves = mysqli_fetch_array($faveLessons )){
 array_push($faveArr , $rowFaves[lesson_id]);
}

$faves = json_encode($faveArr);





$lessonTitle ="";






?>
    <main>
      <!-- Container overview and video/script -->
      <div class="container-fluid">
        <div class="row justify-content-between spacing">
          <div class=" col-md-4 col-lg-3  bg-darkblue-box">
            <!--Overview of lessons and topics-->
            <div id="overview">
            <?php 
           $sql ="select * from course";
           $courses = mysqli_query($con,$sql);
           
             
            while($row = mysqli_fetch_array($courses)){ 
              ?>
              <button data-lesson=<?= $row["course_id"];?> class="topic-btn white "><span><?= $row["title"]; ?></span></button>
              <div class="lessons-list white ">
                <ul>
                <?php 
                 $courseid = $row["course_id"];
                 $sql_lesson ="select * from lesson where course_id = $courseid ";
                 $lesson = mysqli_query($con,$sql_lesson);    
                 while($lessonrow = mysqli_fetch_array($lesson)){
                  $lessonid = $lessonrow["lesson_id"];
                  $lessonTitle = $lessonrow["title"];
                 // print_r ($lessonrow );
                
                ?>
                  <li class="list-row" >
                    <div class="heart-icon"  onclick="addToFavourites(event)"><i data-lesson= <?=$lessonid?>  class="far fa-heart"></i></div>
                    <div data-lesson= <?=$lessonid?>  onclick="getLessonContent(event)">
                     <?= $lessonrow["title"] ?>
                    </div>
                    <div class="check-load-icon"><i class="fas fa-check"></i></div>
                  </li>
                 <?php   } ?>
                   <ul>
              </div>
            <?php } 
            
            $contentLoaded=1;?>
              <!--2-->
              <!--3-->
              <!--4-->
              <!--5-->
              <!--6-->
              <!--end of list -->
              
            </div>
            <!--end of overview-->
            <div id="overlay">
              <div id="left-line"></div>
              <div id="right-line"></div>
            </div>
          </div>
          <div class="col-md-7 col-lg-8 ">
            <!-- nested for video/script -->
            <div class="row ">
              <!--new lesson name and heart-->
            <div class="col-12  bg-darkblue-box" id="title-box" >
            <h1 class="neon-green" id="lesson-title"></h1>
                <h1 style="margin-left:20px;">
                <i id="title-heart" data-lesson=""  class="far fa-heart neon-green"  onclick="addToFavourites(event)">
                 </i></h1>
          
           
            </div>
              <div class="col-md-12 embed-responsive embed-responsive-16by9">
                <iframe
                  class="embed-responsive-item"
                  src="https://www.youtube.com/embed/QpdhBUYk7Kk"
                ></iframe>
              </div>
              <!--script-->
              <div class="col-md-12  offset-lg-2 col-lg-8 bg-darkblue-box bg-box-spacing">
                <h1 class="neon-green">Script</h1>
                <div id="script-txt" class="bg-white-box">
                  Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                  Consequatur qui labore at impedit quam sed incidunt error
                  animi eaque velit, odio provident. Reprehenderit veritatis,
                  asperiores nostrum pariatur voluptatibus illo hic.<br /><br />
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Voluptas ipsum qui porro velit exercitationem repellat
                  provident alias. Harum assumenda voluptatum dolores rem
                  explicabo est fugiat ut reiciendis incidunt. Eius,
                  consectetur.<br /><br />
                  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ad
                  officiis quaerat ducimus suscipit corrupti laudantium vero
                  autem atque, aliquam dolor cumque ab sit dicta, architecto
                  provident consequuntur corporis omnis vitae?
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Container task and code editor-->
      <div class="container-fluid">
        <div class="row justify-content-between spacing">
           <!-- exercise container-->
          <div class="col-md-5 bg-darkblue-box bg-box-spacing">
            <h1 class="white">Exercise:</h1>
            <h1 id="lesson-name" class="neon-green">Normalization Form</h1>
            <div id="exercise-txt" class="bg-white-box">
              <p>
                Normalisation is a technique that consists of a series of rules
                whose application eliminates redundancy in a relational design.
                This course teaches you about the specific states called normal
                forms.
              </p>
              <h5>First Normal Form (1NF)</h5>
              <p>
                To normalize a model up to 1NF all its values must be atomic. In
                this exercise you will learn how a relation fulfills 1NF.
              </p>
              <h5>Second Normal Form (2NF)</h5>
              <p>
                A relation fulfils 2NF if it fulfils 1NF and every attribute
                that does not belong to the PK depends on the full PK. Note, if
                a relation has a simple PK (only formed by one attribute) in
                1NF, it automatically fulfills 2NF.
              </p>
              <h5>Third Normal Form (3NF)</h5>
              <p>
                A relation is normalised up to 3NF, if the relation fulfils 2NF
                and all attributes that do not belong to the PK don’t inform
                about other attributes, they are independent.
              </p>
            </div>
          </div>
           <!--code editor-->
          <div class="col-md-6 bg-darkblue-box bg-box-spacing" >
            <div class="bg-white-box" id="code-display-box">
              <p id="exercise-instruction">
                Pull all the records from the Customers table.
              </p>
              <div id="code-snippet">
                <!--numbers on the side of the code-->
                <ul>
                  <li>1</li>
                  <li>2</li>
                  <li>3</li>
                  <li>4</li>
                  <li>5</li>
                  <li>6</li>
                  <li>7</li>
                  <li>8</li>
                  <li>9</li>
                  <li>10</li>
                  <li>11</li>
                  <li>12</li>
                </ul>
                <!--where the inserted code is displayed-->
                <div class="p-2" id="code-placeholder"></div>
              </div>
            </div>
            <!--input for code-->
            <div class="input-group mb-3">
              <textarea
                id="code-input"
                type="text"
                class="form-control"
                rows="3"
                oninput="displayCode()"
                placeholder="Write your code here"
              ></textarea>
              <div class="input-group-append">
                <button
                  class="btn btn-light "
                  type="button"
                  id="button-addon2"
                  onclick="checkCode()"
                >
                  Go!
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      
    </main>
    <script>





      getLessonAfterLoad();
      checkActiveCourse();
      checkFinishedLessons();
      checkFavourites();
  
   
      function checkActiveCourse(){
        var courseID = <?php echo $courseID ?>;
        let overviewBtn = document.querySelectorAll("#overview button");
        for (let i = 0; i < overviewBtn.length; i++) {
          if( overviewBtn[i].dataset.lesson == courseID ){
            overviewBtn[i].style.color="#00ffce";

          }
          }
      }


      function checkFinishedLessons(){
        var listItems= document.querySelectorAll(".list-row");
        //console.log(listItems);
        var  arr = <?= $arr?>;

          for(let i = 0; i < arr.length; i++){
           
                   var finishedLesson = arr[i].lesson;
        for(let i = 0; i < listItems.length; i++){
           var listLesson = listItems[i].children[1].dataset.lesson;
          if (finishedLesson == listLesson )
            listItems[i].children[2].style.display = "block"; 
          }
        }
      }

      function  checkFavourites(){
        var listItems= document.querySelectorAll(".list-row");
        var titleHeart = document.querySelector("#title-heart");
        console.log(titleHeart.class);
        var arr = <?=$faves ?>;
        for(let i = 0; i < arr.length; i++){      
        var favourite = arr[i];
      
     
        for(let i = 0; i < listItems.length; i++){
          var listLesson = listItems[i].children[1].dataset.lesson;
          if (favourite == listLesson )
            var heartNbr = listItems[i].children[0].getElementsByTagName("i")[0].dataset.lesson;
            if(heartNbr == listLesson){
              listItems[i].children[0].getElementsByTagName("i")[0].classList.remove("far", "fa-heart");
             listItems[i].children[0].getElementsByTagName("i")[0].classList.add("fas", "fa-heart");
            }
            }
            if(favourite == titleHeart.dataset.lesson){
              console.log("yes");
              titleHeart.classList.remove("far", "fa-heart");
              titleHeart.classList.add("fas", "fa-heart");
      }
          }

    
      }


      function addToFavourites(event){
        console.log(event.target);
        let lessonToAdd = event.target.dataset.lesson;
        let user = <?php echo $userid ?>;
  

        $.ajax({
             type: "POST",
              url: "add-faves.php",
             data: { user: user,
                lesson: lessonToAdd}
            });  
     
             
        event.target.classList.remove("far", "fa-heart");
        event.target.classList.add("fas", "fa-heart");
 

      }

      

let logoutBtn = document.querySelector("#logout-btn");
       logoutBtn.addEventListener("click", goToLogout);
       function goToLogout(){
        window.location.replace("logout.php");
       }
 
var parentItem; 

     function getLessonContent(event){
       parentItem = event.target.parentElement;
       var allLessons = document.querySelectorAll(".list-row");
      // console.log(allLessons);
       for (let i = 0; i < allLessons.length; i++) {
          //console.log(allLessons[i])
          allLessons[i].style.color = "white";
        }
  
       event.target.parentElement.style.color = "#00ffce";
        var lessonID = event.target.dataset.lesson;
    
        //console.log(lessonID );
            $.ajax({
              type: "POST",
              url: "get-lessons.php",
              data: { lesson: lessonID}
            }).done(function( data ) {
               var obj = JSON.parse(data);
              changeContent(obj);
            });              
     }

    
     function getLessonAfterLoad(){
       var lessonId = <?php echo $lessonID ?>;
       console.log(lessonId);

       $.ajax({
              type: "POST",
              url: "get-lessons.php",
              data: { lesson: lessonId}
            }).done(function( data ) {
               var obj = JSON.parse(data);
              changeContent(obj);
            });  

            var allLessons = document.querySelectorAll(".list-row");
       for (let i = 0; i < allLessons.length; i++) {
          if(allLessons[i].children[1].dataset.lesson == lessonId ){
            allLessons[i].children[1].style.color = "#00ffce";
            allLessons[i].style.color = "#00ffce";
          };
 
        }
     }

   

     let script = document.querySelector("#script-txt");
     let exerciseTxt = document.querySelector("#exercise-txt");
     let video = document.querySelector(".embed-responsive-item");
     let lesson =""; 
     let lessonName = document.querySelector("#lesson-name");
     let lessonTitle = document.querySelector("#lesson-title");
     let titleHeart = document.querySelector("#title-heart");

     function changeContent(data){
       //console.log(data.exercise_explanation);
       script.innerHTML = data.script;
       exerciseTxt.innerHTML = data.exercise_explanation ; 
       video.src =  data.video_link; 
       lesson = data.lesson_id;
       lessonName.innerHTML  = data.title;
       lessonTitle.innerHTML = data.title ;
       titleHeart.dataset.lesson = data.lesson_id;
     }


    //      Drop Down for lessons and topic overview

    var topicBtn = document.getElementsByClassName("topic-btn");
      var lessonsList = document.getElementsByClassName("lessons-list");

      for (var i = 0; i < topicBtn.length; i++) {
        topicBtn[i].addEventListener("click", function() {
          var listShows = this.classList.contains("active");
          //reset all, so only the lessons list from the topic clicked on shows
          closeOpenLists(topicBtn, "remove", "active");
          closeOpenLists(lessonsList, "remove", "show");

          if (listShows != true) {
            this.classList.toggle("active");
            this.nextElementSibling.classList.toggle("show"); //opens this topcis lessons list
          }
        });
      }

      function closeOpenLists(elem, action, className) {
        for (var i = 0; i < elem.length; i++) {
          elem[i].classList[action](className);
          elem[i].style.color = "white";
        }
      }



      //      Code Editor

      var codeInput = document.querySelector("#code-input");
      var codePlaceholder = document.querySelector("#code-placeholder");

      function displayCode() {
        var insertedCode = codeInput.value;
        codePlaceholder.innerHTML = insertedCode;
        codePlaceholder.style.color = "black";
      }

      function checkCode() {
      //console.log(lesson);
        var insertedCode = codeInput.value.trim();
        var expectedCode = "SELECT * FROM Customers;";
        if (insertedCode == expectedCode) {
          codePlaceholder.style.color = "#00ffce";
          parentItem.children[2].style.display = "block";
          $.ajax({
              type: "POST",
              url: "update-learning.php",
              data: { lesson: lesson}
            }).done(function( data ) {
       
               if(data != ""){
                  alert("Keep going! You finished " + data + " lessons."); 
               }
            });    
        
        } else {
          codePlaceholder.style.color = "red";
        }
      }
            
       </script>


    <?php require_once('footer.php'); 


    ?>