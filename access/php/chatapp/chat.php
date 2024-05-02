<?php
session_start();
error_reporting(E_ALL);
// Include database connection
include 'database.php';

// Initialize variables with default values
$sender_id = $_GET['sender_id'] ?? '';
$receiver_id = $_GET['receiver_id'] ?? '';

$bool = false;
if (isset($_GET['type_order']) && isset($_GET['orderid'])) {
    if (isset($_GET['type_order']) && isset($_GET['orderid'])) {
        if ($_GET['type_order'] === "alexpress") {
            $orderid = $_GET['orderid'];
            $sql = "SELECT ao.*, u.firstname, u.lastname, u.gmail AS user_email
            FROM aliexpressorder ao 
            LEFT JOIN users u ON ao.UserID = u.id
            WHERE ao.OrderID='$orderid'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            $message_sender = '<div class="message message-right">';
            $message_sender .= "<pre>Hello, my name is " . $row['firstname'] . " " . $row['lastname'] . ".<br>";
            $message_sender .= "I am interested in purchasing the following product:<br>";
            $message_sender .= "- Product Name: " . $row['ProductName'] . "<br>";
            $message_sender .= "- Quantity: " . $row['Quantity'] . "<br>";
            $message_sender .= "Please find more details about the product in the link below:<br>";
            $message_sender .= "\n" . $row['Link'] . "\n";
            $message_sender .= "<br style:padding:20px>Thank you.</pre></div>";

            // Insert message  of order into the database
            $sql_insert = "INSERT INTO messages (sender_id, receiver_id, message,edit) VALUES (?, ?, ?,?)";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param("iisi", $sender_id, $receiver_id, $message_sender, $bool);
            $stmt_insert->execute();
            //Insert message of admin into the database
            $message_admin = '<div class="message message-left">';
            $message_admin .= "<p>We See Your Alixpress Commond and We Gonna Analyse it at soon is Posible</p></div>";
            // Insert message  of order into the database
            $sql_insert = "INSERT INTO messages (sender_id, receiver_id, message,edit) VALUES (?, ?, ?,?)";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param("iisi", $receiver_id, $sender_id, $message_admin, $bool);
            $stmt_insert->execute();
            // Redirect to prevent form resubmission
            header('Location: ' . $_SERVER['PHP_SELF'] . '?sender_id=' . $sender_id . '&receiver_id=' . $receiver_id);
            exit();
        }else         if ($_GET['type_order'] === "currencyexchange") {
            $orderid = $_GET['orderid'];
            $sql = "SELECT ao.*, u.firstname, u.lastname, u.gmail AS user_email
            FROM currencyexchange ao 
            LEFT JOIN users u ON ao.UserID = u.id
            WHERE ao.ExchangeID='$orderid'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
             // Construct the message for the currency exchange order
             $message_sender = '<div class="message message-right">';
             $message_sender .= "<pre>Hello, my name is " . $row['firstname'] . " " . $row['lastname'] . ".<br>";
             $message_sender .= "I am interested in purchasing the following amount of dollars:<br>";
             $message_sender .= "- Quantity of Dollars: $" . number_format($row['ConvertedAmount'], 2) . "<br>";
             $message_sender .= "- My Binance ID: " . $row['id_bience'] . "<br>";
             $message_sender .= "Please find the details of my wallet below:<br>";
             $message_sender .= "\n \n". $row['link_bience'] . "\n \n";
             $message_sender .= "<br style:padding:20px>Thank you.</pre></div>";

            // Insert message  of order into the database
            $sql_insert = "INSERT INTO messages (sender_id, receiver_id, message,edit) VALUES (?, ?, ?,?)";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param("iisi", $sender_id, $receiver_id, $message_sender, $bool);
            $stmt_insert->execute();
            //Insert message of admin into the database
            $message_admin = '<div class="message message-left">';
            $message_admin .= "<p>We See Your Currency Exchange Commond and We Gonna Analyse it at soon is Posible</p></div>";
            // Insert message  of order into the database
            $sql_insert = "INSERT INTO messages (sender_id, receiver_id, message,edit) VALUES (?, ?, ?,?)";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param("iisi", $receiver_id, $sender_id, $message_admin, $bool);
            $stmt_insert->execute();
            // Redirect to prevent form resubmission
            header('Location: ' . $_SERVER['PHP_SELF'] . '?sender_id=' . $sender_id . '&receiver_id=' . $receiver_id);
            exit();
        }else         if ($_GET['type_order'] === "europeanaddress") {
            $orderid = $_GET['orderid'];
            $sql = "SELECT ao.*, u.firstname, u.lastname, u.gmail AS user_email
            FROM europeanaddress ao 
            LEFT JOIN users u ON ao.UserID = u.id
            WHERE ao.id='$orderid'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
             // Construct the message for the currency exchange order
             $message_sender = '<div class="message message-right">';
             $message_sender .= "<pre>Hello, my name is " . $row['firstname'] . " " . $row['lastname'] . ".<br>";
             $message_sender .= "I am interested in Getting  the following address :<br>";
             $message_sender .= "- Address: " . $row['address'] . "<br>";
             $message_sender .= "<br style:padding:20px>Thank you.</pre></div>";

            // Insert message  of order into the database
            $sql_insert = "INSERT INTO messages (sender_id, receiver_id, message,edit) VALUES (?, ?, ?,?)";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param("iisi", $sender_id, $receiver_id, $message_sender, $bool);
            $stmt_insert->execute();
            //Insert message of admin into the database
            $message_admin = '<div class="message message-left">';
            $message_admin .= "<p>We See Your European Address Commond and We Gonna Analyse it at soon is Posible</p></div>";
            // Insert message  of order into the database
            $sql_insert = "INSERT INTO messages (sender_id, receiver_id, message,edit) VALUES (?, ?, ?,?)";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param("iisi", $receiver_id, $sender_id, $message_admin, $bool);
            $stmt_insert->execute();
            // Redirect to prevent form resubmission
            header('Location: ' . $_SERVER['PHP_SELF'] . '?sender_id=' . $sender_id . '&receiver_id=' . $receiver_id);
            exit();
        }else         if ($_GET['type_order'] === "redotpaycard") {
            $orderid = $_GET['orderid'];
            $sql = "SELECT ao.*, u.firstname, u.lastname, u.gmail AS user_email
            FROM redotpaycard ao 
            LEFT JOIN users u ON ao.UserID = u.id
            WHERE ao.CardID='$orderid'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
             // Construct the message for the currency exchange order
             $message_sender = '<div class="message message-right">';
             $message_sender .= "<pre>Hello, my name is " . $row['firstname'] . " " . $row['lastname'] . ".<br>";
             $message_sender .= "I am interested in Activing My redotpay card  by  the following Information :<br>";
             $message_sender .= "- Address Email: " . $row['email'] . "<br>";
             $message_sender .= "- Password Email: " . $row['password'] . "<br>";
             $message_sender .= "<br style:padding:20px>Thank you.</pre></div>";

            // Insert message  of order into the database
            $sql_insert = "INSERT INTO messages (sender_id, receiver_id, message,edit) VALUES (?, ?, ?,?)";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param("iisi", $sender_id, $receiver_id, $message_sender, $bool);
            $stmt_insert->execute();
            //Insert message of admin into the database
            $message_admin = '<div class="message message-left">';
            $message_admin .= "<p>We See Your Redotpay Card Commond and We Gonna Analyse it at soon is Posible</p></div>";
            // Insert message  of order into the database
            $sql_insert = "INSERT INTO messages (sender_id, receiver_id, message,edit) VALUES (?, ?, ?,?)";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param("iisi", $receiver_id, $sender_id, $message_admin, $bool);
            $stmt_insert->execute();
            // Redirect to prevent form resubmission
            header('Location: ' . $_SERVER['PHP_SELF'] . '?sender_id=' . $sender_id . '&receiver_id=' . $receiver_id);
            exit();
        }else         if ($_GET['type_order'] === "wisecard") {
            $orderid = $_GET['orderid'];
            $sql = "SELECT ao.*, u.firstname, u.lastname, u.gmail AS user_email
            FROM wisecard ao 
            LEFT JOIN users u ON ao.UserID = u.id
            WHERE ao.CardID='$orderid'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
             // Construct the message for the currency exchange order
             $message_sender = '<div class="message message-right">';
             $message_sender .= "<pre>Hello, my name is " . $row['firstname'] . " " . $row['lastname'] . ".<br>";
             $message_sender .= "I am interested in Activing My wise card  by  the following Information :<br>";
             $message_sender .= "- Address Email: " . $row['email'] . "<br>";
             $message_sender .= "- Password Email: " . $row['password'] . "<br>";
             $message_sender .= "<br style:padding:20px>Thank you.</pre></div>";

            // Insert message  of order into the database
            $sql_insert = "INSERT INTO messages (sender_id, receiver_id, message,edit) VALUES (?, ?, ?,?)";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param("iisi", $sender_id, $receiver_id, $message_sender, $bool);
            $stmt_insert->execute();
            //Insert message of admin into the database
            $message_admin = '<div class="message message-left">';
            $message_admin .= "<p>We See Your Wise Card Commond and We Gonna Analyse it at soon is Posible</p></div>";
            // Insert message  of order into the database
            $sql_insert = "INSERT INTO messages (sender_id, receiver_id, message,edit) VALUES (?, ?, ?,?)";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param("iisi", $receiver_id, $sender_id, $message_admin, $bool);
            $stmt_insert->execute();
            // Redirect to prevent form resubmission
            header('Location: ' . $_SERVER['PHP_SELF'] . '?sender_id=' . $sender_id . '&receiver_id=' . $receiver_id);
            exit();
        }    }
}
// Fetch messages from the database
$sql_messages = "SELECT m.*, 
                        CASE 
                            WHEN m.sender_id = ? THEN ua.firstname
                            ELSE uu.firstname
                        END as sender_firstname,
                        CASE 
                            WHEN m.sender_id = ? THEN ua.lastname
                            ELSE uu.lastname
                        END as sender_lastname,
                        CASE 
                            WHEN m.sender_id = ? THEN uu.firstname
                            ELSE ua.firstname
                        END as receiver_firstname,
                        CASE 
                            WHEN m.sender_id = ? THEN uu.lastname
                            ELSE ua.lastname
                        END as receiver_lastname
                FROM messages m 
                LEFT JOIN users ua ON m.sender_id = ua.id
                LEFT JOIN users uu ON m.receiver_id = uu.id
                WHERE (m.sender_id = ? AND m.receiver_id = ?) 
                OR (m.sender_id = ? AND m.receiver_id = ?) 
                ORDER BY m.created_at ASC";
