<?php
session_start(); // Start the session

include("database.php");

// Assume you have retrieved the user's ID from somewhere, such as session or request parameters
if(isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id']; // Assuming user ID is stored in a session variable

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("SELECT id FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);

    // Execute the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        // User does not exist, they are not signed up
        header("Location: /access/login_form/index.php");
        exit; // Stop script execution after redirection
    }

    // Close the statement
    $stmt->close();
} else {
    // Redirect to login page if user ID is not set in session
    header("Location: /access/login_form/index.php");
    exit; // Stop script execution after redirection
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
    <link href='https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap' rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/access/style.css">
    <link rel="shortcut icon" href="/access/img/logo.jpg" type="image/x-icon">
</head>

<body>
    <header>
        <div class="nav container">
            <!-- Logo -->
            <a href="index.html" class="logo">Game<snap>Spectra</snap></a>
            <!-- Nav Icons -->
            <div class="nav-icons">
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
                        <li><a href="/index.php">Home</a></li>
                        <li><a href="/index.php#activity_redotopay_card">Activate Redotpay card</a></li>
                        <li><a href="/index.php#residence_address">Providing a European address and residence</a></li>
                        <li><a href="/index.php#onen_wise_card">Open wise card</a></li>
                        <li><a href="/index.php#buy_from_alexpress">Buy from AliExpress</a></li>
                        <li><a href="/index.php#currencyexchange">Currency Exchange</a></li>
                        <li><a href="/index.php#contact">Contact Us</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </header>
    <main>
        <div class="carousel">
            <div class="carousel__item">
                <h2>Activate Redotpay card</h2>
                <ul>
                    <li>You can now activate your Redotpay card and start using it for online transactions.</li>
                    <li>Step 1: Go to the Redotpay website.</li>
                    <li>Step 2: Log in to your account.</li>
                    <li>Step 3: Navigate to the "Card Activation" section.</li>
                    <li>Step 4: Enter your card details and submit.</li>
                    <li><a href="#" class="btn">Activity Your Redotpay Card Now</a></li>
                </ul>
            </div>
            <div class="carousel__item">
                <h2>Providing a European address and residence</h2>
                <ul>
                    <li>Discover how to provide a European address and residence for various purposes such as online shopping, banking, and more.</li>
                    <li>Benefits of having a European address.</li>
                    <li>How to obtain a European address.</li>
                    <li>Legal considerations and requirements.</li>
                    <li>Recommended service providers.</li>
                    <li><a href="#" class="btn">Add address and residence to your card</a></li>
                </ul>
            </div>
            <div class="carousel__item">
                <h2>Open wise card</h2>
                <ul>
                    <li>Learn how to open a Wise card (formerly known as TransferWise card) and enjoy smooth international transactions with low fees.</li>
                    <li>Why choose a Wise card?</li>
                    <li>How to apply for a Wise card.</li>
                    <li>Features and benefits.</li>
                    <li>Managing your Wise card account.</li>
                    <li><a href="#" class="btn">Order Now To create Wise Card</a></li>
                </ul>
            </div>
            <div class="carousel__item">
                <h2>Buy from AliExpress</h2>
                <ul>
                    <li>Learn how to buy from the AliExpress website and enjoy a wide range of products at low prices and high quality.</li>
                    <li>How to search for products.</li>
                    <li>The purchasing and payment process.</li>
                    <li>Product reviews and seller ratings.</li>
                    <li>Steps for receiving orders and guarantees.</li>
                    <li><a href="#" class="btn">Came to buy any thinks you need</a></li>
                </ul>
            </div>
            <div class="carousel__item">
                <h2>Currency Exchange</h2>
                <ul>
                    <li>Learn how to exchange currencies and manage international transactions efficiently.</li>
                    <li>Understanding currency exchange rates and how they affect your transactions.</li>
                    <li>Steps to exchange currencies through various platforms or financial institutions.</li>
                    <li>Considerations when choosing the right currency exchange service.</li>
                    <li>Managing your currency exchange transactions securely.</li>
                    <li><a href="#" class="btn">Let's change your money</a></li>
                </ul>
            </div>
        </div>

        <div class="ads_class">
    <div class="open_wise" id="onen_wise_card">
        <h2>Open Wise Card</h2>
        <p>Learn how to open a Wise card (formerly known as TransferWise card) and enjoy smooth international transactions with low fees.</p>
        <img src="/access/img/wise.png" alt="Wise Card">
    </div>/access/login_form/index.php
    <div class="activate_redotpay_card" id="activity_redotopay_card">
        <h2>Activate Redotpay Card</h2>
        <p>You can now activate your Redotpay card and start using it for online transactions.</p>
        <img src="/access/img/redotpay.jpg" alt="Redotpay Card">
    </div>
    <div class="buy_alexpress" id="buy_from_alexpress">
        <h2>Buy from AliExpress</h2>
        <p>Learn how to buy from the AliExpress website and enjoy a wide range of products at low prices and high quality.</p>
        <img src="/access/img/aliexpress.png" alt="AliExpress">
    </div>
    <div class="currency_exchange" id="currencyexchange">
        <h2>Currency Exchange</h2>
        <p>Learn how to exchange currencies and manage international transactions efficiently.</p>
        <img src="/access/img/currencyexchange.jpg" alt="Currency Exchange">
    </div>
    <div class="add_address_and_ressidence" id="residence_address">
        <h2>Add Address and Residence</h2>
        <p>Discover how to provide a European address and residence for various purposes such as online shopping, banking, and more.</p>
        <!-- <img src="european_address_image.jpg" alt="European Address"> -->
    </div>
</div>
    </main>
    <script src="/access/index.js"></script>
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