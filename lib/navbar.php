<?php

require_once "common.php";

session_start();

if(!empty($_SESSION['SESSION_TOKEN']) && !empty($_COOKIE['SESSION_TOKEN'])){
    $session_token = null;
}

?>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>  
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarNav">
    <div class="container">
        <a class='navbar-brand' href="index.php">Jobs</a>
        <ul class="navbar-nav ml-auto">
        <?php
        if(!empty($_SESSION['SESSION_TOKEN']) || !empty($_COOKIE['SESSION_TOKEN'])){
          require "get-user-info.php";
          ?>
          <a href="create-new-job.php" class="btn btn-primary mr-5">Add job</a>
          <img src=<?php echo $logo ?> alt='logo' id="navbar-logo"/>
          <?php
          NavLink($fullName, "profile.php");
        }else{
          echo $_SESSION['SESSION_TOKEN'];
          NavLink("login", "login.php", "far fa-user");
          NavLink("register", "register.php", "fas fa-briefcase");
        }
        ?>
      </ul>
  </div>
  </div>
</nav>