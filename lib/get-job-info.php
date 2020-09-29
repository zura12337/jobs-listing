<?php

require "get-user-info.php";
if(isset($_GET['jobId'])){
    $jobId = $_GET["jobId"];
    $json = file_get_contents('database/data.json');
    $data = json_decode($json, true);
    if($jobId > count($data)){
        header("Location: ../not-found.php");
    }
    foreach($data as $id => $item){
        if($jobId == $id){
            if($item['creator-email'] === $email){
                $jobName = $item['job-name'];
                $jobDesc = $item['job-description'];
                $item['published'] === 'on' ? $published = "checked" : $published = "";
                $creatorName = $item['creator-name'];
                $creatorEmail = $item['creator-email'];
                $date = $item['date'];
            }else{
                header("Location: ../not-found.php");
            }
        }
    }
}else{
    header("Location: ../profile.php");
}


?>