<?php
session_start();

function list_jobs($user_mail){
    $json = file_get_contents('database/data.json');
    $data = json_decode($json, true);
    $answer = array();

    foreach ($data as $item_id => $content){
        if (isset($user_mail)){
            echo '1234567890';
        }elseif($content["creator-email"] == $){

        }

    }
}

list_jobs(null);
