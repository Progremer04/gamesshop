<?php

include('database.php');

if(isset($_POST['submit'])){

   $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
   $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = md5($_POST['password']); // Hash the password

   $select = "SELECT * FROM users WHERE gmail = '$email'";
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $error[] = 'User already exists!';
   } else {
      $insert = "INSERT INTO users (firstname, lastname, gmail, password) VALUES ('$firstname', '$lastname', '$email', '$password')";
      mysqli_query($conn, $insert);
      header('location: index.php');
      exit(); // Ensure script stops execution after redirection
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Create Account</title>
    <link rel="shortcut icon" href="/access/img/logo.jpg" type="image/x-icon">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }

        body {
            background-color: #c9d6ff;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
            position: relative;
            overflow: hidden;
            width: 100%;
            max-width: 768px;
            min-height: 480px;
            display: flex;
            flex-direction: row;
        }

        .container form {
            background-color: #fff;
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 40px;
        }

        .container input {
            background-color: #eee;
            border: none;
            margin: 8px 0;
            padding: 10px 15px;
            font-size: 13px;
            border-radius: 8px;
            width: 100%;
            outline: none;
        }

        .container button {
            background-color: #512da8;
            color: #fff;
            font-size: 12px;
            padding: 10px 45px;
            border: 1px solid transparent;
            border-radius: 8px;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            margin-top: 20px;
            cursor: pointer;
        }

        .error-message {
            color: #FF0000;
            font-size: 15px;
            font-weight: bold;
            padding: 10px;
            font-family: monospace;
        }

        .toggle-container {
            background-color: #5c6bc0;
            position: absolute;
            top: 0;
            right: 0;
            width: 50%; /* Adjusted width */
            height: 100%;
            overflow: hidden;
        }

        .toggle {
            background-color: #512da8;
            background: linear-gradient(to right, #5c6bc0, #512da8);
            color: #fff;
            width: 100%;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }

        .container.active .toggle {
            transform: translateX(0);
        }

        .toggle-panel {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 30px;
            text-align: center;
            transform: translateX(0);
            transition: all 0.6s ease-in-out;
        }

        .toggle-left {
            transform: translateX(0);
            color: #FF0000;
            min-height: 480px;
            overflow: hidden;
            padding: 20px;
        }
        .toggle-left p{
            color: #000;
            font-weight: bolder;
            padding: 25px;
        }
        .hidden a {
            text-decoration: none;
            color:#FF0000;
            font-weight: 500;
            font-size: 20px;
            text-shadow: 2px 2px 15px #fff;
            padding: 20px;
            transition: all 0.5s;
            
        }

        .hidden a:hover {
            color: #454545;
            font-weight: 900;
            font-size: 25px;
            text-shadow: -2px -5px 10px #000;
            padding: 22px;
        }
        
h5.error-message {
    color: #FF0000;
    /* Red color for error messages */
    font-size: 15px;
    /* Adjust font size as needed */
    font-weight: bolder;
    /* Make the text bold */
    padding: 10px;
    /* Add some space below the error message */
    font-family: monospace;
}
    </style>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="" method="post"> <!-- Added action attribute -->
                <h1>Create Account</h1>
                <div class="social-icons">
                    <a href="#" class="icon" style="visibility: hidden;"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon" style="visibility: hidden;"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon" style="visibility: hidden;"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon" style="visibility: hidden;"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <?php
                    if(isset($error)){
                        foreach($error as $error){
                            echo '<h5 class="error-message">'.$error.'</h5>';
                        }
                    }
                ?>
                <input type="text" placeholder="First Name" name="firstname" required>
                <input type="text" placeholder="Last Name" name="lastname" required>
                <input type="email" placeholder="Email" name="email" required>
                <input type="password" placeholder="Password" name="password" required>
                <button type="submit" name="submit">Sign Up</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of the site features</p>
                    <button class="hidden" id="login"><a href="/access/login_form/index.php">Sign in</a></button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
