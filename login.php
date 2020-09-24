<?php

require "lib/common.php";

if($_POST){
    $postEmail = $_POST['email'];
    $postPassword = $_POST['password'];
    $rememberMe = $_POST['remember-me'];
    $json = file_get_contents('users.json');
    $data = json_decode($json, true);
    foreach($data as $email => $item){
        $passwordHash = $item['password'];
        if($postEmail === $email && password_verify($postPassword, $passwordHash)){
                $session_token = base64_encode(random_bytes(24));
                str_replace(["-", "+", "/", "_"], "", $session_token);
                if(!isset($_POST["remember-me"])){
                    session_start();
                    $_SESSION['SESSION_TOKEN'] =  $session_token;
                }else{
                    setcookie("SESSION_TOKEN", $session_token, ['expires' => time() + 604800]);
                }
                $data[$email]["SESSION_TOKEN"] = $session_token;
                file_put_contents('users.json', json_encode($data));
            break;
        }else{
            $error = "<span class='invalid'>Email or password is incorrect.</span><br>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="./main.css" />
    <title>JobSite</title>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form action="login.php" method="POST">
            <?php
            Input("email", "Email:", "email");
            Input("password", "Password", "password");
            echo $error;
            ?>
            <input id="remember-me" class="mt-4" type="checkbox" name="remember-me"/>
            <label for="remember-me">Remember Me</label>
            <br>
            <?php
            Submit();
            ?>
        </form>
    </div>
</body>
</html>