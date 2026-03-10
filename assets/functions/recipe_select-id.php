<?php
// Checks whether recipeID is available as GET
if (isset($_GET['recipeID'])) {
// Gets specific post from database
$sql = 'SELECT * FROM recipes WHERE recipeID = :recipeID';
// Prepares a query
$stmt = $dbh->prepare($sql);
// Connects GET-variable with db containers
$stmt->bindValue(':recipeID', $_GET['recipeID']);
// Sends query to database
$stmt->execute();
// Adds all information about recipe to variable
$row = $stmt->fetch();
}
?>