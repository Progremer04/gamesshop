<?php

include("database.php");
$user_id = "";
// Assume you have retrieved the user's ID from somewhere, such as session or request parameters
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id']; // Assuming user ID is stored in a session variable

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("SELECT id FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);

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

$query = "SELECT firstname, lastname FROM users WHERE id = '$user_id'";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

</head>


<body>
    <header>
        <div class="nav container">
            <!-- Logo -->
            <a href="index.html" class="logo">Game<snap>Shop</snap></a>
            <a class="logo">Hello <span><?php echo $firstname; ?></span> <span><?php echo $lastname; ?></span></a>
            <!-- Nav Icons -->
            <div class="nav-icons">
                <a href="/access/user_id/update_user.php?id=<?php echo $user_id; ?>">Modifyte Profile</a>
                <a href="/access/login_form/index.php">Log out</a>
                <?php
                // Assuming you have established a database connection already
                // Establish the database connection
                include('database.php');
                // Database connection
                // Your user ID
                $userid = $user_id; // Replace 123 with the actual user ID

                // SQL query to get the number of items in the cart for the specified user using a full join
                $sql = "SELECT COUNT(card.id) AS num_items
        FROM card
        INNER JOIN users ON card.UserID = users.id
        WHERE users.id = '$userid'";

                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);

                // Get the number of items in the cart
                $num_items = $row['num_items'];

                // Output the result
                // echo "Number of items in the cart for user with ID $userid: $num_items";

                // Close the database connection
                mysqli_close($conn);
                ?>
                <a href="/access/user_id/card.php?id=<?php echo $_GET['user_id']; ?>">
                    <i class="fa fa-shopping-cart" style="color:#fff"></i>
                    <span class="badge bg-secondary"><?php echo $num_items; ?></span>
                </a>
                <a href="/access/user_id/liveshearch.php?user_id=<?php echo $_GET['user_id']; ?>">
                <i class="fas fa-search"></i>
                </a>
                
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
                        <li><a href="/access/php/chatapp/chat.php?sender_id=<?php echo $user_id; ?>&receiver_id=0&admin_id=0">Contact Us</a></li>
                        <li><a href="/access/login_form/index.php">Log out</a></li>

                    </ul>
                </div>

            </div>
        </div>
    </header>

    <main class="pb-3">

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
                                <textarea name="" id="" cols="10" rows="1" style="visibility: hidden;"></textarea>
                                <li>
                                    <a href="/access/user_id/addtocard.php?userid=<?php echo $user_id?>&id=<?php echo $row['id']; ?>&typeprudect=favorite_game" class="btn2">ADD TO CARD</a>
                                </li>

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
                <?php
                include('database.php');
                $sql = "SELECT * FROM digital_codes";
                $result = mysqli_query($conn, $sql);
                ?>
                <section>
                    <div class="swiper mySwiper container">
                        <div class="swiper-wrapper content">

                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <div class="swiper-slide card">
                                        <div class="card-content">
                                            <div class="image">
                                                <img src="<?php echo $row['image_url']; ?>" alt="">
                                            </div>
                                            <div class="social-media">
                                                <i class="fa-brands fa-facebook"></i>
                                                <i class="fa-brands fa-twitter"></i>
                                                <i class="fa-brands fa-github"></i>
                                            </div>
                                            <div class="name-profession">
                                                <span class="name"><?php echo $row['title']; ?></span>
                                                <span class="profession"><?php echo $row['description']; ?></span>
                                                <span class="profession"><?php echo $row['price']; ?> DA</span>
                                                <span class="name"><?php echo $row['platform']; ?></span>

                                            </div>
                                            
                                            <div class="button">
                                                
                                                <button class="aboutMe"> <a href="/access/user_id/addtocard.php?userid=<?php echo $user_id?>&id=<?php echo $row['id']; ?>&typeprudect=digital_codes">ADD TO CARD</a>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            } else {
                                echo '<div class="swiper-slide card">
                                <div class="card-content"><div class="name-profession">
                                <span class="name">0 results</div></div></div></div>';
                            }
                            // Close the database connection
                            $conn->close();
                            ?>
                        </div>
                    </div>


                    <div class="swiper-pagination"></div>
                </section>
            </div>

            <div class="category mb-8">
                <h3 class="text-xl font-bold mb-2">Gift Cards</h3>
                <hr class="w-20 border-t-2 border-gray-400 mb-4">
                <?php
                include('database.php');
                $sql = "SELECT * FROM gift_card";
                $result = mysqli_query($conn, $sql);
                ?>
                <section>
                    <div class="swiper mySwiper1 container">
                        <div class="swiper-wrapper content">

                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <div class="swiper-slide card">
                                        <div class="card-content">
                                            <div class="image">
                                                <img src="<?php echo $row['image_url']; ?>" alt="">
                                            </div>
                                            <div class="social-media">
                                                <i class="fa-brands fa-facebook"></i>
                                                <i class="fa-brands fa-twitter"></i>
                                                <i class="fa-brands fa-github"></i>
                                            </div>
                                            <div class="name-profession">
                                                <span class="name"><?php echo $row['title']; ?></span>
                                                <span class="profession"><?php echo $row['description']; ?></span>
                                                <span class="profession"><?php echo $row['price']; ?> DA</span>
                                                <span class="name"><?php echo $row['platform']; ?></span>

                                            </div>
                                            
                                            <div class="button">
                                                
                                                <button class="aboutMe"> <a href="/access/user_id/addtocard.php?userid=<?php echo $user_id?>&id=<?php echo $row['id']; ?>&typeprudect=gift_card">ADD TO CARD</a>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            } else {
                                echo '<div class="swiper-slide card">
                                <div class="card-content"><div class="name-profession">
                                <span class="name">0 results</div></div></div></div>';
                            }
                            // Close the database connection
                            $conn->close();
                            ?>
                        </div>
                    </div>


                    <div class="swiper-pagination"></div>
                </section>

            </div>

            <div class="category mb-8">
                <h3 class="text-xl font-bold mb-2">Subscriptions</h3>
                <hr class="w-20 border-t-2 border-gray-400 mb-4">
                <?php
                include('database.php');
                $sql = "SELECT * FROM subscriptions";
                $result = mysqli_query($conn, $sql);
                ?>
                <section>
                    <div class="swiper mySwiper2 container">
                        <div class="swiper-wrapper content">

                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <div class="swiper-slide card">
                                        <div class="card-content">
                                            <div class="image">
                                                <?php
                                                $src = "";
                                                switch ($row["name"]) {
                                                    case "GamePass":
                                                        $src = "/access/img/xbox-game-pass.jpg";
                                                        break;
                                                    case "Ubisoft":
                                                        $src = "/access/img/ubisoft-games-wallpapers.jpg";
                                                        break;
                                                    case "EAPlay":
                                                        $src = "/access/img/eaplay.jfif";
                                                        break;
                                                }
                                                ?>
                                                <img src="<?php echo $src; ?>" alt="">
                                            </div>
                                            <div class="social-media">
                                                <i class="fa-brands fa-facebook"></i>
                                                <i class="fa-brands fa-twitter"></i>
                                                <i class="fa-brands fa-github"></i>
                                            </div>
                                            <div class="name-profession">
                                                <span class="name"><?php echo $row['title']; ?></span>
                                                <span class="profession"><?php echo $row['description']; ?></span>
                                                <span class="profession"><?php echo $row['price']; ?> DA</span>
                                                <span class="name"><?php echo $row['platform']; ?></span>

                                            </div>
                                            
                                            <div class="button">
                                                
                                                <button class="aboutMe"> <a href="/access/user_id/addtocard.php?userid=<?php echo $user_id?>&id=<?php echo $row['id']; ?>&typeprudect=subscriptions">ADD TO CARD</a>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            } else {
                                echo '<div class="swiper-slide card">
                                <div class="card-content"><div class="name-profession">
                                <span class="name">0 results</div></div></div></div>';
                            }
                            // Close the database connection
                            $conn->close();
                            ?>
                        </div>
                    </div>


                    <div class="swiper-pagination"></div>
                </section>
            </div>

            <div class="category mb-8">
                <h3 class="text-xl font-bold mb-2">PC Games</h3>
                <hr class="w-20 border-t-2 border-gray-400 mb-4">
                <?php
                include('database.php');
                $sql = "SELECT * FROM pcgames";
                $result = mysqli_query($conn, $sql);
                ?>
                <section>
                    <div class="swiper mySwiper3 container">
                        <div class="swiper-wrapper content">

                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <div class="swiper-slide card">
                                        <div class="card-content">
                                            <div class="image">
                                                <img src="<?php echo $row['image_url']; ?>" alt="">
                                            </div>
                                            <div class="social-media">
                                                <i class="fa-brands fa-facebook"></i>
                                                <i class="fa-brands fa-twitter"></i>
                                                <i class="fa-brands fa-github"></i>
                                            </div>
                                            <div class="name-profession">
                                                <span class="name"><?php echo $row['title']; ?></span>
                                                <span class="profession"><?php echo $row['description']; ?></span>
                                                <span class="profession"><?php echo $row['price']; ?> DA</span>
                                                <span class="name"><?php echo $row['platform']; ?></span>

                                            </div>
                                            
                                            <div class="button">
                                                
                                                <button class="aboutMe"> <a href="/access/user_id/addtocard.php?userid=<?php echo $user_id?>&id=<?php echo $row['id']; ?>&typeprudect=pcgames">ADD TO CARD</a>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            } else {
                                echo '<div class="swiper-slide card">
                                <div class="card-content"><div class="name-profession">
                                <span class="name">0 results</div></div></div></div>';
                            }
                            // Close the database connection
                            $conn->close();
                            ?>
                        </div>
                    </div>


                    <div class="swiper-pagination"></div>
                </section>
            </div>

            <div class="category mb-8">
                <h3 class="text-xl font-bold mb-2">Xbox Games</h3>
                <hr class="w-20 border-t-2 border-gray-400 mb-4">
                <?php
                include('database.php');
                $sql = "SELECT * FROM xboxgames";
                $result = mysqli_query($conn, $sql);
                ?>
                <section>
                    <div class="swiper mySwiper4 container">
                        <div class="swiper-wrapper content">

                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <div class="swiper-slide card">
                                        <div class="card-content">
                                            <div class="image">
                                                <img src="<?php echo $row['image_url']; ?>" alt="">
                                            </div>
                                            <div class="social-media">
                                                <i class="fa-brands fa-facebook"></i>
                                                <i class="fa-brands fa-twitter"></i>
                                                <i class="fa-brands fa-github"></i>
                                            </div>
                                            <div class="name-profession">
                                                <span class="name"><?php echo $row['title']; ?></span>
                                                <span class="profession"><?php echo $row['description']; ?></span>
                                                <span class="profession"><?php echo $row['price']; ?> DA</span>
                                                <span class="name"><?php echo $row['platform']; ?></span>

                                            </div>
                                            
                                            <div class="button">
                                                
                                                <button class="aboutMe"> <a href="/access/user_id/addtocard.php?userid=<?php echo $user_id?>&id=<?php echo $row['id']; ?>&typeprudect=xboxgames">ADD TO CARD</a>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            } else {
                                echo '<div class="swiper-slide card">
                                <div class="card-content"><div class="name-profession">
                                <span class="name">0 results</div></div></div></div>';
                            }
                            // Close the database connection
                            $conn->close();
                            ?>
                        </div>
                    </div>


                    <div class="swiper-pagination"></div>
                </section>
            </div>

            <div class="category mb-8">
                <h3 class="text-xl font-bold mb-2">PC Accounts</h3>
                <hr class="w-20 border-t-2 border-gray-400 mb-4">
                <?php
                include('database.php');
                $sql = "SELECT * FROM pcaccount";
                $result = mysqli_query($conn, $sql);
                ?>
                <section>
                    <div class="swiper mySwiper5 container">
                        <div class="swiper-wrapper content">

                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <div class="swiper-slide card">
                                        <div class="card-content">
                                            <div class="image">
                                                <img src="<?php echo $row['image_url']; ?>" alt="">
                                            </div>
                                            <div class="social-media">
                                                <i class="fa-brands fa-facebook"></i>
                                                <i class="fa-brands fa-twitter"></i>
                                                <i class="fa-brands fa-github"></i>
                                            </div>
                                            <div class="name-profession">
                                                <span class="name"><?php echo $row['title']; ?></span>
                                                <span class="profession"><?php echo $row['description']; ?></span>
                                                <span class="profession"><?php echo $row['price']; ?> DA</span>
                                                <span class="name"> Account Is <?php echo $row['type_account']; ?></span>
                                                <span class="name"><?php echo $row['platform']; ?></span>


                                            </div>
                                            
                                            <div class="button">
                                                
                                                <button class="aboutMe"> <a href="/access/user_id/addtocard.php?userid=<?php echo $user_id?>&id=<?php echo $row['id']; ?>&typeprudect=pcaccount">ADD TO CARD</a>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            } else {
                                echo '<div class="swiper-slide card">
                                <div class="card-content"><div class="name-profession">
                                <span class="name">0 results</div></div></div></div>';
                            }
                            // Close the database connection
                            $conn->close();
                            ?>
                        </div>
                    </div>


                    <div class="swiper-pagination"></div>
                </section>
            </div>

            <div class="category mb-8">
                <h3 class="text-xl font-bold mb-2">Xbox Accounts</h3>
                <hr class="w-20 border-t-2 border-gray-400 mb-4">
                <?php
                include('database.php');
                $sql = "SELECT * FROM xboxaccount";
                $result = mysqli_query($conn, $sql);
                ?>
                <section>
                    <div class="swiper mySwiper6 container">
                        <div class="swiper-wrapper content">

                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <div class="swiper-slide card">
                                        <div class="card-content">
                                            <div class="image">
                                                <img src="<?php echo $row['image_url']; ?>" alt="">
                                            </div>
                                            <div class="social-media">
                                                <i class="fa-brands fa-facebook"></i>
                                                <i class="fa-brands fa-twitter"></i>
                                                <i class="fa-brands fa-github"></i>
                                            </div>
                                            <div class="name-profession">
                                                <span class="name"><?php echo $row['title']; ?></span>
                                                <span class="profession"><?php echo $row['description']; ?></span>
                                                <span class="profession"><?php echo $row['price']; ?> DA</span>
                                                <span class="name"><?php echo $row['platform']; ?></span>
                                                <span class="name">Account Is<?php echo $row['type_account']; ?></span>

                                            </div>
                                            
                                            <div class="button">
                                                
                                                <button class="aboutMe"> <a href="/access/user_id/addtocard.php?userid=<?php echo $user_id?>&id=<?php echo $row['id']; ?>&typeprudect=xboxaccount">ADD TO CARD</a>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            } else {
                                echo '<div class="swiper-slide card">
                                <div class="card-content"><div class="name-profession">
                                <span class="name">0 results</div></div></div></div>';
                            }
                            // Close the database connection
                            $conn->close();
                            ?>
                        </div>
                    </div>


                    <div class="swiper-pagination"></div>
                </section>
            </div>
        </div>


    </main>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <script src="/access/index.js"></script>
    <!-- Your HTML content here -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 2,
            spaceBetween: 30,
            slidesPerGroup: 2,
            loop: true,
            grabCursor: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
        var swiper1 = new Swiper(".mySwiper1", {
            slidesPerView: 2,
            spaceBetween: 30,
            slidesPerGroup: 2,
            loop: true,
            grabCursor: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
        var swiper2 = new Swiper(".mySwiper2", {
            slidesPerView: 2,
            spaceBetween: 30,
            slidesPerGroup: 2,
            loop: true,
            grabCursor: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
        var swiper3 = new Swiper(".mySwiper3", {
            slidesPerView: 2,
            spaceBetween: 30,
            slidesPerGroup: 2,
            loop: true,
            grabCursor: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
        var swiper4 = new Swiper(".mySwiper4", {
            slidesPerView: 2,
            spaceBetween: 30,
            slidesPerGroup: 2,
            loop: true,
            grabCursor: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
        var swiper5 = new Swiper(".mySwiper5", {
            slidesPerView: 2,
            spaceBetween: 30,
            slidesPerGroup: 2,
            loop: true,
            grabCursor: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
        var swiper6 = new Swiper(".mySwiper6", {
            slidesPerView: 2,
            spaceBetween: 30,
            slidesPerGroup: 2,
            loop: true,
            grabCursor: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
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