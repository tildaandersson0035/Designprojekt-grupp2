<?php

// Startar session om ingen redan är aktiv
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Variabel för felmeddelanden som kan visas på inloggningssidan
$error = '';

// Kontrollerar att formuläret skickats via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Hämtar och rensar användarens inmatade uppgifter
    $userEmail = trim($_POST['email'] ?? '');
    $userPassword = trim($_POST['password'] ?? '');

    // Kontrollerar att både e-post och lösenord är ifyllda
    if ($userEmail === '' || $userPassword === '') {
        $error = 'Fyll i både e-post och lösenord.';
    }

    else {

        // SQL-fråga som hämtar användaren baserat på e-postadress
        $sql = "SELECT * FROM users
                WHERE userEmail = :userEmail
                LIMIT 1";

        // Förbereder SQL-frågan
        $stmt = $dbh->prepare($sql);

        // Kopplar e-post till SQL-parametern
        $stmt->bindParam(':userEmail', $userEmail, PDO::PARAM_STR);

        // Kör frågan
        $stmt->execute();

        // Hämtar användaren från databasen
        $user = $stmt->fetch();

        // Kontrollerar att användaren finns och att lösenordet stämmer
        if ($user && password_verify($userPassword, $user['userPassword'])) {

            // Sparar användarens id i sessionen
            $_SESSION['user_id'] = $user['userID'];

            // Skickar användaren till startsidan efter lyckad inloggning
            header('Location: index.php');
            exit;
        }

        else {
            // Felmeddelande vid fel e-post eller lösenord
            $error = 'Fel e-post eller lösenord.';
        }
    }
}

/*
PHP-taggen avslutas inte i slutet av filen.

Detta är en vanlig praxis i PHP eftersom det förhindrar
att oavsiktliga mellanslag eller radbrytningar skickas
till webbläsaren. Det kan annars orsaka fel vid t.ex.
redirects med header().
*/