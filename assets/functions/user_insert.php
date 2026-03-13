<?php

// Variabel för felmeddelanden som kan visas på registreringssidan
$error = '';

// Kontrollerar att formuläret skickats via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Hämtar och rensar användarens inmatade värden
    $userFirstname    = trim($_POST['userFirstname'] ?? '');
    $userSurname      = trim($_POST['userSurname'] ?? '');
    $userEmail        = trim($_POST['userEmail'] ?? '');
    $userPassword     = trim($_POST['userPassword'] ?? '');
    $confirmPassword  = trim($_POST['confirmPassword'] ?? '');

    // Hämtar vald profilbild (standard = 1)
    $userPicture      = intval($_POST['userPicture'] ?? 1);

    // Skapar datum och tid för när kontot registreras
    $userDate         = date('Y-m-d H:i:s');

    // Kontrollerar att alla obligatoriska fält är ifyllda
    if (
        $userFirstname === '' ||
        $userSurname === '' ||
        $userEmail === '' ||
        $userPassword === '' ||
        $confirmPassword === ''
    ) {
        $error = 'Fyll i alla fält.';
    }

    // Kontrollerar att lösenorden matchar
    elseif ($userPassword !== $confirmPassword) {
        $error = 'Lösenorden matchar inte.';
    }

    else {

        // Kontrollerar om e-postadressen redan finns i databasen
        $checkSql = "SELECT userID FROM users WHERE userEmail = :userEmail LIMIT 1";
        $checkStmt = $dbh->prepare($checkSql);
        $checkStmt->bindParam(':userEmail', $userEmail, PDO::PARAM_STR);
        $checkStmt->execute();

        if ($checkStmt->fetch()) {
            $error = 'Den e-postadressen används redan.';
        }

        else {

            // Hashar lösenordet innan det sparas i databasen
            $hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);

            // SQL-fråga som skapar en ny användare
            $sql = "INSERT INTO users
                    (userFirstname, userSurname, userEmail, userPassword, userPicture, userDate)
                    VALUES
                    (:userFirstname, :userSurname, :userEmail, :userPassword, :userPicture, :userDate)";

            // Förbereder SQL-frågan
            $stmt = $dbh->prepare($sql);

            // Kopplar variabler till SQL-parametrar
            $stmt->bindParam(':userFirstname', $userFirstname, PDO::PARAM_STR);
            $stmt->bindParam(':userSurname', $userSurname, PDO::PARAM_STR);
            $stmt->bindParam(':userEmail', $userEmail, PDO::PARAM_STR);
            $stmt->bindParam(':userPassword', $hashedPassword, PDO::PARAM_STR);
            $stmt->bindParam(':userPicture', $userPicture, PDO::PARAM_INT);
            $stmt->bindParam(':userDate', $userDate, PDO::PARAM_STR);

            // Kör frågan och sparar användaren
            $stmt->execute();

            // Skickar användaren till inloggningssidan efter registrering
            header('Location: login.php');
            exit;
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