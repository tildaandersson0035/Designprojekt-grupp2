<?php
// Checks whether delete button is pressed
if (isset($_POST['delete'])) {
// Creates a query
$sql = '
DELETE FROM users
WHERE id = :id
';
// Prepares a query
$stmt = $dbh->prepare($sql);
// Connects form fields with db containers
$stmt->bindValue(':id', $_POST['id']);
// Sends query to database
if ($stmt->execute()) {
header('Location: ../../index.php?action=deleted');
exit();
}
}
?>