
<?php
ob_start();

include_once('connection.php'); 

if(isset($_POST["submit"])) {
    $error = '';
    if(empty($_POST['email']) && empty($_POST['password'])){
      echo 'Please Enter Email and Password';
    } else {
      $sql = "INSERT INTO `user` (`first_name`, `last_name`, `email`, `password`, `avatar_img`, `status`) VALUES ('".$_POST['first_name']."', '".$_POST['last_name']."', '".$_POST['email']."', '".$_POST['password']."', '', '".$_POST['status']."')";
      if ($error == '') {
        $r = mysqli_query($con,$sql);
        echo "New record created successfully";
        header('Location: index.php');
      } else {
        echo "Email : ".$_POST['email']." already exits. ";
      }
    }
      // $con->close();
  
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
      
          <form method="POST" enctype="multipart/form-data">
            <input  class="noBorder" type="text" name="first_name" class="form-control" placeholder="First Name"/>
            <input class="noBorder" type="text" name="last_name" class="form-control" placeholder="Last Name" />
            <input class="noBorder"  type="email" name="email" class="form-control" placeholder="Email Address">
            <input class="noBorder"  type="password" name="password" class="form-control" placeholder="Password">
            <input type="hidden" name="status" value="User" />
            <input class="btn-outline-success"  name="submit" type="submit"  value="Sign Up"/>
          </form>

       
          <a href="index.php" class="white">or Log In</a>
        </div>
      </div>
    </div>
    <!--courses-->
    <div id="coursesSection">
      <h1>See available courses</h1>
      <i class="fas fa-chevron-down"></i>
      <div id="coursesInnerDiv" class="bg-darkblue white mt-3">
        <button class="accordion">Topic 1</button>
        <div class="panel pl-5">
          <ol>
            <li>Lesson 1</li>
            <li>Lesson 2</li>
          </ol>
        </div>
        <button class="accordion">Topic 2</button>
        <div class="panel pl-5">
          <ol>
            <li>Lesson 1</li>
            <li>Lesson 2</li>
          </ol>
        </div>
        <button class="accordion">Topic 3</button>
        <div class="panel pl-5">
          <ol>
            <li>Lesson 1</li>
            <li>Lesson 2</li>
          </ol>
        </div>   
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
   
<?php




require_once('footer.php'); 


?>
    <script src="main.js"></script>
  </body>
</html>