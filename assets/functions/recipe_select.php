<?php
// Gets  information from recipes and  users tables
$sql = "SELECT recipes.*, users.userID, users.userPicture, users.userFirstname, users.userSurname
        FROM recipes 
        JOIN users ON recipes.userID = users.userID 
        ORDER BY recipeDate DESC";
// Prepares a query
$stmt = $dbh->prepare($sql);
// Sends query to database
$stmt->execute();
?>
