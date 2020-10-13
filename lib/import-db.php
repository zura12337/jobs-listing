<?php

require "sql-info.php";

function importUsers($id=null){
    global $servername, $username, $password, $dbname;

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $result = $conn->query("SELECT * FROM users", 0)->fetchAll(\PDO::FETCH_NAMED);

    } catch(PDOException $e) {
        return "Connection failed: " . $e->getMessage();
    }



}

$json = file_get_contents('../database/users.json');
$data = json_decode($json, true);

//var_dump($data);

print_r (importUsers());

