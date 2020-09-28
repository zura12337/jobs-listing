<?php

session_start();
if(empty($_SESSION['SESSION_TOKEN']) && empty($_COOKIE['SESSION_TOKEN'])){
    header("Location: login.php");
}