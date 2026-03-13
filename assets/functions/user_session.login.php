<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userEmail = trim($_POST['email'] ?? '');
    $userPassword = trim($_POST['password'] ?? '');

    if ($userEmail === '' || $userPassword === '') {
        $error = 'Fyll i både e-post och lösenord.';
    } else {
        $sql = "SELECT * FROM users
                WHERE userEmail = :userEmail
                AND userPassword = :userPassword
                LIMIT 1";

        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':userEmail', $userEmail, PDO::PARAM_STR);
        $stmt->bindParam(':userPassword', $userPassword, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch();

        if ($user) {
            $_SESSION['userID'] = $user['userID'];
            header('Location: index.php');
            exit;
        } else {
            $error = 'Fel e-post eller lösenord.';
        }
    }
}
