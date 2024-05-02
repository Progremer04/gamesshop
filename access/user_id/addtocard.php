<?php
include("database.php");

// Get parameters from the URL
$userid = $_GET['userid'];
$productid = $_GET['id'];
$typeproduct = $_GET['typeprudect']; // Corrected the variable name

// Adjusted SQL query with the correct column name
$sql = "INSERT INTO card (UserID, product_id, type_pruduct) VALUES ('$userid', '$productid', '$typeproduct')";

if(mysqli_query($conn, $sql)) {
    // Redirect to index.php on successful insertion
    header("Location: /access/user_id/index.php?user_id=$userid");
    exit();
} else {
    // Display error message if insertion fails
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
