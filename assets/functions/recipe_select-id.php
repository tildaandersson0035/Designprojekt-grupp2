<?php

// Initialize with blank values
$row = [
    'recipeID' => '',
    'recipeTitle' => '',
    'recipePhoto' => '',
    'recipeCuisine' => '',
    'recipeProtein' => '',
    'recipeDifficulty' => '',
    'recipeTime' => '',
    'recipeDescription' => '',
    'recipePortions' => '',
    'recipeIngrediens' => '',
    'recipeHow' => '',
    'recipeTips' => '',
    'recipeImprovements' => ''
];

// Check for recipeID in both GET (initial load) and POST (form submission)
$id = $_GET['recipeID'] ?? $_POST['recipeID'] ?? null;

if (isset($id) && !empty($id)) {
    $sql = 'SELECT * FROM recipes WHERE recipeID = :recipeID';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':recipeID', $id);
    $stmt->execute();
    $row = $stmt->fetch();
}
?>