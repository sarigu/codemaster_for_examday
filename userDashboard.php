<?php 
require_once('nav.php'); 
include_once('connection.php'); 



if(isset($_SESSION['user_id'])){
  $userid = $_SESSION['user_id'];
} else {
  $userid = 0;
}


$sql ="SELECT * FROM started_courses WHERE user_id = $userid ";
$courses = mysqli_query($con,$sql);



 ?>
 <main>
 <div class="d-flex flex-column justify-content-between mt-6">
     <h1 class="text-center">Your Started Courses</h1>
     <!--Slideshow-->
 <div id="carouselExampleInterval" class="carousel slide bgGr dn db-ns mb-4" data-ride="carousel" data-interval="false">
   <div class="carousel-inner">
     <div class="carousel-item active" data-interval="false">
       <!--one container for three containers-->
       <div id="slide1" class="carousel-container d-flex flex-row justify-content-between mt-1 mr-6 ml-6 pt-4 pb-4"></div>
       </div>
       <div class="carousel-item " data-interval="false">
           <!--second container for three containers-->
       <div  id="slide2" class="carousel-container d-flex flex-row justify-content-between mt-1 mr-6 ml-6  pt-4 pb-4"></div>
       </div>
       <?php 
    
    $sqlTitles ="SELECT * from started_courses where user_id = $userid GROUP BY course_id ";
    $coursesTitles = mysqli_query($con,$sqlTitles);
     $arr = [];
     
  
     $currentRow; 
       while ($row = mysqli_fetch_array($coursesTitles)){ 
  
         if( $currentRow !== $row['title']) {    
 ?>  
       
       <!--single container-->
         <div class="container1 d-flex flex-column justify-content-between d-block w-30 p-1 ">
           <!--topic heading-->
           <h1 class="text-center my-1 f4"><?= $row["title"]; ?></h1>
                 <!--progressbar and text on side-->
               <div class="d-flex flex-row align-items-center">
                 <div class="progress bg-darkblue mr-1 ml-3  w-50 " id="progressWi">
                     <div class="progress-bar " role="progressbar" aria-valuenow="70"
                     aria-valuemin="0" aria-valuemax="100" style="width:70%">
                       <span class="sr-only">70% Complete</span>
                     </div>
                 </div>
                 <div class="btnF1 ml-1  w-50">
                     5/10 lessons left
                 </div> 
             </div>
              <!--button--> 
           <div class="text-center m-1">
             <button onclick="location.href='lesson.php?courseid=<?=  $row["course_id"]; ?>'"  type="button" class="btn darkBtn bg-darkblue neon-green dib btnF">Continue</button>
           </div>
         </div>
 
         <?php }
         $currentRow = $row['title'];
     }
 ?>
      
 
   
  </div>
  <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!--mobile one?-->
<div class="db dn-ns text-center">
        <div class="container2 dib w-75 p-1 ">
          <!--topic heading-->
          <h1 class="text-center mt-1 mb-1 f4">Entity relationship diagram </h1>
                <!--progressbar and text on side-->
              <div class="d-flex flex-row align-items-center">
                <div class="progress bg-darkblue mr-1 ml-3 w-50" id="progressWi">
                    <div class="progress-bar " role="progressbar" aria-valuenow="70"
                    aria-valuemin="0" aria-valuemax="100" style="width:70%">
                      <span class="sr-only">70% Complete</span>
                    </div>
                </div>
                <div class="btnF1 ml-1 w-50">
                    5/10 lessons left
                </div> 
            </div>
             <!--button--> 
          <div class="text-center m-1">
            <button type="button" class="btn darkBtn bg-darkblue neon-green dib btnF">Continue</button>
          </div>
        </div>
      </div>

    <!--BOTTOM PART-->
    <div id="coursesSection" class="mt-5">
      <h1>See available courses</h1>
      <i class="fas fa-chevron-down"></i>
      <div id="coursesInnerDiv" class="bg-darkblue white mt-3">
      <?php 
           $sql ="select * from course ";
           $courses = mysqli_query($con,$sql);
           while($row = mysqli_fetch_array($courses)){ ?>
             <button class="topic-btn white "><?= $row["title"]; ?></button>
             <div class="lessons-list white ">
               <ul>
               <?php 
                $courseid = $row["course_id"];
                $sql_lesson ="select * from lesson where course_id = $courseid ";
                $lesson = mysqli_query($con,$sql_lesson);    
                while($lessonrow = mysqli_fetch_array($lesson)){
                 $lessonid = $lessonrow["lesson_id"];
               
               ?>
                 <li class="list-row" >
                   <div data-lesson= <?=$lessonid?> " onclick="location.href='lesson.php?lessonid=<?=$lessonid;?>'">
                    <?= $lessonrow["title"] ?>
                   </div>
                 </li>
                <?php   } ?>
                  <ul>
             </div>
           <?php } ?>
        <!--container end-->
      </div>
    </div>
    <div id="aboutSection" class="spacing">
      <h1>
        Learn how to Code with CodeMaster
      </h1>
      <p id="aboutP">
        CodeMaster is an online learning community with hundreds of classes for
        people interested in database, on topics including normalization, SQL,
        connecting database and frontend and many more. We would be happy to see
        you on CodeMaster!
      </p>
      <img src="images/hor_line.png" alt="line" id="horLine" />
      <div id="aboutGrid">
        <div class="aboutElement">
          <h2>Watch tutourials</h2>
          <p>
            Forget about books, notes and university lectures! Watch tutourials
            on CodeMaster anywhere, anytime at your own pace.
          </p>
          <button class="btn darkBtn bg-darkblue neon-green">Learn more</button>
        </div>
        <div class="aboutElement">
          <h2>Learn by doing</h2>
          <p>
            You don't feel like you can keep your focus for the entire lesson?
            Check your skills with excercise after every lesson!
          </p>
          <button class="btn darkBtn bg-darkblue neon-green">Learn more</button>
        </div>
        <div class="aboutElement">
          <h2>Get certificates</h2>
          <p>
            On CodeMaster by passing all the excercises and project you can get
            a valuable certificates!
          </p>
          <button class="btn darkBtn bg-darkblue neon-green">Learn more</button>
        </div>
        <div class="aboutElement">
          <h2>Track your progress</h2>
          <p>
            Stay motivated by tracking your progress! We make it easy for you to
            keep an eye on your activity statistics.s
          </p>
          <button class="btn darkBtn bg-darkblue neon-green p-10">Learn more</button>
        </div>
      </div>
    </div>
  </main>
    <?php include_once('footer.php'); ?>
    <script >

      slider();

      function slider(){

        console.log(arr);
console.log(node1);
console.log(node2);

      var node1 = document.querySelector("#slide1");  
      var node2 = document.querySelector("#slide2");  
      var arr = document.querySelectorAll (".container1");


      for (let i = 0 ; i< arr.length; i++)
      {
          if(i < 3){
              node1.appendChild(arr[i]);
          } else{
              node2.appendChild(arr[i]);
          }
      }
      }


       //      Drop Down for lessons and topic overview

       let logoutBtn = document.querySelector("#logout-btn");
       logoutBtn.addEventListener("click", goToLogout);
       function goToLogout(){
        window.location.replace("logout.php");
       }

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
        }
      }
    </script>
  </body>
</html>