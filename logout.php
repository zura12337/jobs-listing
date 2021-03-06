<?php

require "lib/get-user-info.php";


$json = file_get_contents('database/users.json');
$data = json_decode($json, true);
foreach($data as $userEmail => $item){
    if($userEmail == $email){
        unset($data[$userEmail]['SESSION_TOKEN']);
        file_put_contents('database/users.json', json_encode($data));
    }
}
session_destroy();
session_unset();
setcookie('SESSION_TOKEN', null, -1);
header('Location: login.php');