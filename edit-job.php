<?php

require_once "lib/protected-route.php";
require_once "lib/common.php";
require_once "lib/get-job-info.php";

$error = '';
if($_POST) {
    $jobName = $_POST['job-name'];
    $jobDesc = $_POST['job-description'];
    $published = $_POST['published'];
    if(!empty($jobName) && !empty($jobDesc)){
        $newJob = array('job-name' => $jobName, 'job-description' => $jobDesc, "published" => $published,"creator-name" => $creatorName, "creator-email" => $creatorEmail,  "date" => date('m/d/Y H:i:s', time()));
        $json = file_get_contents('database/data.json');
        $data = json_decode($json, true);
        $data[$id] = $newJob;
        file_put_contents('database/data.json', json_encode($data));
    }else{
        $error = "<p class='invalid'>Please fill all fields</p>";
    }
}

if(!empty($_SESSION['SESSION_TOKEN']) && !empty($_COOKIE['SESSION_TOKEN'])){
    $session_token = null;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/main.css" />
    <title>Edit job</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarNav">
        <div class="container">
            <a class='navbar-brand' href="../index.php">Jobs</a>
            <ul class="navbar-nav ml-auto">
            <?php
            if(!empty($_SESSION['SESSION_TOKEN']) || !empty($_COOKIE['SESSION_TOKEN'])){
            ?>
            <img src=<?php echo '.'.$logo ?> alt='logo' id="navbar-logo"/>
            <?php
            NavLink($fullName, "../profile.php");
            }else{
            NavLink("login", "../login.php", "far fa-user");
            NavLink("register", "../register.php", "fas fa-briefcase");
            }
            ?>
        </ul>
    </div>
    </div>
    </nav>
    <div class="container mt-3">
        <h1 id="header">Edit Job</h1>
        <form method="POST">
            <?php
            Input("job-name", "Job Name", 'text', $jobName);
            TextArea("job-description", "Job Description:", $jobDesc);
            Checkbox("published", "Published", $published);
            echo $error;
            Submit("Submit");
            ?>
        </form>
    </div>
</body>
</html>