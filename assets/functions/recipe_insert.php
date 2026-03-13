<?php
// Checks if registration button has been pressed
if (isset($_POST['add_recipe'])) {
    $errors = array();
    $recipePhoto='';

// Checks whether a file has been selected
if ($_FILES['recipePicture']['size'] != 0) {
// Sets max filesize to 20 MB
$max_file_size = 20971520;
// Sets accepted image files
$file_types = array('gif', 'jpg', 'jpeg', 'png');
// Sets folder for upload
$upload_dir = 'photos/';
// Creates array for storing error messages
$errors = array();
// Sets information of uploaded file
$file_tmp = $_FILES['recipePicture']['tmp_name'];
$file_name = $_FILES['recipePicture']['name'];
$file_size = $_FILES['recipePicture']['size'];
$file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
// Sets path to save uploaded file
$recipePhoto = $upload_dir . uniqid() . '.' . $file_ext;
// Checks if file is a photo
if (!getimagesize($file_tmp)) {
$errors[] = 'Uppladdad fil är inte en bild';
}
// Checks photo filesize
if ($file_size > $max_file_size) {
$errors[] = 'Filstorlek överskriden (max 20 MB)';
}
// Checks if uploaded file is an accepted type
if (!in_array($file_ext, $file_types)) {
$errors[] = 'Ej giltig filtyp';
}
// Checks if errors have been set
if (count($errors) == 0) {
// Saves uploaded file to folder
if (move_uploaded_file($file_tmp, $recipePhoto)) {
// Connects path of uploaded file to database
}}}

// Creates a query
$sql = '
INSERT INTO recipes															
 (userID, recipeTitle, recipePhoto, recipeCuisine, recipeProtein, recipeDifficulty, recipeTime, recipeDescription, recipePortions, recipeIngrediens, recipeHow, recipeTips, recipeImprovements, recipeDate, isMonthly)
VALUES (1, :recipeTitle, :recipePhoto, :recipeCuisine, :recipeProtein, :recipeDifficulty, :recipeTime, :recipeDescription, :recipePortions, :recipeIngrediens, :recipeHow, :recipeTips, :recipeImprovements, NOW(), 0)
';
// Prepares query
$stmt = $dbh->prepare($sql);

// Connects form fields with db containers
$stmt->bindValue(':recipeTitle', $_POST['recipeTitle']);
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
$stmt->bindValue(':recipePhoto', $recipePhoto ?? '');

// Sends query to database
if (empty($errors)) {
    if ($stmt->execute()) {
        header('Location: ../../recipe_view_all.php?action=inserted');
        exit();
    }
}
}
?>