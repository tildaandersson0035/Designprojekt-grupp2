<?php
// Checks if registration button has been pressed
if (isset($_POST['edit_recipe'])) {

// Creates a query
$sql = '
UPDATE recipes															
 SET recipeTitle = :recipeTitle, recipePhoto = :recipePhoto, recipeCuisine = :recipeCuisine, recipeProtein = :recipeProtein, recipeDifficulty = :recipeDifficulty, recipeTime = :recipeTime, recipeDescription = :recipeDescription, recipePortions = :recipePortions, recipeIngrediens = :recipeIngrediens, recipeHow = :recipeHow, recipeTips = :recipeTips, recipeImprovements = :recipeImprovements, recipeDate = NOW()
 WHERE recipeID = :recipeID
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
$stmt->bindValue(':recipeID', $_POST['recipeID']);

// Sends query to database
try {
    $stmt->execute();
header('Location: ../../recipe_view_all.php?action=updated');
}
catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
}
?>
