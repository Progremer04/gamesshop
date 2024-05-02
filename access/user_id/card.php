<?php
// Include the database connection file
include("database.php");

// Get the user ID from the URL parameter
$user_id = $_GET['id'];

// Check if the delete button is clicked
if (isset($_GET['delete_id'])) {
    // Get the product ID to delete
    $delete_id = $_GET['delete_id'];

    // SQL query to delete the item from the cart
    $delete_sql = "DELETE FROM card WHERE UserID = ? AND id = ?";
    $delete_stmt = $conn->prepare($delete_sql);
    $delete_stmt->bind_param("ii", $user_id, $delete_id);
    $delete_stmt->execute();

    // Redirect to refresh the page after deletion
    header('Location: ' . $_SERVER['PHP_SELF'] . '?id=' . $user_id);
    exit();
}

// SQL query to retrieve items in the cart for the specified user
$sql = "SELECT card.*, 
               favorite_game.id AS favorite_game_id,
               digital_codes.id AS digital_codes_id,
               gift_card.id AS gift_card_id,
               subscriptions.id AS subscriptions_id
        FROM card 
        LEFT JOIN favorite_game ON card.product_id = favorite_game.id AND card.type_pruduct = 1
        LEFT JOIN digital_codes ON card.product_id = digital_codes.id AND card.type_pruduct = 2
        LEFT JOIN gift_card ON card.product_id = gift_card.id AND card.type_pruduct = 3
        LEFT JOIN subscriptions ON card.product_id = subscriptions.id AND card.type_pruduct = 4
        WHERE card.UserID = ?";

// Prepare and bind the SQL statement
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if there are any items in the cart
if ($result->num_rows > 0) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shopping Cart</title>
        <!-- Tailwind CSS -->
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="logo.jpg" type="image/x-icon">
        <!-- Custom CSS -->
        <style>
            /* Custom CSS for Shopping Cart page */

            /* Table styles */
            .table {
                width: 100%;
                border-collapse: collapse;
                border-radius: 0.5rem;
                overflow: hidden;
            }

            .table th,
            .table td {
                padding: 1rem;
                text-align: left;
                border-bottom: 1px solid #e5e7eb;
            }

            .table th {
                background-color: #f3f4f6;
                font-weight: 600;
                text-transform: uppercase;
            }

            .table td {
                background-color: #ffffff;
            }

            /* Remove button styles */
            .btn-remove {
                background-color: transparent;
                border: none;
                cursor: pointer;
            }

            .btn-remove:focus {
                outline: none;
            }

            /* Button styles */
            .btn {
                display: inline-block;
                padding: 0.5rem 1rem;
                font-size: 1rem;
                font-weight: 600;
                text-align: center;
                text-decoration: none;
                color: #ffffff;
                background-color: #4b5563;
                border-radius: 0.375rem;
                transition: background-color 0.3s ease;
            }

            .btn:hover {
                background-color: #374151;
            }

            .btn-primary {
                background-color: #3b82f6;
            }

            .btn-success {
                background-color: #10b981;
            }

            .btn-danger {
                background-color: #ef4444;
            }

            /* Animation styles */
            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .fadeInUp {
                animation-name: fadeInUp;
                animation-duration: 0.5s;
            }
        </style>
    </head>

    <body class="bg-gray-100">
        <div class="container mx-auto py-8">
            <h1 class="text-3xl font-bold mb-4">Shopping Cart</h1>
            <div class="overflow-x-auto">
                <table class="table bg-white rounded-lg shadow-md">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Platform</th>
                            <th>Image</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()) {
                            // Retrieve additional information for each product
                            $product_id = $row['product_id'];
                            $type_pruduct = $row['type_pruduct'];

                            // Retrieve product details based on type
                            $query = "SELECT * FROM $type_pruduct WHERE id = ?";
                            $stmt2 = $conn->prepare($query);
                            $stmt2->bind_param("i", $product_id);
                            $stmt2->execute();
                            $product_result = $stmt2->get_result();
                            $product_row = $product_result->fetch_assoc();
                        ?>
                            <tr>
                                <td><?php echo $product_row['title']; ?></td>
                                <td><?php echo $product_row['description']; ?></td>
                                <td><?php echo $product_row['price']; ?></td>
                                <td><?php echo $product_row['platform']; ?></td>
                                <td><img src="<?php echo $product_row['image_url']; ?>" alt=""></td>
                                <td><a href="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $user_id . '&delete_id=' . $row['id']; ?>" class="btn btn-danger btn-remove">Delete</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="mt-8">
                <a href="/access/user_id/index.php?user_id=<?php echo $user_id; ?>" class="btn btn-primary mr-4">Back to Home</a>
                <a href="/access/php/chatapp/chat.php?sender_id=<?php echo $user_id; ?>&receiver_id=1&admin_id=1&type=card" class="btn btn-success">Go to Chat</a>
            </div>
        </div>
    </body>
    

    </html>

<?php
} else {
    echo "No items found in the shopping cart.";
}

// Close prepared statements
$stmt->close();

// Close the database connection
$conn->close();
?>