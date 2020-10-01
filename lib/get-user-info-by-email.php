<?php

function getUserInfo($userEmail) {
    $json = file_get_contents(getcwd().'/database/users.json');
    $data = json_decode($json, true);
    foreach($data as $email => $item){
        if($userEmail == $email){
            $fullName = $item['full_name'];
            $phone = $item['phone'];
            $company_individual = $item['company_individual'];
            $logo = $item['image'];
            $user['fullName'] = $fullName;
            $user['logo'] = $logo;
            return $user;
            break;
        }
    }
}


?>