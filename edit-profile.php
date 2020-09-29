<?php

require "lib/get-user-info.php";

if($_POST){
    $full_name = $_POST['full_name'];
    $phone_number = $_POST['mobile'];
    if($_POST['company-individual'] === "individual-check") {
        $company_individual = 'individual';
    }else{
        $company_individual = "company";
        if($_FILES['logo']['name']){
            $imagePath = $_FILES['logo']['tmp_name'];
            $fileNewName = time() . '_' . $_FILES['logo']['name'];
            $logo = "./uploads/".$fileNewName;
        }
    };
    $json = file_get_contents('database/users.json');
    $data = json_decode($json, true);
    foreach($data as $key => $value){
        if ($key == $email){
            $password = $value['password'];
            if($item['SESSION_TOKEN'] === $_COOKIE['SESSION_TOKEN'] || $item['SESSION_TOKEN'] === $_SESSION['SESSION_TOKEN']){
                $session_token = $item["SESSION_TOKEN"];
            }
        }
    }
    if($company_individual === "company") {
        $newUser = array('full_name' => $full_name, 'phone' => $phone_number, 'password' => $password, "company_individual" => $company_individual,  'image' => $logo, 'SESSION_TOKEN' => $session_token);
    }else{
        $newUser = array('full_name' => $full_name, 'phone' => $phone_number, 'password' => $password,"company_individual" => $company_individual, 'SESSION_TOKEN' => $session_token);
    }
    $data[$email] = $newUser;
    if($_FILES['logo']['name']){
        move_uploaded_file($_FILES['logo']['tmp_name'], $logo);
    }
    file_put_contents('database/users.json', json_encode($data));
    header("location: profile.php");

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
        <h1>Edit Profile</h1>
        <form id="edit_profile_form" action="edit-profile.php" method="post" enctype="multipart/form-data">
            <?php
            Input("full_name", "Full Name", "text", $fullName);
            Input("mobile", "Phone Number", "number", $phone);
            if($company_individual === "company"){
                Radio("company-individual", "individual-check", "Individual");
                Radio("company-individual", "company-check", "Company", "checked");
            }else{
                Radio("company-individual", "individual-check", "Individual", "checked");
                Radio("company-individual", "company-check", "Company");
            }

            ?>
            <div id="image-upload" class=<?php if($company_individual === "individual" || $company_individual === null) echo 'hidden' ?>>
                <?php
                Input("logo", "Company Logo", "file");
                echo $imageError;
                ?>
            </div>
            <?php
            Submit();
            ?>
        </form>
</body>
<script type="module" defer src="./js/edit-profile.js"></script>
</html>