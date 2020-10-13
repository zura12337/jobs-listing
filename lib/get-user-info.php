<?php
session_start();

require_once "sql-info.php";

$json = file_get_contents('database/users.json');
$data = json_decode($json, true);

if(isset($_COOKIE['SESSION_TOKEN']) && !isset($_SESSION['SESSION_TOKEN'])) { // find user with appropriate session token and insert data here
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        echo $servername, ',', $dbname, $username, $password, '<br>';
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        print_r($_COOKIE['SESSION_TOKEN']);
        $result = $conn->query("SELECT * FROM sessions WHERE session = " . $_COOKIE['SESSION_TOKEN'], 0)->fetchAll(\PDO::FETCH_NAMED);

    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

}
//elseif (isset($_SESSION['SESSION_TOKEN'])){
//
//    if($item['SESSION_TOKEN'] === $_COOKIE['SESSION_TOKEN'] && $item["SESSION_TOKEN"] !== null ||  $item['SESSION_TOKEN'] === $_SESSION['SESSION_TOKEN'] && $item["SESSION_TOKEN"] !== null){
//        $fullName = $item['full_name'];
//        $phone = $item['phone'];
//
//
//        $company_individual = $item['company_individual'];
//        $logo = $item['image'];
//
//        if($item['is_admin']){
//            $isAdmin = true;
//        }
//        break;
//        }

//}