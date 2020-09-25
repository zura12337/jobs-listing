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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    <title>JobSite</title>
</head>
<body>
<?php
    require "lib/navbar.php";
?>
    <div class="container">
        <h1>Register</h1>
        <form action="register.php" method="post">
            <label for="first_name">First name:</label>
            <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $f_name; ?>">

            <label for="last_name">Last name:</label>
            <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $l_name; ?>">

            <div class='<?php echo $mail_error_class; ?>'>
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" value="<?php echo $email; ?>"><br>

                <?php
                echo $mailError;
                echo $usernameExists_error;
                ?>

            </div>

            <label for="mobile">Phone number:</label>
            <input type="number" class="form-control" name="mobile" id="mobile" value="<?php $phone_number; ?>"><br>

            <div class="form-check">
                <label for="individual-check">Individual</label>
                <input class="form-check-label" type="radio" name="company-individual" id="individual-check">
            </div>
            <div class="form-check">
                <label for="company-check">Company</label>
                <input class="form-check-label" type="radio" name="company-individual" id="company-check"><br>
            </div>

            <div class='<?php echo $pass_error_class; ?>'>
                <label for="pass">Password:</label>
                <input class="form-control" type="password" name="pass" id="pass">

                <label for="re_pass">Repeat Password:</label>
                <input class="form-control" type="password" name="re_pass" id="re_pass">
                <?php echo $passError; ?>
            </div>
            <input class="btn btn-primary mt-3" type="submit" id="submit" value="Submit"><br>
        </form>
</body>
</html>