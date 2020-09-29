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
    <h1>Job site</h1>
</header>

<section>
    <?php
    print list_jobs();
    ?>
</section>

</body>
</html>
