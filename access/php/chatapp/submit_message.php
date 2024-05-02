<?php
session_start();
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $sender_id = $_GET['sender_id'];
    $receiver_id = $_GET['receiver_id'];
    $message = $_POST['message'];

    // Check if file is uploaded
    if(isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $file_name = $_FILES['file']['name'];
        $file_tmp_name = $_FILES['file']['tmp_name'];
        $file_type = $_FILES['file']['type'];
        $file_size = $_FILES['file']['size'];
        
        // Check file size
        if ($file_size > 5242880) { // 5MB
            echo "File size exceeds maximum limit (5MB).";
            exit;
        }

        // Move uploaded file to desired directory
        $upload_directory = "/path/to/upload/directory/";
        $file_path = $upload_directory . $file_name;
        if (!move_uploaded_file($file_tmp_name, $file_path)) {
            echo "Failed to move uploaded file.";
            exit;
        }
    } else {
        $file_path = null;
    }

    // Insert message into database
    $sql = "INSERT INTO messages (sender_id, receiver_id, message, file_path) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiss", $sender_id, $receiver_id, $message, $file_path);

    if ($stmt->execute()) {
        echo "Message sent successfully.";
    } else {
        echo "Error: " . $conn->error;
    }

    // Close database connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
