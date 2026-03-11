<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'assets/functions/user_session.login.php';
?>

<!doctype html>
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

    <!doctype html>
    <html lang="sv">

    <head>
        <meta charset="utf-8">
        <title>Chef's Kiss</title>

        <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="/assets/css/all.min.css">
        <link rel="stylesheet" href="/assets/css/album.css">
    </head>

    <body>

        <header class="sticky-top">
            <nav class="navbar navbar-expand-lg py-2" style="background-color:#0c2d3c;">
                <div class="container">

                    <a class="navbar-brand d-flex align-items-center gap-3 mb-0" href="/index.php">
                        <img src="/assets/images/logo.svg" alt="Chef's Kiss" class="img-fluid" style="max-height:58px;">
                        <span class="text-white fw-semibold d-none d-md-inline">
                            Dela dina <span class="ck-highlight">äventyr</span> från köket
                        </span>
                    </a>

                    <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="mainNavbar">

                        <ul class="navbar-nav mx-auto align-items-lg-center">
                            <li class="nav-item">
                                <a class="nav-link text-white px-3 fw-medium" href="/index.php">
                                    <i class="fa-solid fa-house me-1"></i> Hem
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white px-3 fw-medium" href="/recipe_view_all.php">
                                    <i class="fa-solid fa-utensils me-1"></i> Recept
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white px-3 fw-medium" href="/about.php">
                                    <i class="fa-solid fa-circle-info me-1"></i> Om oss
                                </a>
                            </li>

                            <?php if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) { ?>
                                <li class="nav-item">
                                    <a class="nav-link text-white px-3 fw-medium" href="/user_add.php">
                                        <i class="fa-solid fa-user-plus me-1"></i> Registrera dig
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>

                        <div class="d-flex align-items-center gap-2 mt-3 mt-lg-0">

                            <a href="/search.php"
                                class="btn btn-outline-light rounded-circle d-flex align-items-center justify-content-center"
                                style="width:42px; height:42px; padding:0;">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a>

                            <a href="/help.php"
                                class="btn btn-outline-light rounded-circle d-flex align-items-center justify-content-center"
                                style="width:42px; height:42px; padding:0;">
                                <i class="fa-solid fa-question"></i>
                            </a>

                            <?php if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) { ?>

                                <a href="/profile.php"
                                    class="btn btn-outline-light rounded-pill px-3 d-flex align-items-center">
                                    <span class="me-2">Min profil</span>
                                    <i class="fa-solid fa-user"></i>
                                </a>

                                <a href="/functions/logout.php"
                                    class="btn btn-outline-light rounded-pill px-3 d-flex align-items-center">
                                    <i class="fa-solid fa-right-from-bracket me-2"></i> Logga ut
                                </a>

                            <?php } else { ?>

                                <div class="dropdown">
                                    <button class="btn btn-outline-light rounded-pill px-3 dropdown-toggle d-flex align-items-center"
                                        type="button"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <span class="me-2">Logga in</span>
                                        <i class="fa-solid fa-user"></i>
                                    </button>

                                    <div class="dropdown-menu dropdown-menu-end p-3" style="min-width: 300px;">
                                        <form action="/functions/user_session.login.php" method="post">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">E-post</label>
                                                <input type="email" class="form-control" id="email" name="email" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="password" class="form-label">Lösenord</label>
                                                <input type="password" class="form-control" id="password" name="password" required>
                                            </div>

                                            <button type="submit" class="btn btn-danger w-100" name="login">
                                                Logga in
                                            </button>
                                        </form>

                                        <div class="dropdown-divider"></div>

                                        <a class="dropdown-item" href="/user_add.php">Ny här? Registrera dig</a>
                                    </div>
                                </div>

                            <?php } ?>

                        </div>
                    </div>
                </div>
            </nav>
        </header>