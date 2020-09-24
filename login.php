<?php
if($_POST){

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    <title>JobSite</title>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form action="login.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" id="email"/>
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" id="password"/>
            <button class="btn btn-primary mt-3" type="submit">Submit</button>
        </form>
    </div>
</body>
</html>