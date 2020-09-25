<?php

require_once "common.php";

if(!empty($_SESSION['SESSION_TOKEN']) && !empty($_COOKIE['SESSION_TOKEN'])){
    $session_token = null;
}

?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <?php
        NavLink("Home", "index.php");
        if(!empty($_SESSION['SESSION_TOKEN']) || !empty($_COOKIE['SESSION_TOKEN'])){
          NavLink("Profile", "profile.php");
          NavLink("Logout", "logout.php");
        }else{
          NavLink("Login", "login.php");
          NavLink("Register", "register.php");
        }
        ?>
      </ul>
  </div>
</nav>