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
    <title>JobSite</title>
</head>
<body>
    <header>
        <h2>Register</h2>
    </header>

    <form action="register.php" method="post">
        <label for="first_name">First name:</label>
        <input type="text" name="first_name" id="first_name">

        <label for="last_name">Last name:</label>
        <input type="text" name="last_name" id="last_name">

        <label for="email">Email:</label>
        <input type="email" name="email" id="email"><br>

        <label for="mobile">Phone number:</label>
        <input type="number" name="mobile" id="mobile"><br>

        <div>
            <label for="individual-check">Individual</label>
            <input type="radio" name="Individual" id="individual-check">

            <label for="company-check">Company</label>
            <input type="radio" name="company" id="company-check"><br>
        </div>

        <div>
            <label for="pass">Password:</label>
            <input type="password" name="pass" id="pass">

            <label for="re-pass">Repeat Password:</label>
            <input type="password" name="re-pass" id="re-pass">
        </div>

        <label for="submit"></label>
        <input type="submit" id="submit" value="Submit"><br>
    </form>

</body>
</html>