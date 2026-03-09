<?php
// Checks whether delete button is pressed
if (isset($_POST['delete_recipe'])) {
// Creates a query
$sql = '
DELETE FROM recipes
WHERE recipeID = :recipeID
';
// Prepares a query
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