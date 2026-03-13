<?php
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['userID'])) {
        header('Location: login.php');
        exit;
    }

    $userID        = $_SESSION['userID'];
    $userFirstname = trim($_POST['userFirstname'] ?? '');
    $userSurname   = trim($_POST['userSurname'] ?? '');
    $userEmail     = trim($_POST['userEmail'] ?? '');
    $userPicture   = intval($_POST['userPicture'] ?? 1);

    if ($userFirstname === '' || $userSurname === '' || $userEmail === '') {
        $error = 'Fyll i alla fält.';
    } else {
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
        } else {
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

            header('Location: user_view_one.php');
            exit;
        }
    }
}
