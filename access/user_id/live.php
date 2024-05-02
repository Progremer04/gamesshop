<?php
// Include your database connection file here
include("database.php");
$userid = $_GET["userid"]; // Corrected typo here

if(isset($_POST["query"]))
{
    // Sanitize the search query to prevent SQL injection
    $search = mysqli_real_escape_string($conn, $_POST["query"]);

    // SQL query to search across all tables
    $sql = "SELECT 
                'digital_codes' AS category,
                digital_codes.id AS id,
                digital_codes.title AS title,
                digital_codes.description AS description,
                digital_codes.price AS price,
                digital_codes.image_url AS image
            FROM 
                digital_codes
            WHERE 
                digital_codes.title LIKE '%$search%' OR
                digital_codes.description LIKE '%$search%' OR
                digital_codes.price LIKE '%$search%'
            UNION ALL
            SELECT 
                'favorite_game' AS category,
                favorite_game.id AS id,
                favorite_game.title AS title,
                favorite_game.description AS description,
                favorite_game.price AS price,
                favorite_game.image_url AS image
            FROM 
                favorite_game
            WHERE 
                favorite_game.title LIKE '%$search%' OR
                favorite_game.description LIKE '%$search%' OR
                favorite_game.price LIKE '%$search%'
            UNION ALL
            SELECT 
                'gift_card' AS category,
                gift_card.id AS id,
                gift_card.title AS title,
                gift_card.description AS description,
                gift_card.price AS price,
                gift_card.image_url AS image
            FROM 
                gift_card
            WHERE 
                gift_card.title LIKE '%$search%' OR
                gift_card.description LIKE '%$search%' OR
                gift_card.price LIKE '%$search%'
            UNION ALL
            SELECT 
                'subscriptions' AS category,
                subscriptions.id AS id,
                subscriptions.name AS title,
                subscriptions.time_subscriptions AS description,
                subscriptions.price AS price,
                NULL AS image
            FROM 
                subscriptions
            WHERE 
                subscriptions.name LIKE '%$search%' OR
                subscriptions.time_subscriptions LIKE '%$search%' OR
                subscriptions.price LIKE '%$search%'";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check for errors
    if(!$result) {
        echo "Error: " . mysqli_error($conn);
        exit; // Stop execution if there's an error
    }

    // Check if there are any results
    if(mysqli_num_rows($result) > 0)
    {
        // Output table headers
        echo "<div class='table-responsive'>";
        echo "<table class='table table-bordered'>";
        echo "<thead><tr><th>ID</th><th>Category</th><th>Product</th><th>Description</th><th>Price</th><th>Image</th><th>Add to Cart</th></tr></thead>";
        $i=1;
        // Loop through results and display them
        while($row = mysqli_fetch_array($result))
        {
            echo "<tr>";
            echo "<td>".$i."</td>";
            echo "<td>".$row['category']."</td>";
            echo "<td>".$row['title']."</td>";
            echo "<td>".$row['description']."</td>";
            echo "<td>".$row['price']."</td>";
            echo "<td>";
            if(!empty($row['image'])) {
                echo "<img src='".$row['image']."' alt='' class='img-fluid'>";
            } else {
                echo "N/A";
            }
            echo "</td>";
            // Check if the price is available before displaying the "Add to Cart" button
            echo "<td>";
            if(!empty($row['price'])) {
                echo "<a href='/access/user_id/addtocardshearch.php?userid=".$userid."&id=".$row['id']."&typeprudect=".$row['category']."' class='btn2'>ADD TO CART</a>";
            } else {
                echo "Price not available";
            }
            echo "</td>";
            echo "</tr>";
            $i++;
        }
        echo "</table>";
        echo "</div>";
    }
    else
    {
        echo '<p class="text-center">No results found</p>';
    }
}
?>
