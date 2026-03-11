<?php
// Checks if recipe has a user
if (isset($row['userID'])) {
    // Gets specific post from database
    $sql = "SELECT * FROM users WHERE userID = :id";
    // Prepares a query
    $stmt = $dbh->prepare($sql);
    // Connects GET-variable with db containers
    $stmt->bindValue(':id', $row['userID']);
    $stmt->execute();

    // Adds all information about user to variable
    $user = $stmt->fetch();
}
