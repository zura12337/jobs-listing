<?php
if($_POST){

}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    <title>JobSite</title>
</head>
<body>
    <div class="container">
        <h1>Register</h1>
        <form action="register.php" method="post">
            <label for="first_name">First name:</label>
            <input type="text" class="form-control" name="first_name" id="first_name">

            <label for="last_name">Last name:</label>
            <input type="text" class="form-control" name="last_name" id="last_name">

            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" id="email">

            <label for="mobile">Phone number:</label>
            <input type="number" class="form-control" name="mobile" id="mobile">
            <div class="mt-3 mb-3">
            <div class="form-check">
                <input type="radio" class="form-check-input" name="company-individual" id="individual-check" value="individual-check">
                <label class="form-check-label" for="individual-check">Individual</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="company-individual" id="company-check" value="company-check">
                <label class="form-check-label" for="company-check">Company</label>
            </div>
            </div>
            <div>
                <label for="pass">Password:</label>
                <input type="password" class="form-control" name="pass" id="pass">

                <label for="re-pass">Repeat Password:</label>
                <input type="password" class="form-control" name="re-pass" id="re-pass">
            </div>

            <input type="submit" class="btn btn-primary mt-3" id="submit" value="Submit"><br>
        </form>
    </div>

</body>
</html>