<?php
// Init session management
session_start();

// Show errors for debugging
require_once 'display_errors.php';

// Opens database connection
require_once '../config/db.php';

// Process login data to database
require_once '../functions/user_session_login.php';
?>

<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="utf-8">
    <title>Chef's Kiss</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/album.css">

    <style>
        :root {
            --ck-navy: #0b2230;
            --ck-cream: #f3f0e7;
            --ck-red: #b2191b;
        }

        /* sticky header */
        .ck-sticky {
            position: sticky;
            top: 0;
            z-index: 1030;
        }

        /* hero section */
        .ck-hero {
            min-height: 320px;
            color: white;
            position: relative;
            background: url("../images/hero-kitchen.jpg") center/cover no-repeat;
        }

        /* vertical brand */
        .ck-brand-rail {
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 70px;
            display: flex;
            justify-content: center;
            padding-top: 20px;
            background: rgba(11, 34, 48, .4);
        }

        .brand-vertical {
            writing-mode: vertical-rl;
            transform: rotate(180deg);
            font-weight: bold;
            letter-spacing: 2px;
        }

        /* navigation pills */
        .ck-pill {
            background: rgba(11, 34, 48, .7);
            border-radius: 999px;
            padding: 6px 14px;
            color: white;
            text-decoration: none;
        }

        .ck-pill:hover {
            background: var(--ck-red);
        }
    </style>

</head>

<body>

    <header class="ck-sticky">

        <div class="ck-hero">

            <div class="ck-brand-rail">
                <div class="brand-vertical">
                    <i class="fa-solid fa-hat-chef"></i> CHEF'S KISS
                </div>
            </div>

            <nav class="container pt-3 d-flex justify-content-center gap-3">

                <a class="ck-pill" href="/index.php">
                    <i class="fa-solid fa-house"></i> Hem
                </a>

                <a class="ck-pill" href="/recipe_view_all.php">
                    <i class="fa-solid fa-utensils"></i> Recept
                </a>

                <a class="ck-pill" href="/recipe_add.php">
                    <i class="fa-solid fa-plus"></i> Nytt
                </a>

                <a class="ck-pill" href="#">
                    <i class="fa-solid fa-magnifying-glass"></i> Sök
                </a>

            </nav>

            <div class="text-center pt-5">

                <h2>
                    Dela dina <span style="color:#e23a3c;">äventyr</span> från köket
                </h2>

                <div class="mt-3">

                    <a class="btn btn-light" href="/recipe_view_all.php">Alla recept</a>

                    <a class="btn btn-danger" href="/user_add.php">Registrera dig</a>

                    <a class="btn btn-outline-light" href="/recipe_add.php">Nytt recept</a>

                </div>

            </div>

        </div>

    </header>

    <body>