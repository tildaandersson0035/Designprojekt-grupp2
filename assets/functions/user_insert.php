<?php
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userFirstname    = trim($_POST['userFirstname'] ?? '');
    $userSurname      = trim($_POST['userSurname'] ?? '');
    $userEmail        = trim($_POST['userEmail'] ?? '');
    $userPassword     = trim($_POST['userPassword'] ?? '');
    $confirmPassword  = trim($_POST['confirmPassword'] ?? '');
    $userPicture      = intval($_POST['userPicture'] ?? 1);
    $userDate         = date('Y-m-d H:i:s');

    if (
        $userFirstname === '' ||
        $userSurname === '' ||
        $userEmail === '' ||
        $userPassword === '' ||
        $confirmPassword === ''
    ) {
        $error = 'Fyll i alla fält.';
    } elseif ($userPassword !== $confirmPassword) {
        $error = 'Lösenorden matchar inte.';
    } else {
        $checkSql = "SELECT userID FROM users WHERE userEmail = :userEmail LIMIT 1";
        $checkStmt = $dbh->prepare($checkSql);
        $checkStmt->bindParam(':userEmail', $userEmail, PDO::PARAM_STR);
        $checkStmt->execute();

        if ($checkStmt->fetch()) {
            $error = 'Den e-postadressen används redan.';
        } else {
            $sql = "INSERT INTO users
                    (userFirstname, userSurname, userEmail, userPassword, userPicture, userDate)
                    VALUES
                    (:userFirstname, :userSurname, :userEmail, :userPassword, :userPicture, :userDate)";

            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':userFirstname', $userFirstname, PDO::PARAM_STR);
            $stmt->bindParam(':userSurname', $userSurname, PDO::PARAM_STR);
            $stmt->bindParam(':userEmail', $userEmail, PDO::PARAM_STR);
            $stmt->bindParam(':userPassword', $userPassword, PDO::PARAM_STR);
            $stmt->bindParam(':userPicture', $userPicture, PDO::PARAM_INT);
            $stmt->bindParam(':userDate', $userDate, PDO::PARAM_STR);
            $stmt->execute();

            header('Location: login.php');
            exit;
        }
    }
}
