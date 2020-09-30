<?php
include_once "lib/list-jobs.php";

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
    <h1 id="header">Job site</h1>
    <section class="mt-5">
        <?php
            print list_jobs();
        ?>
    </section>
</div>
</body>
</html>
