<?php
include("database.php");

// Check if form is submitted
if (isset($_POST["submit"])) {
    // Process form data
    $title = $_POST["title"];
    $description = $_POST["description"];
    $ads_type = $_POST["ads_type"];
    
    // File details
    $file_name = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    
    // Upload directory path
    $upload_dir = '/access/upload/';
    
    // Move the uploaded file to the designated directory
    if (move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . $upload_dir . $file_name)) {
        // Image uploaded successfully, proceed with database update
        $image_url = $upload_dir . $file_name;
        $ad_id = $_POST['id']; // Get ad ID from form
        $admin_id = $_POST['adminid']; // Get admin ID from form
        
        // SQL update statement
        $sql_update = "UPDATE ads SET title='$title', description='$description', image_url='$image_url', ads_type='$ads_type' WHERE id='$ad_id'";
        
        if (mysqli_query($conn, $sql_update)) {
            // Redirect to admin page after successful update
            header("Location: /access/admin_file/admin_panal/index.php?id=" . $admin_id);
            exit(); // Terminate script after redirection
        } else {
            echo "Error updating ad: " . mysqli_error($conn);
        }
    } else {
        echo "Failed to upload image.";
    }
}

mysqli_close($conn);
?>

<?php
// Establish database connection
include("database.php");

