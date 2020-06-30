
<?php
ob_start();

include_once('connection.php'); 

if(isset($_POST['submit'])){
  $sql = "SELECT * FROM user";
  $users = mysqli_query($con,$sql);

  foreach($users as $user){
      if($user['email'] == $_POST['email'] && $user['password'] == $_POST['password']){
          $_SESSION['user_id'] = $user['user_id'];
          $_SESSION['email'] = $user['email'];
          header('Location: userDashboard.php');
      } else {
        //header('Location: index.php');
         
      }
  }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--font-->
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap"
      rel="stylesheet"
    />
    <!-- Latest compiled and minified CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://unpkg.com/tachyons@4.12.0/css/tachyons.min.css"/>
    <!--own CSS-->
    <link rel="stylesheet" href="style.css" />
    <!--font awesome-->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- JS, Popper.js, and jQuery -->
    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
    <title>Code Master</title>
  </head>
  <body>
 <!--NAV-->
 <nav class="navbar navbar-expand-lg  bg-darkblue ">
      <!--logo-->
      <a class="navbar-brand" href="main.php">
        <img src="images/logo.png" width="80%" alt="logo"
      /></a>
      <!--burgermenu-->
      <button
        class="navbar-toggler "
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"> <i class="fas fa-bars"></i></span>
      </button>

      <!--nav inside burgermenu and outside-->
      <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <!--search-->
        <form class="form-inline  mx-auto my-4 my-lg-0 ">
          <div class="input-group ">
            <input
              id="searchBar"
              type="text"
              class="form-control "
              placeholder="Search for available courses"
            />
            <div class="input-group-append">
              <button
                class="btn btn-outline-success"
                id="srchBtn"
                type="submit"
              >
                <svg
                  class="bi bi-search"
                  width="1em"
                  height="1em"
                  viewBox="0 0 16 16"
                  fill="currentColor"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    fill-rule="evenodd"
                    d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"
                  />
                  <path
                    fill-rule="evenodd"
                    d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"
                  />
                </svg>
              </button>
            </div>
          </div>
        </form>
        <!--All the Links on the right side -->
        <ul class="navbar-nav  ">
          <!--about-->
          <li class="nav-item mr-4 my-2 my-lg-0  ">
            <a class="nav-link " href="#aboutSection">About</a>
          </li>
             <!--button log in-->
          <li class="nav-item mr-4 my-2 my-lg-0  ">
            <a href="index.php" class="btn btn-outline-success">Log in</a>
          </li>
            <!--sign up in-->
          <li class="nav-item mr-4 my-2 my-lg-0  ">
            <a href="signup.php"  class="btn btn-success">Sign up</a>
          </li>
        </ul>
      </div>
    </nav>
    <!---LANDING PAGE -->
<main id="landingpage">
<div id="mainHeader" class="spacing">
      <div>
        <div id="heroText" class="neon-green">
          <p class="heroCaption">Learn from the best teachers</p>
          <h1 class="heroHeading">Become a CodeMaster</h1>
          <p class="heroCaption">and get your dream job</p>
        </div>
        <img src="images/main_hero.png" id="mainImg" />
      </div>
      <div id="logInArea">
        <div id="logInDiv" class="bg-darkblue-box">
          <h1>Become a CodeMaster for free</h1>
          <p>Create an account today</p>
      
          <form id="loginForm" method="POST" >
            <input  class="noBorder" name="email" type="email"  placeholder="youremail@email.com" />
            <input class="noBorder"  name="password" type="password" placeholder="password" />
            <input class="btn-outline-success" id="btn_Login" name="submit" type="submit"  value="Login"/>
          </form>
          <a href="signup.php" class="white">or Sign Up</a>
        </div>
      </div>
    </div>
    <!--courses-->
    <div id="coursesSection">
      <h1>See available courses</h1>
      <i class="fas fa-chevron-down"></i>
      <div id="coursesInnerDiv" class="bg-darkblue white mt-3">
      <?php 
           $sql ="select * from course order by course_id";
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
                   <div data-lesson= <?=$lessonid?>  onclick="getLessonContent(event)">
                    <?= $lessonrow["title"] ?>
                   </div>
                 </li>
                <?php   } ?>
                  <ul>
             </div>
           <?php } ?>
      </div>
    </div>

    <!--ABOUT-->
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
    <?php require_once('footer.php'); ?>
    <script >
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
        }
      }
    </script>
  </body>
</html>