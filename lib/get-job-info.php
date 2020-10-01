<?php

// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);

function getJobInfo($protected = false){
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
                $item['id'] = $id;
                if($protected == true){
                    if($item['creator-email'] === $email){
                        return $item;
                    }else{
                        header("Location: ../not-found.php");
                    }
                }else{
                    return $item;
                }
            }
        }
    }else{
        header("Location: ../profile.php");
    }
}
?>