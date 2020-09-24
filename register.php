<?php
if($_POST){
    $email = $_POST["email"];
    $f_name = $_POST["first_name"];
    $l_name = $_POST["last_name"];
    $phone_number = $_POST["mobile"];
    $password = password_hash($_POST["pass"], PASSWORD_DEFAULT);
    var_dump($_POST["mobile"], $phone_number);
    $error_class = 'invalid';
    if($_POST['pass'] == $_POST['re_pass']){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $newUser = array('f_name' => $f_name, 'l_name' => $l_name, 'password' => $password);
            $json = file_get_contents('users.json');
            $data = json_decode($json, true);

            foreach($data as $key => $value){
                if ($key == $email){
                    $usernameExists_error = '<label for="email" class='.$error_class.'>User with this email already exists.</label>';
                    $emailExists_error_class = $error_class;
                    $allRight = true;
                }
            }
                if(!isset($allRight)){
                    $data[$email] = $newUser;
                    file_put_contents('users.json', json_encode($data));
                    echo "success!";
                    exit();
//                    header("location: register.php");
                }
        }else{
            $mail_error_class = $error_class;
            $mailError = '<p class='.$error_class.'>Invalid email address</p>';
        }
    }else{
        $pass_error_class = $error_class;
        $passError = '<p class='.$error_class.'>Passwords do not match</p>';
    }
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
        <input type="text" name="first_name" id="first_name" value="<?php echo $f_name; ?>">

        <label for="last_name">Last name:</label>
        <input type="text" name="last_name" id="last_name" value="<?php echo $l_name; ?>">

        <div class='<?php echo $mail_error_class; ?>'>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?php echo $email; ?>"><br>

            <?php
            echo $mailError;
            echo $usernameExists_error;
            ?>

        </div>

        <label for="mobile">Phone number:</label>
        <input type="number" name="mobile" id="mobile" value="<?php echo $phone_number; ?>"><br>

        <div>
            <label for="individual-check">Individual</label>
            <input type="radio" name="Individual" id="individual-check">

            <label for="company-check">Company</label>
            <input type="radio" name="company" id="company-check"><br>
        </div>

        <div class='<?php echo $pass_error_class; ?>'>
            <label for="pass">Password:</label>
            <input type="password" name="pass" id="pass">

            <label for="re_pass">Repeat Password:</label>
            <input type="password" name="re_pass" id="re_pass">
            <?php echo $passError; ?>
        </div>

        <label for="submit"></label>
        <input type="submit" id="submit" value="Submit"><br>
    </form>

</body>
</html>