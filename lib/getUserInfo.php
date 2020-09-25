<?php

session_start();
$json = file_get_contents('database/users.json');
$data = json_decode($json, true);
foreach($data as $email => $item){
    if(isset($_COOKIE['SESSION_TOKEN'])){
        if($item['SESSION_TOKEN'] == $_COOKIE['SESSION_TOKEN']){
            $fullName = $item['f_name'] . " " . $item['l_name'];
        break;
        }
    }
    if(isset($_SESSION['SESSION_TOKEN'])){
        if($item['SESSION_TOKEN'] == $_SESSION['SESSION_TOKEN']){
            $fullName = $item['f_name'] . " " . $item['l_name'];
        break;
        }
    }
}


?>
