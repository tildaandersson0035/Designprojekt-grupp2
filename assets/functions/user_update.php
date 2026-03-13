<?php

// Variabel för felmeddelanden som kan visas på redigeringssidan
$error = '';

// Kontrollerar att formuläret skickats via POST
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

    // Hämtar och rensar formulärdata
    $userFirstname   = trim($_POST['userFirstname'] ?? '');
    $userSurname     = trim($_POST['userSurname'] ?? '');
    $userEmail       = trim($_POST['userEmail'] ?? '');
    $userPicture     = intval($_POST['userPicture'] ?? 1);

    // Fält för eventuellt nytt lösenord
    $userPassword    = trim($_POST['userPassword'] ?? '');
    $confirmPassword = trim($_POST['confirmPassword'] ?? '');

    // Kontrollerar att obligatoriska fält är ifyllda
    if ($userFirstname === '' || $userSurname === '' || $userEmail === '') {
        $error = 'Fyll i alla obligatoriska fält.';
    }

    // Kontrollerar att nya lösenord matchar om användaren valt att byta lösenord
    elseif (($userPassword !== '' || $confirmPassword !== '') && $userPassword !== $confirmPassword) {
        $error = 'De nya lösenorden matchar inte.';
    }

    else {

        // Kontrollerar att e-postadressen inte används av någon annan användare
        $checkSql = "SELECT userID FROM users 
                     WHERE userEmail = :userEmail 
                     AND userID != :userID 
                     LIMIT 1";

        $checkStmt = $dbh->prepare($checkSql);
        $checkStmt->bindParam(':userEmail', $userEmail, PDO::PARAM_STR);
        $checkStmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $checkStmt->execute();

        if ($checkStmt->fetch()) {
            $error = 'Den e-postadressen används redan.';
        }

        else {

            // Om användaren har skrivit ett nytt lösenord ska det uppdateras
            if ($userPassword !== '') {

                // Hashar det nya lösenordet innan det sparas
                $hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);

                // SQL-fråga som uppdaterar alla användaruppgifter inklusive lösenord
                $sql = "UPDATE users
                        SET userFirstname = :userFirstname,
                            userSurname = :userSurname,
                            userEmail = :userEmail,
                            userPicture = :userPicture,
                            userPassword = :userPassword
                        WHERE userID = :userID";

                $stmt = $dbh->prepare($sql);
                $stmt->bindParam(':userFirstname', $userFirstname, PDO::PARAM_STR);
                $stmt->bindParam(':userSurname', $userSurname, PDO::PARAM_STR);
                $stmt->bindParam(':userEmail', $userEmail, PDO::PARAM_STR);
                $stmt->bindParam(':userPicture', $userPicture, PDO::PARAM_INT);
                $stmt->bindParam(':userPassword', $hashedPassword, PDO::PARAM_STR);
                $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
                $stmt->execute();
            }

            else {

                // Om inget nytt lösenord angavs uppdateras bara övriga uppgifter
                $sql = "UPDATE users
                        SET userFirstname = :userFirstname,
                            userSurname = :userSurname,
                            userEmail = :userEmail,
                            userPicture = :userPicture
                        WHERE userID = :userID";

                $stmt = $dbh->prepare($sql);
                $stmt->bindParam(':userFirstname', $userFirstname, PDO::PARAM_STR);
                $stmt->bindParam(':userSurname', $userSurname, PDO::PARAM_STR);
                $stmt->bindParam(':userEmail', $userEmail, PDO::PARAM_STR);
                $stmt->bindParam(':userPicture', $userPicture, PDO::PARAM_INT);
                $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
                $stmt->execute();
            }

            // Skickar tillbaka användaren till profilsidan efter uppdatering
            header('Location: user_view_one.php');
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