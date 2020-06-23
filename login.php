<?php
ob_start();



 if(isset($_POST['submit'])){
  $sql = "SELECT * FROM user";
  $users = mysqli_query($con,$sql);

  foreach($users as $user){
      if($user['email'] == $_POST['email'] && $user['password'] == $_POST['password']){

          $_SESSION['user_id'] = $user['user_id'];
          $_SESSION['email'] = $user['email'];
  
          header('Location: userDashboard.php');
      } else {
          // echo "0 results";
      }
  }
}

?>
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
          <p><?= $content; ?></p>
          <form method="POST">
            Email : <input name="email" type="email" placeholder="email"><br/><br/>
            Pasword : <input name="password" type="password" placeholder="password"><br/><br/>
            <input type="submit" name="submit">
          </form>
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
