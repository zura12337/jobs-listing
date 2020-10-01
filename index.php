<?php

include_once "lib/list-jobs.php";

$page_count = list_jobs(1, $user_mail = null, $count = true);

if ($_GET){
    $content = list_jobs( $_GET["page"], $user_mail = null, $count = false);
} else {
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
            <nav aria-label="Page navigation example">
            <ul class="pagination">
            <?php
            for ($i = 1; $i <= $page_count; $i++ ) {
                ?>
                <li class='page-item'><a href='?page=<?php echo $i ?>' class='page-link' ><?php echo $i?></a></li>
                <?php
            }
            ?>
            </ul>
            <?php
            echo $content;
            ?>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
            <?php
            for ($i = 1; $i <= $page_count; $i++ ) {
                ?>
                <li class='page-item'><a href='?page=<?php echo $i ?>' class='page-link' ><?php echo $i?></a></li>
                <?php
            }
            ?>
            </ul>
        </nav>
    </section>

</div>
</body>
</html>
