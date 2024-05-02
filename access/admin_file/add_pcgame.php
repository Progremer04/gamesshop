<?php
// Establish database connection
include("database.php");

if (isset($_POST["submit"])) {
    // Process form data
    $title = $_POST["title"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $platform = $_POST["platform"]; // Platform selection from the form
    $UserID = 0; // Assuming a default value of 0 for UserID

    // File details
    $file_name = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];

    // Upload directory path
    $upload_dir = '/access/upload/';

    // Move the uploaded file to the designated directory
    if (move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . $upload_dir . $file_name)) {
        // Image uploaded successfully, proceed with database insertion
        $image_url = $upload_dir . $file_name;
        $sql = "INSERT INTO pcgames (title, description, price, image_url, platform) VALUES ('$title', '$description', '$price', '$image_url', '$platform')";
        if (mysqli_query($conn, $sql)) {
            // Redirect to a page after successful insertion
            header("Location: /access/admin_file/index.php?adminid=" . $_GET['id']);
            exit(); // Terminate script after redirection
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Failed to upload image.";
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add PC Game</title>
    <link rel="shortcut icon" href="/access/img/logo.jpg" type="image/x-icon">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #000;
        }

        .wrapper {
            position: relative;
            width: 400px;
            height: 500px;
            background: #000;
            box-shadow: 0 0 50px #0ef;
            border-radius: 20px;
            padding: 40px;
            overflow: hidden;
        }

        .wrapper:hover {
            animation: animate 1s linear infinite;
        }

        @keyframes animate {
            100% {
                filter: hue-rotate(360deg);
            }
        }

        .form-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
            transition: 1s ease-in-out;
        }

        .wrapper.active .form-wrapper.sign-in {
            transform: translateY(-450px);
        }

        .wrapper .form-wrapper.sign-up {
            position: absolute;
            top: 450px;
            left: 0;
        }

        .wrapper.active .form-wrapper.sign-up {
            transform: translateY(-450px);
        }

        h2 {
            font-size: 30px;
            color: #fff;
            text-align: center;
        }

        .input-group {
            position: relative;
            margin: 30px 0;
            border-bottom: 2px solid #fff;
        }

        .input-group label {
            position: absolute;
            top: 50%;
            left: 5px;
            transform: translateY(-50%);
            font-size: 16px;
            color: #fff;
            pointer-events: none;
            transition: .5s;
        }

        .input-group input {
            width: 320px;
            height: 40px;
            font-size: 16px;
            color: #fff;
            padding: 0 5px;
            background: transparent;
            border: none;
            outline: none;
        }

        .input-group input:focus~label,
        .input-group input:valid~label {
            top: -5px;
        }

        .input-group textarea {
            width: 320px;
            height: 40px;
            font-size: 16px;
            color: #fff;
            padding: 0 5px;
            background: transparent;
            border: none;
            outline: none;

        }

        .input-group textarea:focus~label,
        .input-group textarea:valid~label {
            top: -5px;
            padding: 34px;
        }

        .remember {
            margin: -5px 0 15px 5px;
            background-color: transparent;
        }

        .remember select {
            color: #fff;
            background: transparent;
            font-size: 14px;
        }

        .remember select option {
            accent-color: #0ef;
            background: transparent;
        }

        button {
            position: relative;
            width: 100%;
            height: 40px;
            background: #0ef;
            box-shadow: 0 0 10px #0ef;
            font-size: 16px;
            color: #000;
            font-weight: 500;
            cursor: pointer;
            border-radius: 30px;
            border: none;
            outline: none;
        }

        .signUp-link {
            font-size: 14px;
            text-align: center;
            margin: 15px 0;
        }

        .signUp-link p {
            color: #fff;
        }

        .signUp-link p a {
            color: #0ef;
            text-decoration: none;
            font-weight: 500;
        }

        .signUp-link p a:hover {
            text-decoration: underline;

        }

        select {
            background-color: transparent;
        }

        select option {
            background-color: #000;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="form-wrapper sign-in">
            <form action="" method="post" enctype="multipart/form-data">
                <h2>Add PC Game</h2>

                <div class="input-group">
                    <input type="text" name="title" required>
                    <label for="">Title</label>
                </div>

                <div class="input-group">
                    <textarea name="description" required></textarea>
                    <label for="">Description</label>
                </div>

                <div class="input-group">
                    <input type="number" name="price" min="0"required>
                    <label for="">Price</label>
                </div>

                <div class="input-group">
                    <input type="file" name="image" accept="image/*" required>
                </div>

                <input type="hidden" id="platform" value="pc" name="platform" required>

                <button type="submit" name="submit" onclick="return confirm('Are you sure you want to Add This PC Game?')">Add PC Game</button>
            </form>
        </div>

    </div>
    <script>
        const signInBtnLink = document.querySelector('.signInBtn-link');
        const signUpBtnLink = document.querySelector('.signUpBtn-link');
        const wrapper = document.querySelector('.wrapper');
        signUpBtnLink.addEventListener('click', () => {
            wrapper.classList.toggle('active');
        });
        signInBtnLink.addEventListener('click', () => {
            wrapper.classList.toggle('active');
        });
    </script>
</body>

</html>