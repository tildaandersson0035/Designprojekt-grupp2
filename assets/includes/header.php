<?php
// Init session management
session_start();

// Show errors for debugging
require_once 'display_errors.php';

// Opens database connection
require_once 'assets/config/db.php';

// Process login data to database
require_once 'assets/functions/user_session.login.php';
?>

<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="utf-8">
    <title>Chef's Kiss</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="/assets/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/assets/css/album.css">
</head>

<body>

    <header class="ck-sticky">

        <div class="ck-hero">

            <div class="container ck-header-row">

                <!-- LOGO -->
                <div class="ck-logo">
                    <a href="/index.php">
                        <img src="/assets/images/logo.svg" alt="Chef's Kiss">
                    </a>
                </div>

                <!-- TAGLINE -->
                <p class="ck-tagline">
                    Dela dina <span class="ck-highlight">äventyr</span> från köket
                </p>

                <!-- NAVIGATION -->
                <nav class="ck-nav">

                    <a class="ck-pill" href="/index.php">
                        <i class="fa-solid fa-house"></i> Hem
                    </a>

                    <a class="ck-pill" href="/recipe_view_all.php">
                        <i class="fa-solid fa-utensils"></i> Recept
                    </a>

                    <a class="ck-pill" href="/user_add.php">
                        <i class="fa-solid fa-user"></i> Registrera dig
                    </a>

                    <a class="ck-pill" href="#">
                        <i class="fa-solid fa-magnifying-glass"></i> Sök
                    </a>

                </nav>

            </div>

        </div>

    </header>

</body>

</html>