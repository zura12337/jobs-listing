<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$company_individual = 'individual';

if($_POST){
    $email = $_POST["email"];
    $full_name = $_POST["full_name"];
    $phone_number = $_POST["mobile"];
    if($_POST['company-individual'] === "individual-check") {
        $company_individual = 'individual';
    }else{
        $company_individual = "company";
        $imagePath = $_FILES['logo']['tmp_name'];
        $fileNewName = time() . '_' . $_FILES['logo']['name'];
        $fileNewName = strtr($fileNewName, ' ', '_');
        $fileDestination = "./uploads/".$fileNewName;
    };
    $password = password_hash($_POST["pass"], PASSWORD_DEFAULT);
    $error_class = 'invalid';
    if($_POST['pass'] == $_POST['re_pass']){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            if($company_individual === "company") {
                $newUser = array('full_name' => $full_name, 'phone' => $phone_number, 'password' => $password, "company_individual" => $company_individual, 'image' => $fileDestination);
            }else{
                $newUser = array('full_name' => $full_name, 'phone' => $phone_number, 'password' => $password, "company_individual" => $company_individual);
            }
            $json = file_get_contents('database/users.json');
            $data = json_decode($json, true);
            foreach($data as $key => $value){
                if ($key == $email){
                    $usernameExists_error = '<span for="email" class='.$error_class.'>User with this email already exists.</span>';
                    $emailExists_error_class = $error_class;
                    $allRight = true;
                }
            }

                if(!$allRight){
                    $data[$email] = $newUser;
                    move_uploaded_file($_FILES['logo']['tmp_name'], $fileDestination);
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
        <div class="container ">
            <form id="register_form" class="register-form" action="register.php" method="post" enctype="multipart/form-data">
            <h1 id="header">Register</h1>
            <?php
                Input("full_name", "Full Name", "text", $full_name);
                echo "<div class='$mail_error_class'>";
                Input("email", "Email", "email", $email);
                echo $usernameExists_error;
                echo "</div>";
                Input("mobile", "Phone Number", "number", $phone_number);
                if($company_individual === "company"){
                    Radio("company-individual", "individual-check", "Individual");
                    Radio("company-individual", "company-check", "Company", "checked");
                }else{
                    Radio("company-individual", "individual-check", "Individual", "checked");
                    Radio("company-individual", "company-check", "Company");
                }

                ?>
                <div id="image-upload" class=<?php 
                if($company_individual === "individual" || $company_individual === null){ 
                    echo 'hidden';
                }
                else{ 
                    echo "";
                } ?>>
                    <?php
                    Input("logo", "Company Logo", "file");
                    echo $imageError;
                    ?>
                </div>
                <?php
                Input("pass", "Password", "password");
                Input("re_pass", "Repeat Password", "password");
                Submit();
                ?>
            </form>
        </div>
</body>
<script type="module" defer src="js/register.js"></script>
</html>