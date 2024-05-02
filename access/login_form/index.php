<?php

include('database.php');
session_start();

if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);

    // Check if the user is an admin
    $select_admin = "SELECT * FROM admins WHERE gmail = '$email' && password = '" . mysqli_real_escape_string($conn, $_POST["password"]) . "'";
    $result_admin = mysqli_query($conn, $select_admin);

    if(mysqli_num_rows($result_admin) > 0){
        $row_admin = mysqli_fetch_array($result_admin);
        $_SESSION['admin_name'] = $row_admin['firstname']; // Assuming admin's name is stored in 'firstname'
        header('location: /access/admin_file/index.php?adminid='.$row_admin['id']);
        exit();
    }

    // Check if the user is a regular user
    $select_user = "SELECT * FROM users WHERE gmail = '$email' && password = '$pass' ";
    $result_user = mysqli_query($conn, $select_user);

    if(mysqli_num_rows($result_user) > 0){
        $row_user = mysqli_fetch_array($result_user);
        header('location: /access/user_id/index.php?user_id='.$row_user['id']);
        exit();
    }

    // If no user or admin found, show error
    $error[] = 'Incorrect email or password!';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Login Form</title>
    <link rel="shortcut icon" href="/access/img/logo.jpg" type="image/x-icon">
    <style>
       .hidden a{
            color: #333;
            font-weight: 500;
            font-size: 20px;
            text-shadow: 2px 5px 10px #fff;
            transition: all 0.5s;
        }
        .hidden a:hover{
            color: #454545;
            font-weight: 900;
            font-size: 25px;
            text-shadow: -2px -5px 10px #000;
        }
        
    </style>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-in">
            <form action="" method="post">
                <h1>Sign In</h1>
                <div class="social-icons">
                    <a href="#" class="icon" style="visibility: hidden;"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon" style="visibility: hidden;"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon" style="visibility: hidden;"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon" style="visibility: hidden;"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <!-- Error Place -->
                <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<h5 class="error-message">'.$error.'</h5>';
         };
      };
      ?>
                <input type="email" placeholder="Email" name="email" required>
                <input type="password" placeholder="Password" name="password" required>
                <button type="submit" name="submit">Sign In</button> <!-- Removed unnecessary input inside button -->
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all site features</p>
                    <p>If You Don't Have an Account, Click Here to "Sign Up"</p>
                    <button class="hidden" id="register"><a href="/access/login_form/login.php">Sign Up</a></button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
