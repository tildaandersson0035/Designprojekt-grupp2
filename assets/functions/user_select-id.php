<?php

// Kontrollerar att receptet har ett kopplat användar-id
if (isset($row['userID'])) {

    // SQL-fråga som hämtar användaren som skapade receptet
    $sql = "SELECT * FROM users WHERE userID = :id";

    // Förbereder SQL-frågan
    $stmt = $dbh->prepare($sql);

    // Kopplar användarens id till SQL-parametern
    $stmt->bindValue(':id', $row['userID']);

    // Kör frågan
    $stmt->execute();

    // Hämtar användarens information från databasen
    $user = $stmt->fetch();
}

/*
PHP-taggen avslutas inte i slutet av filen.

Detta är en vanlig praxis i PHP eftersom det förhindrar
att oavsiktliga mellanslag eller radbrytningar skickas
till webbläsaren. Det kan annars orsaka fel vid t.ex.
redirects med header().
*/
