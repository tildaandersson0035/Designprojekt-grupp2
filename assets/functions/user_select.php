<?php

// SQL-fråga som hämtar alla användare från databasen
$sql = "SELECT * FROM users ORDER BY userID DESC";

// Förbereder SQL-frågan
$stmt = $dbh->prepare($sql);

// Kör frågan
$stmt->execute();

// Hämtar alla användare och sparar dem i en array
$users = $stmt->fetchAll();

/*
PHP-taggen avslutas inte i slutet av filen.

Detta är en vanlig praxis i PHP eftersom det förhindrar
att oavsiktliga mellanslag eller radbrytningar skickas
till webbläsaren. Det kan annars orsaka fel vid t.ex.
redirects med header().
*/