// Check if 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $ad_id = $_GET['id'];
    $admin_id = $_GET['adminid'];
    // Fetch ad details from the database
    $sql = "SELECT * FROM ads WHERE id = $ad_id";
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful and if a record was found
    if (mysqli_num_rows($result) > 0) {
        $ad_data = mysqli_fetch_assoc($result);
        // Pre-fill form fields with ad data
        $title = $ad_data['title'];
        $description = $ad_data['description'];
        $ads_type = $ad_data['ads_type'];
        // Assuming 'image_url' is the column name for the image URL
        $image_url = $ad_data['image_url'];
    } else {
        echo "No ad found with the specified ID.";
        exit; // Terminate script if no ad found
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
    <title>Modify Ad</title>
    <link rel="shortcut icon" href="/access/img/logo.jpg" type="image/x-icon">
    <!-- Add your CSS stylesheets or external links here -->
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
            overflow: hidden;
        }

        .login-box {
            position: relative;
            width: 400px;
            height: auto;
            background: #191919;
            border-radius: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 45px;
        }

        h2 {
            font-size: 2em;
            color: #fff;
            text-align: center;
            transition: .5s ease;
        }

        .input-check:checked~h2 {
            color: #00f7ff;
            text-shadow:
                0 0 15px #00f7ff,
                0 0 30px #00f7ff;
        }

        .input-box {
            position: relative;
            width: 310px;
            margin: 30px 0;
        }

        .input-box .input-line {
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 2.5px;
            background: #fff;
            transition: .5s ease;
        }

        .input-check:checked~.input-box .input-line {
            background: #00f7ff;
            box-shadow: 0 0 10px #00f7ff;
        }

        .input-box label {
            position: absolute;
            top: 50%;
            left: 5px;
            transform: translateY(-50%);
            font-size: 1em;
            color: #fff;
            pointer-events: none;
            transition: .5s ease;
        }


        .input-box input:focus~label,
        .input-box input:valid~label {
            top: -5px;
        }

        .input-check:checked~.input-box label {
            color: #00f7ff;
            text-shadow: 0 0 10px #00f7ff;
        }

        .input-box input {
            width: 100%;
            height: 50px;
            background: transparent;
            border: none;
            outline: none;
            font-size: 1em;
            color: #fff;
            padding: 0 35px 0 5px;
            transition: .5s ease;
        }

        .input-check:checked~.input-box input {
            color: #00f7ff;
            text-shadow: 0 0 5px #00f7ff;
        }

        .input-box .icon {
            position: absolute;
            right: 8px;
            color: #fff;
            font-size: 1.2em;
            line-height: 57px;
            transition: .5s ease;
        }

        .input-check:checked~.input-box .icon {
            color: #00f7ff;
            filter: drop-shadow(0 0 5px #00f7ff);
        }

        .remember-forgot {
            color: #fff;
            font-size: .9em;
            margin: -15px 0 15px;
            display: flex;
            justify-content: space-between;
            transition: .5s ease;
        }

        .input-check:checked~.remember-forgot {
            color: #00f7ff;
            text-shadow: 0 0 10px #00f7ff;
        }

        .remember-forgot label input {
            accent-color: #fff;
            margin-right: 3px;
            transition: .5s ease;
        }

        .input-check:checked~.remember-forgot label input {
            accent-color: #00f7ff;
        }

        .remember-forgot a {
            color: #fff;
            text-decoration: none;
            transition: color .5s ease;
        }

        .remember-forgot a:hover {
            text-decoration: underline;
        }

        .input-check:checked~.remember-forgot a {
            color: #00f7ff;
        }

        button {
            width: 100%;
            height: 40px;
            background: #fff;
            border: none;
            outline: none;
            border-radius: 40px;
            cursor: pointer;
            font-size: 1em;
            color: #191919;
            font-weight: 500;
            transition: .5s ease;
        }

        .input-check:checked~button {
            background: #00f7ff;
            box-shadow: 0 0 15px #00f7ff, 0 0 15px #00f7ff;
        }

        .register-link {
            color: #fff;
            font-size: .9em;
            text-align: center;
            margin: 25px 0 10px;
            transition: .5s ease;
        }

        .input-check:checked~.register-link {
            color: #00f7ff;
            text-shadow: 0 0 10px #00f7ff;
        }

        .register-link p a {
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            transition: color .5s ease;
        }

        .register-link p a:hover {
            text-decoration: underline;
        }

        .input-check:checked~.register-link p a {
            color: #00f7ff;
        }

        .login-light {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 500px;
            height: 10px;
            background: #00f7ff;
            border-radius: 20px;
        }

        .light {
            position: absolute;
            top: -200%;
            left: 0;
            width: 100%;
            height: 950px;
            background: linear-gradient(to bottom, rgba(255, 255, 255, .3) -50%, rgba(255, 255, 255, 0) 90%);
            clip-path: polygon(20% 0, 80% 0, 100% 100%, 0 100%);
            pointer-events: none;
            transition: .5s ease;
        }

        .input-check:checked~.light {
            top: -90%;
        }

        .toggle {
            position: absolute;
            top: 20px;
            right: -70px;
            width: 60px;
            height: 120px;
            background: #191919;
            border-radius: 10px;
        }

        .toggle::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 10px;
            height: 80%;
            background: #000;
        }

        .toggle::after {
            content: '';
            position: absolute;
            top: 5px;
            left: 50%;
            transform: translateX(-50%);
            width: 45px;
            height: 45px;
            background: #333;
            border: 2px solid #191919;
            border-radius: 10px;
            cursor: pointer;
            box-shadow: 0 0 10px rgba(0, 0, 0, .5);
            transition: .5s ease;
        }

        .input-check:checked~.toggle::after {
            top: 65px;
        }

        .input-check {
            position: absolute;
            right: -70px;
            z-index: 1;
            opacity: 0;
        }

        .toggle .text {
            position: absolute;
            top: 17px;
            left: 50%;
            transform: translateX(-50%);
            color: #fff;
            font-size: 1em;
            z-index: 1;
            text-transform: uppercase;
            pointer-events: none;
            transition: .5s ease;
        }

        .toggle .text.off {
            opacity: 1;
        }

        .input-check:checked~.toggle .text.off {
            top: 76px;
            opacity: 0;
        }

        .toggle .text.on {
            opacity: 0;
        }

        .input-check:checked~.toggle .text.on {
            top: 76px;
            opacity: 1;
            color: #00f7ff;
            text-shadow:
                0 0 15px #00f7ff,
                0 0 30px #00f7ff,
                0 0 45px #00f7ff,
                0 0 60px #00f7ff;
        }

        .input-box textarea {
            width: 100%;
            background: transparent;
            border: none;
            outline: none;
            font-size: 1em;
            color: #fff;
            padding: 10px 5px;
            /* Adjust padding as needed */
            resize: none;
            /* Prevent resizing of textarea */
            transition: .5s ease;
        }

        .input-box textarea:focus,
        .input-box textarea:valid {
            color: #00f7ff;
            /* Change color on focus */
            text-shadow: 0 0 5px #00f7ff;
            /* Add text shadow on focus */
        }

        .input-check:checked~.input-box textarea {
            color: #00f7ff;
            /* Change color when checkbox is checked */
            text-shadow: 0 0 5px #00f7ff;
            /* Add text shadow when checkbox is checked */
        }

        .input-box .icon {
            position: absolute;
            right: 8px;
            color: #fff;
            font-size: 1.2em;
            line-height: 57px;
            transition: .5s ease;
        }

        .input-check:checked~.input-box .icon {
            color: #00f7ff;
            filter: drop-shadow(0 0 5px #00f7ff);
        }

        .input-box select {
            width: 100%;
            background: transparent;
            border: none;
            outline: none;
            font-size: 1em;
            color: #fff;
            padding: 10px 5px;
            /* Adjust padding as needed */
            resize: none;
            /* Prevent resizing of textarea */
            transition: .5s ease;
        }

        .input-box select:focus,
        .input-box select:valid {
            color: #00f7ff;
            /* Change color on focus */
            text-shadow: 0 0 5px #00f7ff;
            /* Add text shadow on focus */
        }

        .input-check:checked~.input-box select {
            color: #00f7ff;
            /* Change color when checkbox is checked */
            text-shadow: 0 0 5px #00f7ff;
            /* Add text shadow when checkbox is checked */
        }

        .input-box .icon {
            position: absolute;
            right: 8px;
            color: #fff;
            font-size: 1.2em;
            line-height: 57px;
            transition: .5s ease;
        }

        .input-check:checked~.input-box .icon {
            color: #00f7ff;
            filter: drop-shadow(0 0 5px #00f7ff);
        }
    </style>
</head>

<body>
    <div class="login-box">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="adminid" value="<?php echo htmlspecialchars($_GET['adminid']); ?>">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($_GET['id']); ?>">

            <input type="checkbox" class="input-check" id="input-check">
            <label for="input-check" class="toggle">
                <span class="text off">off</span>
                <span class="text on">on</span>
            </label>
            <div class="light"></div>

            <h2>Modify Ad</h2>
            <div class="input-box">
                <span class="icon">
                    <ion-icon name="mail"></ion-icon>
                </span>
                <input type="text" name="title" value="<?php echo htmlspecialchars($title); ?>" required>
                <label>Title</label>
                <div class="input-line"></div>
            </div>
            <div class="input-box">
                <span class="icon">
                    <ion-icon name="lock-closed"></ion-icon>
                </span>
                <textarea name="description" required><?php echo "Old Description: " . htmlspecialchars($description); ?></textarea>
                <div class="input-line"></div>
            </div>
            <div class="input-box">
                <span class="icon">
                    <ion-icon name="image"></ion-icon>
                </span>
                <img src="<?php echo htmlspecialchars($image_url); ?>" alt="Old Ad Image" width="100">
                <input type="file" name="image">
                <label>Update Image</label>
                <div class="input-line"></div>
            </div>
            <div class="input-box">
                <span class="icon">
                    <ion-icon name="code"></ion-icon>
                </span>
                <select name="ads_type" required>
                    <?php
                    $options = array("aliexpressorder", "redotpaycard", "europeanaddress", "wisecard", "currencyexchange");
                    foreach ($options as $option) {
                        $selected = ($option == $ads_type) ? 'selected' : '';
                        echo '<option value="' . $option . '" ' . $selected . '>' . ucfirst($option) . '</option>';
                    }
                    ?>
                </select>
                <div class="input-line"></div>
            </div>
            <button type="submit" name="submit" onclick="return confirm('Are You Sure To Update This New Ads After Click in Yes You Back Derectly To Admin Page');">Update Ads</button>
        </form>

    </div>

    <!-- Add your JavaScript scripts or external links here -->
</body>

</html>
<?php
include("database.php");

if (isset($_POST["submit"])) {
    // Process form data
    $title = $_POST["title"];
    $description = $_POST["description"];
    $ads_type = $_POST["ads_type"];
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
        $adsid = $ad_id;
        $admin = $admin_id;
        $sql_update = "UPDATE ads SET title='$title', description='$description', image_url='$image_url', ads_type='&ads_type' WHERE id='$adsid'";
        if (mysqli_query($conn, $sql)) {
            // Redirect to a page after successful insertion
            header("Location: /access/admin_file/index.php?adminid=" . $admin);
            exit(); // Terminate script after redirection
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Failed to upload image.";
    }
}

mysqli_close($conn); // Close database connection
?>