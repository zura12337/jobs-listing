<?php
session_start();

$json = file_get_contents('database/users.json');
$data = json_decode($json, true);

foreach($data as $email => $item){
    if(isset($_COOKIE['SESSION_TOKEN']) || isset($_SESSION['SESSION_TOKEN'])){
        if($item['SESSION_TOKEN'] === $_COOKIE['SESSION_TOKEN'] && $item["SESSION_TOKEN"] !== null ||  $item['SESSION_TOKEN'] === $_SESSION['SESSION_TOKEN'] && $item["SESSION_TOKEN"] !== null){
            $fullName = $item['full_name'];
            $phone = $item['phone'];
            $company_individual = $item['company_individual'];
            $logo = $item['image'];
            if($item['is_admin']){
                $isAdmin = true;
            }
            break;
        }

    }

}
