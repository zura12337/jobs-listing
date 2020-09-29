<?php

function getUserInfo($userEmail) {
    $json = file_get_contents(getcwd().'/database/users.json');
    $data = json_decode($json, true);
    foreach($data as $email => $item){
        if($userEmail == $email){
            $fullName = $item['full_name'];
            $phone = $item['phone'];
            $company_individual = $item['company_individual'];
            if($company_individual === "company"){
                $logo = $item['image'];
            }else{
                $logo = "https://www.xovi.com/wp-content/plugins/all-in-one-seo-pack/images/default-user-image.png";
            }
            return $logo;
            break;
        }
    }
}


?>