<?php
// Checks if iteration button has been pressed
if (isset($_POST['iterate_recipe'])) {

// Creates a query to insert a NEW recipe based on the original
$sql = '
INSERT INTO recipes																
 (userID, recipeTitle, recipePhoto, recipeCuisine, recipeProtein, recipeDifficulty, recipeTime, recipeDescription, recipePortions, recipeIngrediens, recipeHow, recipeTips, recipeImprovements, recipeDate, isMonthly)
VALUES (1, :recipeTitle, :recipePhoto, :recipeCuisine, :recipeProtein, :recipeDifficulty, :recipeTime, :recipeDescription, :recipePortions, :recipeIngrediens, :recipeHow, :recipeTips, :recipeImprovements, NOW(), 0)
';

// Prepares query
$stmt = $dbh->prepare($sql);

// Connects form fields with db containers
$stmt->bindValue(':recipeTitle', $_POST['recipeTitle']);
$stmt->bindValue(':recipePhoto', $_POST['recipePhoto']);
$stmt->bindValue(':recipeCuisine', $_POST['recipeCuisine']);
$stmt->bindValue(':recipeProtein', $_POST['recipeProtein']);
$stmt->bindValue(':recipeDifficulty', $_POST['recipeDifficulty']);
$stmt->bindValue(':recipeTime', $_POST['recipeTime']);
$stmt->bindValue(':recipeDescription', $_POST['recipeDescription']);
$stmt->bindValue(':recipePortions', $_POST['recipePortions']);
$stmt->bindValue(':recipeIngrediens', $_POST['recipeIngrediens']);
$stmt->bindValue(':recipeHow', $_POST['recipeHow']);
$stmt->bindValue(':recipeTips', $_POST['recipeTips']);
$stmt->bindValue(':recipeImprovements', $_POST['recipeImprovements']);

// Sends query to database
if ($stmt->execute()) {
    header('Location: recipe_view_all.php?action=iterated');
    exit();
}
}
?>
