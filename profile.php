<?php
require_once "lib/get-user-info.php";
require "lib/protected-route.php";
require "lib/list-jobs.php";

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
<?php require_once "lib/navbar.php"; ?>

<div class="container mt-3">
        <div>
            <p>Hello, <?php echo $fullName;?></p>
        </div>

        <div class="column">
            <img src=<?php echo $logo?> class="logo" />
            <p class="col-3">Email: <?php echo $email; ?></p>
            <p class="col-3">Phone: <?php echo $phone; ?></p>
        </div>

        <a class="btn btn-primary" href="edit-profile.php">Edit profile</a>
        <a class="btn btn-danger" href="logout.php">Logout</a>
        <div class="jobs mt-5">
            <?php print list_jobs($email); ?> 
        </div>
</div>


</body>
</html>
