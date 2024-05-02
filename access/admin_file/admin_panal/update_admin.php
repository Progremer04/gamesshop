<?php
include("database.php");
if (isset($_POST['submit'])) {
    // Get the ID of the user to update
    $id = $_POST['id'];

    // Retrieve the updated values from the form fields
    $updated_firstname = $_POST['firstname'];
    $updated_lastname = $_POST['lastname'];
    $updated_gmail = $_POST['gmail'];
    $pword = $_POST['password']; // Hash the password

    // Include the database connection file
    include("database.php");

    // Prepare the SQL query to update the user
    $sql = "UPDATE admins SET password='$pword',firstname='$updated_firstname', lastname='$updated_lastname', gmail='$updated_gmail' WHERE id='$id'";

    // Execute the SQL query
    if (mysqli_query($conn, $sql)) {
        // Redirect to a success page or display a success message
        header("Location: /access/admin_file/index.php?adminid=$id");
        exit; // Stop script execution after redirection
    } else {
        // If there's an error, display the error message
        echo "Error updating user: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="/access/login_form/style.css">
    <title>Update Admin</title>
    <link rel="shortcut icon" href="/access/img/logo.jpg" type="image/x-icon">
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="" method="post"> <!-- Fixed the form action -->
                <h1>Update Account</h1>
                <div class="social-icons">
                    <a href="#" class="icon" style="visibility: hidden;"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon" style="visibility: hidden;"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon" style="visibility: hidden;"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon" style="visibility: hidden;"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>"> <!-- Fixed the value of ID -->
                <input type="text" name="firstname" placeholder="First Name">
                <input type="text" name="lastname" placeholder="Last Name">
                <input type="email" name="gmail" placeholder="Gmail">
                <input type="password" name="password" placeholder="Password">
                <button type="submit" name="submit"> Update </button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form action="" method="post">
                <h1>Old Info</h1>
                <div class="social-icons">
                    <a href="#" class="icon" style="visibility: hidden;"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon" style="visibility: hidden;"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon" style="visibility: hidden;"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon" style="visibility: hidden;"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>

                <?php
                include("database.php");

                // Check if the 'id' parameter is set in the URL
                if (isset($_GET["id"])) {
                    // Sanitize the ID to prevent SQL injection
                    $id = mysqli_real_escape_string($conn, $_GET["id"]);
                    //SELECT * FROM `admins`
                    // Prepare the SQL query
                    $sql = "SELECT * FROM admins WHERE id='$id'";

                    // Execute the query
                    $result = mysqli_query($conn, $sql);

                    // Check if the query was successful
                    if ($result) {
                        // Check if at least one row is returned
                        if (mysqli_num_rows($result) > 0) {
                            // Fetch the data from the result set
                            $row = mysqli_fetch_assoc($result);
                            // Output or process the retrieved data as needed
                            $firstname = $row["firstname"];
                            $lastname = $row["lastname"];
                            $gmail = $row["gmail"];

                            // Display the first name, last name, and email in input fields
                            echo '<input type="text" value="' . $firstname . '" readonly>';
                            echo '<input type="text" value="' . $lastname . '" readonly>';
                            echo '<input type="email" value="' . $gmail . '" readonly>';

                            // Add more fields as needed
                        } else {
                            echo "No user found with the specified ID.";
                        }
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }

                    // Free the result set
                    mysqli_free_result($result);
                } else {
                    echo "ID parameter not provided.";
                }

                // Close the database connection
                mysqli_close($conn);
                ?>
            </form>


        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>See Old Info </p>
                    <button class="hidden" id="login">See Old Info</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Click In Button To Go To Update Your Profile</p>
                    <button class="hidden" id="register">Update My Profile</button>
                </div>
            </div>
        </div>
    </div>

    <script src="/access/login_form/script.js"></script>
</body>

</html>