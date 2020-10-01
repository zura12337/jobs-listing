<?php

function getUserInfo($userEmail) {
    $json = file_get_contents(getcwd().'/database/users.json');
    $data = json_decode($json, true);
    foreach($data as $email => $item){
        if($userEmail == $email){
            $user['fullName'] = $item['full_name'];
            $user['phone'] = $item['phone'];
            $user['company_individual'] = $item['company_individual'];
            $user['logo'] = $item['image'];
            return $user;
            break;
        }
    }
}


?>