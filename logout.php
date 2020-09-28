<?php

session_start();
session_unset();
session_destroy();
setcookie('SESSION_TOKEN', null, -1);
header('Location: login.php');