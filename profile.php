<?php
require_once "lib/getUserInfo.php";
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
        <p> Hello, <?php echo $fullName; ?></p>
    </div>

    <div>
        <p>email: <?php echo $email; ?></p>
        <p>phone: <?php echo $phone; ?></p>
    </div>

    <a class="btn btn-primary" href="edit_profile.php">Edit profile</a>
</div>


</body>
</html>
