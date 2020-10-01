<?php


// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require_once "lib/get-user-info-by-email.php";
require_once "lib/list-jobs.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/main.css" />
    <title>JobSite</title>
</head>
<body>
    <?php
    require_once "lib/navbar.php";
    $email = $_GET['profileId'];
    $data = getUserInfo($email);
    ?>
    <div class="container">
        <div class="column">
    
            <img src=.<?php echo $data['logo']?> class="logo" />
            <p class='col-3'>Full Name: <?php echo $data['fullName'] ?> </p>
            <p class="col-3">Email: <?php echo $email; ?></p>
            <p class="col-3">Phone: <?php echo $data['phone']; ?></p>
        </div>
        <div class="jobs mt-5">
            <?php
            print list_jobs(1, $user_mail = $email);
            ?>
        </div>
    </div>
</body>
</html>
