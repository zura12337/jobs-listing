<?php

include_once 'lib/sql-info.php';

$is_company = 'individual';

if ($_POST) {
    $email = $_POST["email"];
    $full_name = $_POST["full_name"];
    $phone_number = $_POST["mobile"];
    if ($_POST['company-individual'] === "individual-check") {
        $is_company = true;
    } else {
        $is_company = false;
        $imagePath = $_FILES['logo']['tmp_name'];
        $fileNewName = time() . '_' . $_FILES['logo']['name'];
        $fileNewName = strtr($fileNewName, ' ', '_');
        $fileDestination = "./uploads/" . $fileNewName;
    };
    $password = password_hash($_POST["pass"], PASSWORD_DEFAULT);
    $error_class = 'invalid';
    if ($_POST['pass'] == $_POST['re_pass']) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "INSERT INTO users (full_name, email, phone, company, password)
                        VALUES ({$conn->quote($full_name)}, 
                                {$conn->quote($email)}, 
                                {$conn->quote($phone_number)},
                                {$is_company},
                                {$conn->quote($password)}
                                )";

                echo $sql;
                exit();
                // use exec() because no results are returned
                $conn->exec($sql);

                // get id of inserted sql row
                $last_id = $conn->lastInsertId();
                echo "New record created successfully. Last inserted ID is: " . $last_id;

                // check if user is company to insert logo
                if ($is_company){
                    $sql = "INSERT INTO logos (id, logo)
                            VALUES ($last_id, $conn->quote($fileDestination))";
                }

            } catch (PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
            }
            $conn = null;


//            if ($is_company) {
//
//
//                $newUser = array('full_name' => $full_name, 'phone' => $phone_number, 'password' => $password, "company_individual" => $is_company, 'image' => $fileDestination);
//            }
//            else
//            {
//                $newUser = array('full_name' => $full_name, 'phone' => $phone_number, 'password' => $password, "company_individual" => $is_company, 'image' => './uploads/default-user-image.png');
//            }


            $json = file_get_contents('database/users.json');
            $data = json_decode($json, true);

            foreach ($data as $key => $value) {
                if ($key == $email) {

                    $usernameExists_error = '<span for="email" class=' . $error_class . '>User with this email already exists.</span>';
                    $emailExists_error_class = $error_class;

                    $allRight = true;
                }

            }

//            if (!$allRight) {
//                $data[$email] = $newUser;
//                move_uploaded_file($_FILES['logo']['tmp_name'], $fileDestination);
//                file_put_contents('database/users.json', json_encode($data));
//                header("location: login.php");
//            }
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
    <link rel="stylesheet" href="css/main.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    <title>JobSite</title>
</head>
<body>
<?php
require "lib/navbar.php";
?>
<div class="container ">
    <form id="register_form" class="register-form" action="register.php" method="post" enctype="multipart/form-data">
        <h1 class="header">Register</h1>
        <?php
        Input("full_name", "Full Name", "text", $full_name);
        echo "<div class='$mail_error_class'>";
        Input("email", "Email", "email", $email);
        echo $usernameExists_error;
        echo "</div>";
        Input("mobile", "Phone Number", "number", $phone_number);
        if ($is_company === "company") {
            Radio("company-individual", "individual-check", "Individual");
            Radio("company-individual", "company-check", "Company", "checked");
        } else {
            Radio("company-individual", "individual-check", "Individual", "checked");
            Radio("company-individual", "company-check", "Company");
        }

        ?>
        <div id="image-upload" class=<?php
        if ($is_company === "individual" || $is_company === null) {
            echo 'hidden';
        } else {
            echo "";
        } ?>>
            <?php
            Input("logo", "Company Logo", "file");
            echo $imageError;
            ?>
            <div class="row hidden" id="logo-preview">
                <div class="column">
                    <img src="" alt="logo" class="logo" id="logo-preview-big"/>
                    <p class="ml-4 small-text">Big Preview</p>
                </div>
                <div class="column">
                    <img src="" alt="logo" class="logo logo-sm mt-4" id="logo-preview-sm"/>
                    <p class="small-text">Small Preview</p>
                </div>
            </div>
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