<?php
// Checks if registration button has been pressed
if (isset($_POST['delete_recipe'])) {

// Creates a query
$sql = '
DELETE FROM recipes
WHERE recipeID = :recipeID
';

// Prepares query
$stmt = $dbh->prepare($sql);

// Connects form fields with db containers
$stmt->bindValue(':recipeID', $_POST['recipeID']);

// Sends query to database
if ($stmt->execute()) {
header('Location: ../../recipe_view_all.php?action=deleted');
exit();
}
}
?>
