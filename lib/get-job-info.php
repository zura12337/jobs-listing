<?php


function getJobInfo($protected = false){
    require "get-user-info.php";
    if(isset($_GET['jobId'])){
        $jobId = $_GET["jobId"];
        $json = file_get_contents('database/data.json');
        $data = json_decode($json, true);
        foreach($data as $id => $item){
            if($jobId == $id){
                $item['id'] = $id;
                if($protected == true){
                    if($item['creator-email'] === $email || $isAdmin){
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