<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

if($_POST){
    $email = $_POST["email"];
    $full_name = $_POST["full_name"];
    $phone_number = $_POST["mobile"];
    $imagePath = $_FILES['logo']['tmp_name'];
    $fileNewName = time() . '_' . $_FILES['logo']['name'];
    $fileDestination = "./uploads/".$fileNewName;
    move_uploaded_file($_FILES['logo']['tmp_name'], $fileDestination);
    $password = password_hash($_POST["pass"], PASSWORD_DEFAULT);
    $error_class = 'invalid';
    if($_POST['pass'] == $_POST['re_pass']){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $newUser = array('full_name' => $full_name, 'phone' => $phone_number, 'password' => $password, 'image' => $fileDestination);
            $json = file_get_contents('database/users.json');
            $data = json_decode($json, true);
            foreach($data as $key => $value){
                if ($key == $email){
                    $usernameExists_error = '<label for="email" class='.$error_class.'>User with this email already exists.</label>';
                    $emailExists_error_class = $error_class;
                    $allRight = true;
                }
            }
                if(!isset($allRight)){
                    $data[$email] = $newUser;
                    file_put_contents('database/users.json', json_encode($data));
                    header("location: login.php");
                }
        }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    <title>JobSite</title>
</head>
<body>
<?php
    require "lib/navbar.php";
?>
    <div class="container">
        <h1>Register</h1>
        <form id="register_form" action="register.php" method="post" enctype="multipart/form-data">
            <?php
            Input("full_name", "Full Name", "text", $full_name);
            echo "<div class='$mail_error_class'>";
            Input("email", "Email", "email", $email);
            echo $mailError;
            echo $usernameExists_error;
            echo "</div>";
            Input("mobile", "Phone Number", "number", $phone_number);
            Radio("company-individual", "individual-check", "Individual");
            Radio("company-individual", "company-check", "Company");
            Input("logo", "Company Logo", "file");
            Input("pass", "Password", "password");
            Input("re_pass", "Repeat Password", "password");
            echo $passError;
            Submit();
            ?>
        </form>
</body>
<script defer src="./js/register.js"></script>
</html>