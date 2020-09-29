<?php

require_once "lib/protected-route.php";
require_once "lib/common.php";
require_once "lib/get-user-info.php";

$error = '';
if($_POST) {
    $jobName = $_POST['job-name'];
    $jobDesc = $_POST['job-description'];
    $published = $_POST['published'];
    if(!empty($jobName) && !empty($jobDesc)){
        $newJob = array('job-name' => $jobName, 'job-description' => $jobDesc, "published" => $published, "creator-name" => $fullName, 'creator-email' => $email, "date" => date('m/d/Y H:i:s', time()));
        $json = file_get_contents('database/data.json');
        $data = json_decode($json, true);
        $index = count ((array)$data ) + 1;
        $data[$index] = $newJob;
        file_put_contents('database/data.json', json_encode($data));
    }else{
        $error = "<p class='invalid'>Please fill all fields</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/main.css" />
    <title>Create new job</title>
</head>
<body>
    <?php
    require "lib/navbar.php";
    ?>
    <div class="container mt-3">
        <h1 id="header">Create New Job</h1>
        <form method="POST">
            <?php
            Input("job-name", "Job Name");
            TextArea("job-description", "Job Description:");
            Checkbox("published", "Published");
            echo $error;
            Submit("Submit");
            ?>
        </form>
    </div>
</body>
</html>