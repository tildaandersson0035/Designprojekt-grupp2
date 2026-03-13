<?php

// Kontrollerar att begäran skickats via POST (formulär)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Startar session om ingen redan är aktiv
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Säkerställer att användaren är inloggad
    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }

    // Hämtar användarens id från sessionen
    $userID = $_SESSION['user_id'];

    // SQL-fråga som tar bort användaren från databasen
    $sql = "DELETE FROM users WHERE userID = :userID LIMIT 1";

    // Förbereder SQL-frågan
    $stmt = $dbh->prepare($sql);

    // Kopplar användarens id till SQL-parametern
    $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);

    // Kör frågan
    $stmt->execute();

    // Rensar alla sessionsvariabler
    $_SESSION = [];

    // Tar bort sessionscookien om cookies används
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

    // Förstör sessionen helt
    session_destroy();

    // Skickar användaren till registreringssidan efter borttaget konto
    header('Location: register.php');
    exit;
}

/*
PHP-taggen avslutas inte i slutet av filen.

Detta är en vanlig PHP-praxis eftersom det förhindrar att
oavsiktliga mellanslag eller radbrytningar skickas till
webbläsaren. Sådana tecken kan annars orsaka fel vid
t.ex. redirects med header().
*/