$stmt_messages = $conn->prepare($sql_messages);
$stmt_messages->bind_param("iiiiiiii", $sender_id, $sender_id, $sender_id, $sender_id, $sender_id, $receiver_id, $receiver_id, $sender_id);
$stmt_messages->execute();
$result_messages = $stmt_messages->get_result();

// Fetch receiver details
if (isset($_SESSION['admin_id']) && $receiver_id == $_SESSION['admin_id']) {
    $sql_receiver = "SELECT * FROM admins WHERE id = ?";
} else {
    $sql_receiver = "SELECT * FROM users WHERE id = ?";
}

$stmt_receiver = $conn->prepare($sql_receiver);
$stmt_receiver->bind_param("i", $receiver_id);
$stmt_receiver->execute();
$result_receiver = $stmt_receiver->get_result();
$receiver = $result_receiver->fetch_assoc();

// Handle incoming messages
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['message'])) {
        $message = nl2br($_POST['message']); // Allow multiple lines in the message

        // Handle file upload
        $file_path = '';
        if (isset($_FILES['file']) && $_FILES['file']['error'] === 0) {
            $uploads_dir = 'uploads/';
            $file_name = basename($_FILES['file']['name']);
            $file_path = $uploads_dir . $file_name;
            if (move_uploaded_file($_FILES['file']['tmp_name'], $file_path)) {
                // File uploaded successfully
            } else {
                // Error uploading file
            }
        }

        // Insert message into the database
        $sql_insert = "INSERT INTO messages (sender_id, receiver_id, message, file_path) VALUES (?, ?, ?, ?)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("iiss", $sender_id, $receiver_id, $message, $file_path);
        $stmt_insert->execute();

        // Redirect to prevent form resubmission
        header('Location: ' . $_SERVER['PHP_SELF'] . '?sender_id=' . $sender_id . '&receiver_id=' . $receiver_id);
        exit();
    } elseif (isset($_POST['edit_message_id']) && isset($_POST['edited_message'])) {
        // Edit message logic
        $edited_message_id = $_POST['edit_message_id'];
        $edited_message_content = nl2br($_POST['edited_message']);

        // Update message content in the database
        $sql_update = "UPDATE messages SET message = ? WHERE id = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("si", $edited_message_content, $edited_message_id);
        if ($stmt_update->execute()) {
            // Redirect to prevent form resubmission
            header('Location: ' . $_SERVER['PHP_SELF'] . '?sender_id=' . $sender_id . '&receiver_id=' . $receiver_id);
            exit();
        } else {
            // Handle database update error
            echo "Error updating message.";
        }
    } elseif (isset($_POST['delete_message_id'])) {

        $delete_message_id = $_POST['delete_message_id'];

        // Delete message and associated files from the database
        $sql_delete_message = "DELETE FROM messages WHERE id = ?";
        $stmt_delete_message = $conn->prepare($sql_delete_message);
        $stmt_delete_message->bind_param("i", $delete_message_id);
        if ($stmt_delete_message->execute()) {
            // Redirect to prevent form resubmission
            header('Location: ' . $_SERVER['PHP_SELF'] . '?sender_id=' . $sender_id . '&receiver_id=' . $receiver_id);
            exit();
        } else {
            // Handle database delete error
            echo "Error deleting message.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat with <?php echo isset($receiver['firstname']) ? $receiver['firstname'] . ' ' . $receiver['lastname'] : 'Admin'; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
    <link rel="shortcut icon" href="/access/img/logo.jpg" type="image/x-icon">
    <style>
        /* Global styles */
        /* Global styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #0a0a0a;
            /* Deep space black */
            color: #fff;
            /* White text */
        }

        /* Chat container */
        .chat-container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-image: radial-gradient(#0a0a0a 1px, transparent 1px), radial-gradient(#0a0a0a 1px, transparent 1px);
            background-size: 20px 20px;
            background-position: 0 0, 10px 10px;
        }

        /* Chat header */
        .chat-header {
            background-color: #020202;
            /* Darker space black */
            color: #00d8ff;
            /* Neon blue text */
            padding: 20px;
            text-align: center;
            border-bottom: 2px solid #00d8ff;
            /* Neon blue border bottom */
        }

        /* Chat main area */
        .chat-main {
            flex-grow: 1;
            overflow-y: auto;
            padding: 20px;
        }

        /* Chat messages */
        .chat-messages {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        /* Individual message */
        .message {
            padding: 15px;
            border-radius: 15px;
            max-width: 90%;
            /* Increased max-width for messages */
            animation: fadeIn 0.5s ease;
            /* Fade in animation */
            overflow:visible;
        }

        /* Sender's message */
        .message-right {
            background-color: #212121;
            /* Deep space gray for sender's messages */
            align-self: flex-end;
        }

        /* Receiver's message */
        .message-left {
            background-color: #383838;
            /* Darker deep space gray for receiver's messages */
            align-self: flex-start;
        }

        /* Send button */
        .btn {
            background-color: #020202;
            /* Neon blue send button */
            color: #fff;
            border: none;
            padding: 15px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            font-weight: bolder;
            text-shadow: 1px 0px 5px #fff;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            /* Smooth hover transition */
        }

        /* Hover effect on send button */
        .btn:hover {
            background-color: #00b8cc;
            /* Darker neon blue on hover */
        }

        /* Animation for message fade in */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Chat form container */
        .chat-form-container {
            display: flex;
            flex-direction: column;
            border-top: 2px solid #00d8ff;
            /* Neon blue border top */
            width: 100%;
            padding: 20px;
            background-color: #020202;
            /* Darker space black */
        }

        /* Input text area */
        .input-text {
            width: calc(100% - 30px);
            padding: 15px;
            border-radius: 5px;
            border: 1px solid #00d8ff;
            /* Neon blue border */
            color: #fff;
            /* White text color */
            background-color: #212121;
            /* Darker deep space gray background */
            margin-bottom: 10px;
        }

        /* File input */
        input[type="file"] {
            display: none;
            /* Hide the file input */
        }

        /* Upload button */
        .upload-button {
            background-color: #00d8ff;
            /* Neon blue upload button */
            color: #fff;
            /* White text color */
            border: none;
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            /* Smooth hover transition */
            margin-bottom: 10px;
        }

        /* Hover effect on upload button */
        .upload-button:hover {
            background-color: #00b8cc;
            /* Darker neon blue on hover */
        }

        /* Lightbox overlay customization */
        .ekko-lightbox-container .modal-dialog {
            max-width: 90%;
        }

        /* Transparent overlay */
        .lightbox-overlay {
            background-color: rgba(10, 10, 10, 0.9) !important;
        }
    </style>
</head>

<body>
    <div class="chat-container">
        <header class="chat-header">
            <h1>Chat with <?php echo isset($receiver['firstname']) ? $receiver['firstname'] . ' ' . $receiver['lastname'] : 'Admin'; ?></h1>
            <h4>Chat Automatically Refreshes Every 2 Minutes</h4>
        </header>
        <main class="chat-main">
            <div class="chat-messages" id="chat-box">
                <?php
                // Display fetched messages
                while ($row = $result_messages->fetch_assoc()) {
                    if ($row['sender_id'] == $sender_id) {
                        // Display sender's message with sender's name
                        echo '<div class="message message-right">';
                    } else {
                        // Display receiver's message with receiver's name
                        echo '<div class="message message-left">';
                    }

                    // Display message content
                    // Check if message contains any links
                    $message_content = $row['message'];
                    $message_has_link = preg_match('/\b(?:https?|ftp):\/\/\S+\b/', $message_content);
                    if ($message_has_link) {
                        // If message contains links, make them clickable
                        $message_content = preg_replace('/\b(?:https?|ftp):\/\/\S+\b/', '<a href="$0" target="_blank">$0</a>', $message_content);
                    }
                    echo '<p>' . $message_content . '</p>';

                    // Display file if available
                    if (!empty($row['file_path'])) {
                        $file_path = $row['file_path'];
                        $file_extension = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
                        if (in_array($file_extension, array('jpg', 'jpeg', 'png', 'gif', 'jfif'))) {
                            // Display image with lightbox
                            echo '<a href="' . $file_path . '" data-lightbox="file-' . $row['id'] . '"target="_blank"><img src="' . $file_path . '" style="max-width: 100%; max-height: 300px;"></a><br>';
                        } elseif (in_array($file_extension, array('mp4', 'avi', 'mov'))) {
                            // Display video with lightbox
                            echo '<a href="' . $file_path . '" data-lightbox="file-' . $row['id'] . '"target="_blank"><video width="320" height="240" controls><source src="' . $file_path . '" type="video/mp4">Your browser does not support the video tag.</video></a><br>';
                        } else {
                            // Display download link for other file types
                            echo '<a href="' . $file_path . '" class="download-button" target="_blank">Download File</a><br>';
                        }
                    }
                    echo '<p>' . $row['created_at'] . '</p>';

                    if ($row['sender_id'] == $sender_id) {
                        // Check if the message was sent automatically by type_order and orderid
                        $is_auto_generated = $row['edit'];
                        // Add edit and delete buttons if the message is not automatically generated
                        if ($row['edit'] === 1) {
                            echo '<div class="edit-delete-buttons">';
                            echo '<form method="post" class="edit-delete-form"><input type="hidden" name="edit_message_id" value="' . $row['id'] . '">';
                            echo '<textarea name="edited_message">' . strip_tags($row['message']) . '</textarea><br>';
                            echo '<button type="submit">Edit</button></form>';
                            echo '<form method="post" class="edit-delete-form"><input type="hidden" name="delete_message_id" value="' . $row['id'] . '">';
                            echo '<button type="submit">Delete</button></form>';
                            echo '</div>';
                        }
                    }
                    // Display the rest of the message content
                    echo '</div>'; // Close the message container

                }
                ?>
            </div>
        </main>
        <div class="chat-form-container">
            <form id="chat-form" method="post" enctype="multipart/form-data">
                <textarea name="message" id="message" class="input-text" autocomplete="off" placeholder="Type your message..."></textarea>
                <label for="file" class="upload-button">Upload File</label>
                <input type="file" name="file" id="file">
                <button type="submit" class="btn">Send</button>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <script>
        // document.addEventListener('DOMContentLoaded', function () {
        //     // Enable lightbox
        //     lightbox.option({
        //         'resizeDuration': 200,
        //         'wrapAround': true,
        //         'disableScrolling': true,
        //         'alwaysShowNavOnTouchDevices': true
        //     });

        //     // Close lightbox when clicking outside the image/video
        //     document.querySelector('.ekko-lightbox-container').addEventListener('click', function (event) {
        //         if (event.target === this) {
        //             window.open('<?php echo $_SERVER['PHP_SELF'] . '?sender_id=' . $sender_id . '&receiver_id=' . $receiver_id; ?>', '_blank');
        //         }
        //     });
        // });

        // // AJAX to refresh page every 2 minutes
        // setInterval(function(){
        //     location.reload();
        // }, 120000);
    </script>
</body>

</html>