<?php

include_once "lib/list-jobs.php";

$page_count = list_jobs(1, $user_mail = null, $count = true);

if ($_GET){
    $content = list_jobs( $_GET["page"], $user_mail = null, $count = false);
} else {
    echo "123";
    $content = list_jobs(1, $user_mail = null, $count = false);
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/main.css" />
    <title>JobSite</title>
</head>
<body>
<header>
    <?php
    require "lib/navbar.php";
    ?>
</header>
<div class="container mt-3">
    <h1 class="header">Job site</h1>
    <section class="mt-5">
            <?php
            for ($i = 1; $i <= $page_count; $i++ ) {
                print "<a href='/?page=".$i."'>".$i."</a> ";
            }

            echo $content;

            for ($i = 1; $i <= $page_count; $i++ ) {
                print "<a href='/?page=".$i."'>".$i."</a> ";
            }
            ?>
    </section>

</div>
</body>
</html>
