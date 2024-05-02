<?php
// Establish a database connection
include("../database.php"); // assuming this file contains your database connection code

// Assuming $admin_id contains the ID of the logged-in admin
$admin_id = $_GET['id']; // Assuming you store admin ID in session after login

// Query to retrieve admin's first and last name based on the admin ID
$sql = "SELECT firstname, lastname FROM admins WHERE id = $admin_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the admin's first and last name
    $row = $result->fetch_assoc();
    $admin_firstname = $row['firstname'];
    $admin_lastname = $row['lastname'];
} else {
    header("location: \index.php");
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="shortcut icon" href="/access/admin_file/admin_panal/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <!-- Content For Sidebar -->
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="/access/admin_file/index.php?adminid=<?php echo $_GET['id']; ?>">Game<snap>Spectra</snap></a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Admin Elements
                    </li>
                    <li class="sidebar-item">
                        <a href="/access/admin_file/admin_panal/index.php?id=<?php echo $_GET['id']; ?>" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#favoritegame" data-bs-toggle="collapse" aria-expanded="false">
                            <i class="fa-solid fa-gamepad pe-2"></i> Add Favorite Game
                        </a>
                    </li>
                    <ul id="favoritegame" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="/access/admin_file/add_favoritegame.php?id=<?php echo $_GET['id']; ?>" target="_blank" class="sidebar-link">Click Here To Add</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="/access/admin_file/admin_panal/index.php?id=<?php echo $_GET['id']; ?>#favoritegame" class="sidebar-link">Click Here To Show All Favorite Game</a>
                        </li>
                    </ul>

                    <a href="#" class="sidebar-link collapsed" data-bs-target="#digitalcodes" data-bs-toggle="collapse" aria-expanded="false">
                        <i class="fa-solid fa-digital-tachograph pe-2"></i> Add Digital Codes
                    </a>
                    <ul id="digitalcodes" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="/access/admin_file/add_degital.php?id=<?php echo $_GET['id']; ?>" target="_blank" class="sidebar-link">Click Here To Add</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="/access/admin_file/admin_panal/index.php?id=<?php echo $_GET['id']; ?>#digitalcodes" class="sidebar-link">Click Here To Show All Digital Codes</a>
                        </li>
                    </ul>

                    <a href="#" class="sidebar-link collapsed" data-bs-target="#giftcode" data-bs-toggle="collapse" aria-expanded="false">
                        <i class="fa-solid fa-gift pe-2"></i> Add Gift Cards
                    </a>
                    <ul id="giftcode" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="/access/admin_file/add_giftcard.php" target="_blank" class="sidebar-link">Click Here To Add</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="/access/admin_file/admin_panal/index.php?id=<?php echo $_GET['id']; ?>#giftcode" class="sidebar-link">Click Here To Show All Gift Codes</a>
                        </li>
                    </ul>

                    <a href="#" class="sidebar-link collapsed" data-bs-target="#subscriptions" data-bs-toggle="collapse" aria-expanded="false">
                        <i class="fa-solid fa-stream pe-2"></i> Add Subscriptions
                    </a>
                    <ul id="subscriptions" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="/access/admin_file/add_subscription.php" target="_blank" class="sidebar-link">Click Here To Add</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="/access/admin_file/admin_panal/index.php?id=<?php echo $_GET['id']; ?>#subscriptions" class="sidebar-link">Click Here To Show All Subscriptions</a>
                        </li>
                    </ul>

                    <a href="#" class="sidebar-link collapsed" data-bs-target="#pcgame" data-bs-toggle="collapse" aria-expanded="false">
                        <i class="fa-solid fa-laptop pe-2"></i> Add PC Game
                    </a>
                    <ul id="pcgame" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="/access/admin_file/add_pcgame.php?id=<?php echo $_GET['id']; ?>" target="_blank" class="sidebar-link">Click Here To Add</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="/access/admin_file/admin_panal/index.php?id=<?php echo $_GET['id']; ?>#pcgame" class="sidebar-link">Click Here To Show All Pc Games</a>
                        </li>
                    </ul>

                    <a href="#" class="sidebar-link collapsed" data-bs-target="#xboxgame" data-bs-toggle="collapse" aria-expanded="false">
                        <i class="fa-solid fa-xbox pe-2"></i> Add Xbox Game
                    </a>
                    <ul id="xboxgame" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="/access/admin_file/add_xboxgames.php?id=<?php echo $_GET['id']; ?>" target="_blank" class="sidebar-link">Click Here To Add</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="/access/admin_file/admin_panal/index.php?id=<?php echo $_GET['id']; ?>#xboxgame" class="sidebar-link">Click Here To Show All Xbox Game</a>
                        </li>
                    </ul>

                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#pcaccount" data-bs-toggle="collapse" aria-expanded="false">
                            <i class="fa-solid fa-desktop-alt pe-2"></i> Add Pc Account
                        </a>
                        <ul id="pcaccount" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="/access/admin_file/add_pcaccount.php?id=<?php echo $_GET['id']; ?>" target="_blank" class="sidebar-link">Click Here To Add</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="/access/admin_file/admin_panal/index.php?id=<?php echo $_GET['id']; ?>#pcaccount" class="sidebar-link">Click Here To Show All Pc Accounts</a>
                            </li>
                        </ul>
                    </li>

                    <a href="#" class="sidebar-link collapsed" data-bs-target="#xboxaccount" data-bs-toggle="collapse" aria-expanded="false">
                        <i class="fa-solid fa-gamepad pe-2"></i> Add Xbox Account
                    </a>
                    <ul id="xboxaccount" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="/access/admin_file/add_xboxaccount.php?id=<?php echo $_GET['id']; ?>" target="_blank" class="sidebar-link">Click Here To Add</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="/access/admin_file/admin_panal/index.php?id=<?php echo $_GET['id']; ?>#xboxaccount" class="sidebar-link">Click Here To Show All Xbox Accounts</a>
                        </li>
                    </ul>

                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#auth" data-bs-toggle="collapse" aria-expanded="false"><i class="fa-regular fa-user pe-2"></i>
                            Auth
                        </a>
                        <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="/access/login_form/index.php" class="sidebar-link">Login</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="/access/login_form/index.php" class="sidebar-link">Register</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-header">
                        Multi Level Menu
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#multi" data-bs-toggle="collapse" aria-expanded="false">
                            <i class="fa-solid fa-share-nodes pe-2"></i>
                            All Users
                        </a>
                        <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <?php
                            // Establish database connection
                            include("database.php");

                            // Fetch all users from the database
                            $sql_users = "SELECT id, firstname, lastname FROM users";
                            $result_users = $conn->query($sql_users);

                            if ($result_users->num_rows > 0) {
                                // Output first names and last names of each user
                                while ($row_users = $result_users->fetch_assoc()) {
                                    echo "<li class='sidebar-item'>";
                                    echo "<a href='#' class='sidebar-link collapsed' data-bs-target='#level-" . $row_users["id"] . "' data-bs-toggle='collapse' aria-expanded='false'>" . $row_users["firstname"] . " " . $row_users["lastname"] . "</a>";
                                    echo "<ul id='level-" . $row_users["id"] . "' class='sidebar-dropdown list-unstyled collapse'>";
                                    echo "<li class='sidebar-item'><a href='/access/php/chatapp/chat.php?sender_id=" . 0 . "&receiver_id=" . $row_users["id"] . "&admin_id=" . 0 . "&admin_online=true' class='sidebar-link'>Chat With " . $row['firstname'] . " " . $row['lastname'] . "</a></li>";
                                    echo "</ul>";
                                    echo "</li>";
                                }
                            } else {
                                echo "<li class='sidebar-item'>";
                                echo "<a href='#' class='sidebar-link'>No Users Found</a>";
                                echo "</li>";
                            }

                            // Close the database connection
                            $conn->close();
                            ?>
                        </ul>
                    </li>

                </ul>
            </div>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="image/profile.jpg" class="avatar img-fluid rounded" alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="/access/admin_file/admin_panal/update_admin.php?id=1" class="dropdown-item">Modifing</a>
                                <a href="/index.php" class="dropdown-item">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="mb-3">
                        <h4>Admin Dashboard</h4>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 d-flex">
                            <div class="card flex-fill border-0 illustration">
                                <div class="card-body p-0 d-flex flex-fill">
                                    <div class="row g-0 w-100">
                                        <div class="col-6">
                                            <div class="p-3 m-1">
                                                <h4>Welcome Back, <?php echo $admin_firstname . '  ' . $admin_lastname; ?></h4>
                                                <p class="mb-0">Admin Dashboard, Transa<span>Versa</span></p>
                                            </div>
                                        </div>
                                        <div class="col-6 align-self-end text-end">
                                            <img src="image/customer-support.jpg" class="img-fluid illustration-img" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 d-flex">
                            <div class="card flex-fill border-0">
                                <div class="card-body py-4">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <h4 class="mb-2">
                                                What You Find In This Page
                                            </h4>
                                            <p class="mb-2">
                                                You can see and add/delete modifications for:
                                            </p>
                                            <div class="mb-0">
                                                <a href="/access/admin_file/admin_panal/index.php?id=<?php echo $_GET['id']; ?>#favoritegame">
                                                    <span class="badge text-success me-2">
                                                        1
                                                    </span>
                                                    <span class="text-muted">
                                                        Favorite Games
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="mb-0">
                                                <a href="/access/admin_file/admin_panal/index.php?id=<?php echo $_GET['id']; ?>#digitalcodes">
                                                    <span class="badge text-success me-2">
                                                        2
                                                    </span>
                                                    <span class="text-muted">
                                                        Digital Codes
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="mb-0">
                                                <a href="/access/admin_file/admin_panal/index.php?id=<?php echo $_GET['id']; ?>#giftcode">
                                                    <span class="badge text-success me-2">
                                                        3
                                                    </span>
                                                    <span class="text-muted">
                                                        Gift Cards
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="mb-0">
                                                <a href="/access/admin_file/admin_panal/index.php?id=<?php echo $_GET['id']; ?>#subscriptions">
                                                    <span class="badge text-success me-2">
                                                        4
                                                    </span>
                                                    <span class="text-muted">
                                                        Subscriptions
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="mb-0">
                                                <a href="/access/admin_file/admin_panal/index.php?id=<?php echo $_GET['id']; ?>#pcgame">
                                                    <span class="badge text-success me-2">
                                                        5
                                                    </span>
                                                    <span class="text-muted">
                                                        PC Games
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="mb-0">
                                                <a href="/access/admin_file/admin_panal/index.php?id=<?php echo $_GET['id']; ?>#xboxgame">
                                                    <span class="badge text-success me-2">
                                                        6
                                                    </span>
                                                    <span class="text-muted">
                                                        Xbox Games
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="mb-0">
                                                <a href="/access/admin_file/admin_panal/index.php?id=<?php echo $_GET['id']; ?>#pcaccount">
                                                    <span class="badge text-success me-2">
                                                        7
                                                    </span>
                                                    <span class="text-muted">
                                                        PC Accounts
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="mb-0">
                                                <a href="/access/admin_file/admin_panal/index.php?id=<?php echo $_GET['id']; ?>#xboxaccount">
                                                    <span class="badge text-success me-2">
                                                        8
                                                    </span>
                                                    <span class="text-muted">
                                                        Xbox Accounts
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Table Element: Favorite Games -->
                    <div class="card border-0" id="favoritegame">
                        <div class="card-header">
                            <h5 class="card-title">
                                Favorite Games
                            </h5>
                            <h6 class="card-subtitle text-muted">
                                Here You See Info of The Favorite Games
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Platform</th>
                                            <th scope="col">User First Name</th>
                                            <th scope="col">User Last Name</th>
                                            <th scope="col">Delete</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Similar structure for Digital Codes, Gift Cards, Subscriptions, PC Games, Xbox Games, PC Accounts, and Xbox Accounts -->
                    <!-- Table Element: Digital Codes -->
                    <div class="card border-0" id="digitalcodes">
                        <div class="card-header">
                            <h5 class="card-title">Digital Codes</h5>
                            <h6 class="card-subtitle text-muted">Here You See Info of The Digital Codes</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Platform</th>
                                            <th scope="col">User First Name</th>
                                            <th scope="col">User Last Name</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- PHP code to fetch and display digital codes data -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Similar structure for Gift Cards, Subscriptions, PC Games, Xbox Games, PC Accounts, and Xbox Accounts -->
                    <!-- Table Element: Gift Cards -->
                    <div class="card border-0" id="giftcode">
                        <div class="card-header">
                            <h5 class="card-title">Gift Cards</h5>
                            <h6 class="card-subtitle text-muted">Here You See Info of The Gift Cards</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">User First Name</th>
                                            <th scope="col">User Last Name</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- PHP code to fetch and display gift cards data -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Similar structure for Subscriptions, PC Games, Xbox Games, PC Accounts, and Xbox Accounts -->
                    <!-- Table Element: Subscriptions -->
                    <div class="card border-0" id="subscriptions">
                        <div class="card-header">
                            <h5 class="card-title">Subscriptions</h5>
                            <h6 class="card-subtitle text-muted">Here You See Info of The Subscriptions</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">User First Name</th>
                                            <th scope="col">User Last Name</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- PHP code to fetch and display subscriptions data -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Similar structure for PC Games, Xbox Games, PC Accounts, and Xbox Accounts -->
                    <!-- Table Element: PC Games -->
                    <div class="card border-0" id="pcgame">
                        <div class="card-header">
                            <h5 class="card-title">PC Games</h5>
                            <h6 class="card-subtitle text-muted">Here You See Info of The PC Games</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">User First Name</th>
                                            <th scope="col">User Last Name</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- PHP code to fetch and display PC games data -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Similar structure for Xbox Games, PC Accounts, and Xbox Accounts -->
                    <!-- Table Element: Xbox Games -->
                    <div class="card border-0" id="xboxgame">
                        <div class="card-header">
                            <h5 class="card-title">Xbox Games</h5>
                            <h6 class="card-subtitle text-muted">Here You See Info of The Xbox Games</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">User First Name</th>
                                            <th scope="col">User Last Name</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- PHP code to fetch and display Xbox games data -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Similar structure for PC Accounts and Xbox Accounts -->
                    <!-- Table Element: PC Accounts -->
                    <div class="card border-0" id="pcaccount">
                        <div class="card-header">
                            <h5 class="card-title">PC Accounts</h5>
                            <h6 class="card-subtitle text-muted">Here You See Info of The PC Accounts</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Password</th>
                                            <th scope="col">User First Name</th>
                                            <th scope="col">User Last Name</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- PHP code to fetch and display PC accounts data -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Similar structure for Xbox Accounts -->
                    <!-- Table Element: Xbox Accounts -->
                    <div class="card border-0" id="xboxaccount">
                        <div class="card-header">
                            <h5 class="card-title">Xbox Accounts</h5>
                            <h6 class="card-subtitle text-muted">Here You See Info of The Xbox Accounts</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Password</th>
                                            <th scope="col">User First Name</th>
                                            <th scope="col">User Last Name</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- PHP code to fetch and display Xbox accounts data -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>




            </main>
            <a href="#" class="theme-toggle">
                <i class="fa-regular fa-moon"></i>
                <i class="fa-regular fa-sun"></i>
            </a>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a href="#" class="text-muted">
                                    <strong>Game<span>Shop</span></strong>
                                </a>
                            </p>
                        </div>
                        <!-- <div class="col-6 text-end">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">Contact</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">About Us</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">Terms</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">Booking</a>
                                </li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>