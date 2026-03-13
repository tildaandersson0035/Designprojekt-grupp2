<?php
// Gets information from recipes and users tables
$sql = "SELECT recipes.*, users.userID, users.userPicture, users.userFirstname, users.userSurname
        FROM recipes 
        JOIN users ON recipes.userID = users.userID
        WHERE 1=1";

$params = [];

// Filter: cuisine
if (!empty($_GET['cuisine'])) {
    $sql .= " AND recipes.recipeCuisine = ?";
    $params[] = $_GET['cuisine'];
}

// Filter: protein
if (!empty($_GET['protein'])) {
    $sql .= " AND recipes.recipeProtein = ?";
    $params[] = $_GET['protein'];
}

// Filter: difficulty
if (!empty($_GET['difficulty'])) {
    $sql .= " AND recipes.recipeDifficulty = ?";
    $params[] = $_GET['difficulty'];
}

// Sorts recipes by latest date
$sql .= " ORDER BY recipeDate DESC";

// Prepares a query
$stmt = $dbh->prepare($sql);

// Sends query to database
$stmt->execute($params);
?>