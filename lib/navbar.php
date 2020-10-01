<?php

require_once "common.php";

session_start();

if(!empty($_SESSION['SESSION_TOKEN']) && !empty($_COOKIE['SESSION_TOKEN'])){
    $session_token = null;
}

$dir = str_replace("/var/www/html", "", getcwd());
?>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>  
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarNav">
    <div class="container">
      <a class='navbar-brand' href="<?php echo $dir ?>/index.php">Jobs</a>
      <ul class="navbar-nav ml-auto">
        <?php
        if(!empty($_SESSION['SESSION_TOKEN']) || !empty($_COOKIE['SESSION_TOKEN'])){
          require "get-user-info.php";
          $navLogo = $logo;
          $navLogo[0] = "/";
          ?>
          <a href="<?php echo $dir ?>/create-new-job.php" class="btn btn-primary mr-5">Add job</a>
          <img src=<?php echo $dir.$navLogo ?> alt='logo' class="logo logo-sm"/>
          <?php
          NavLink($fullName, $dir."/profile.php");
        }else{
          echo $_SESSION['SESSION_TOKEN'];
          NavLink("login", $dir."/login.php", "far fa-user");
          NavLink("register", $dir."/register.php", "fas fa-briefcase");
        }
        ?>
      </ul>
  </div>
  </div>
</nav>