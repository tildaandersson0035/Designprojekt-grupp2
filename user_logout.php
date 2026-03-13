<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Töm sessionsvariabler
$_SESSION = [];

// Ta bort sessionskakan om den finns
if (ini_get('session.use_cookies')) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params['path'],
        $params['domain'],
        $params['secure'],
        $params['httponly']
    );
}

// Förstör sessionen
session_destroy();

// Skicka användaren till login-sidan
header('Location: login.php');
exit;
