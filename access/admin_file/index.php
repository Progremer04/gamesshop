<?php

include("database.php");

$lastname="";
// Assume you have retrieved the user's ID from somewhere, such as session or request parameters
if (isset($_GET['adminid'])) {
    $adminid = $_GET['adminid']; // Assuming user ID is stored in a session variable

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("SELECT id FROM admins WHERE id = ?");
    $stmt->bind_param("i", $adminid);

    // Execute the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();
    if ($result->num_rows <= 0) {
        // User does not exist, they are not signed up
        header("Location: /access/login_form/index.php");
        exit; // Stop script execution after redirection
    }
    $stmt->close();
} else {
    // Redirect to login page if user ID is not set in session
    header("Location: /access/login_form/index.php");
    exit; // Stop script execution after redirection
}

$query = "SELECT firstname, lastname FROM admins WHERE id = '$adminid'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    // Retrieve first name and last name from the fetched row
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
}
// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TransaVersa Shop</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/access/style.css">
    <link rel="shortcut icon" href="logo.jpg" type="image/x-icon">
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>


<body>
    <header>
        <div class="nav container">
            <!-- Logo -->
            <a href="index.html" class="logo">Game<snap>Shop</snap></a>
            <a class="logo">Hello <span><?php echo $firstname; ?></span> <span><?php echo $lastname; ?></span></a>
            <!-- Nav Icons -->
            <div class="nav-icons">
                <a href="/access/login_form/index.php">Log out</a>
                <a href="/access/admin_file/admin_panal/index.php?id=<?php echo $_GET['adminid']; ?>">Admin Panel</a>
                <div class="menu-icon">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                </div>
            </div>
            <!-- Menu -->
            <div class="menu">
                <img src="/access/img/logo.jpg" alt="cyberpank">
                <div class="navbar">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <a href="/access/login_form/index.php">Log out</a>

                    </ul>
                </div>

            </div>
        </div>
    </header>

    <main>

        <?php
        include('database.php');
        $query = "SELECT * FROM favorite_game";
        $result = mysqli_query($conn, $query);
        ?>

        <div class="carousel">

            <div class="carousel__items">
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <div class="carousel__item">
                        <img src="<?php echo $row['image_url']; ?>" alt="<?php echo $row['title']; ?>">
                        <li class="carousel__item-content">
                            <h2 class="carousel__item-title"><?php echo $row['title']; ?></h2>
                            <p class="carousel__item-description"><?php echo $row['description']; ?></p>
                            <ul class="carousel__item-details">
                                <li><?php echo $row['price']; ?></li>
                                <li><?php echo $row['platform']; ?></li>
                                <li><a href="/access/user_id/servise_redotpaycard.php?id=<?php echo $user_id; ?>" class="btn">Buy It</a></li>
                            </ul>
                    </div>
            </div>
        <?php endwhile; ?>
        </div>
        </div>



        <div class="ads_class">

        </div>
        <div class="categories mt-8 max-w-6xl mx-auto p-4">
            <h2 class="text-2xl font-bold mb-4 border-b-2 border-gray-300 pb-2">Categories:</h2>

            <div class="category mb-8">
                <h3 class="text-xl font-bold mb-2">Digital Codes</h3>
                <hr class="w-20 border-t-2 border-gray-400 mb-4">
                <ul class="text-lg">
                    <li><a href="#" class="text-blue-500 hover:underline">Item 1</a></li>
                    <li><a href="#" class="text-blue-500 hover:underline">Item 2</a></li>
                    <li><a href="#" class="text-blue-500 hover:underline">Item 3</a></li>
                </ul>
            </div>

            <div class="category mb-8">
                <h3 class="text-xl font-bold mb-2">Gift Cards</h3>
                <hr class="w-20 border-t-2 border-gray-400 mb-4">
                <ul class="text-lg">
                    <li><a href="#" class="text-blue-500 hover:underline">Item 1</a></li>
                    <li><a href="#" class="text-blue-500 hover:underline">Item 2</a></li>
                    <li><a href="#" class="text-blue-500 hover:underline">Item 3</a></li>
                </ul>
            </div>

            <div class="category mb-8">
                <h3 class="text-xl font-bold mb-2">Subscriptions</h3>
                <hr class="w-20 border-t-2 border-gray-400 mb-4">
                <ul class="text-lg">
                    <li><a href="#" class="text-blue-500 hover:underline">Item 1</a></li>
                    <li><a href="#" class="text-blue-500 hover:underline">Item 2</a></li>
                    <li><a href="#" class="text-blue-500 hover:underline">Item 3</a></li>
                </ul>
            </div>

            <div class="category mb-8">
                <h3 class="text-xl font-bold mb-2">PC Games</h3>
                <hr class="w-20 border-t-2 border-gray-400 mb-4">
                <ul class="text-lg">
                    <li><a href="#" class="text-blue-500 hover:underline">Item 1</a></li>
                    <li><a href="#" class="text-blue-500 hover:underline">Item 2</a></li>
                    <li><a href="#" class="text-blue-500 hover:underline">Item 3</a></li>
                </ul>
            </div>

            <div class="category mb-8">
                <h3 class="text-xl font-bold mb-2">Xbox Games</h3>
                <hr class="w-20 border-t-2 border-gray-400 mb-4">
                <ul class="text-lg">
                    <li><a href="#" class="text-blue-500 hover:underline">Item 1</a></li>
                    <li><a href="#" class="text-blue-500 hover:underline">Item 2</a></li>
                    <li><a href="#" class="text-blue-500 hover:underline">Item 3</a></li>
                </ul>
            </div>

            <div class="category mb-8">
                <h3 class="text-xl font-bold mb-2">PC Accounts</h3>
                <hr class="w-20 border-t-2 border-gray-400 mb-4">
                <ul class="text-lg">
                    <li><a href="#" class="text-blue-500 hover:underline">Item 1</a></li>
                    <li><a href="#" class="text-blue-500 hover:underline">Item 2</a></li>
                    <li><a href="#" class="text-blue-500 hover:underline">Item 3</a></li>
                </ul>
            </div>

            <div class="category mb-8">
                <h3 class="text-xl font-bold mb-2">Xbox Accounts</h3>
                <hr class="w-20 border-t-2 border-gray-400 mb-4">
                <ul class="text-lg">
                    <li><a href="#" class="text-blue-500 hover:underline">Item 1</a></li>
                    <li><a href="#" class="text-blue-500 hover:underline">Item 2</a></li>
                    <li><a href="#" class="text-blue-500 hover:underline">Item 3</a></li>
                </ul>
            </div>
        </div>


    </main>
    <script src="/access/index.js"></script>
    <!-- Your HTML content here -->

    <script>
        document.querySelectorAll(".carousel").forEach((carousel) => {
            const items = carousel.querySelectorAll(".carousel__item");
            const buttonsHtml = Array.from(items, () => {
                return `<span class="carousel__button"></span>`;
            });

            carousel.insertAdjacentHTML(
                "beforeend",
                `
    <div class="carousel__nav">
        ${buttonsHtml.join("")}
    </div>
`
            );

            const buttons = carousel.querySelectorAll(".carousel__button");
            let currentIndex = 0;

            const changeItem = (index) => {
                // un-select all the items
                items.forEach((item) =>
                    item.classList.remove("carousel__item--selected")
                );
                buttons.forEach((button) =>
                    button.classList.remove("carousel__button--selected")
                );

                items[index].classList.add("carousel__item--selected");
                buttons[index].classList.add("carousel__button--selected");
            };

            const nextItem = () => {
                currentIndex = (currentIndex + 1) % items.length;
                changeItem(currentIndex);
            };

            // Attach click event to buttons
            buttons.forEach((button, i) => {
                button.addEventListener("click", () => {
                    currentIndex = i;
                    changeItem(currentIndex);
                });
            });

            // Select the first item on page load
            changeItem(currentIndex);

            // Automatically switch items every 5 seconds
            setInterval(nextItem, 5000);
        });
    </script>

</body>

</html>


</body>

</html>