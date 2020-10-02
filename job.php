<?php

require "lib/get-job-info.php";
require "lib/get-user-info-by-email.php";

$data = getJobInfo();
$jobName = $data['job-name'];
$jobDesc = $data['job-description'];
$data['published'] === 'on' ? $published = "checked" : $published = null;
$creatorName = $data['creator-name'];
$creatorEmail = $data['creator-email'];
$date = $data['date'];
$id = $data['id'];


$dir = str_replace("/var/www/html", "", getcwd());

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
    require "lib/navbar.php";
    ?>
    <div class="job-box container">
        <div class="row">
            <?php
            $user = getUserInfo($creatorEmail);
            $navLogo = $user['logo'];
            $navLogo[0] = "/";  
            ?>
            <img src=<?php echo $dir . $navLogo ?> class='logo' alt="logo" />
            <div class="column ml-5">
                <h1><strong><?php echo $jobName ?></strong></h1>
                <div class="ml-2 mt-4">
                    <p>Job Info: <p><?php echo $jobDesc ?></p></p>
                    <p>Created By: <?php echo $creatorName ?></p>
                    <p>Contact Email: <?php echo $creatorEmail ?></p>
                    <p>Contact Phone: <?php echo $user['phone'] ?></p>
                </div>
            </div>
        </div>
    </div>

    
</body>
</html>