<?php
if (isset($_POST['iterate_recipe'])) {
    $errors = array();
    $recipePhoto = $_POST['recipePhoto'] ?? ''; // Use existing photo by default

    // Allow uploading a new photo for the iteration
    if (isset($_FILES['recipePicture']) && $_FILES['recipePicture']['size'] != 0) {
        $max_file_size = 20971520;
        $file_types = array('gif', 'jpg', 'jpeg', 'png');
        $upload_dir = 'photos/';
        
        $file_tmp = $_FILES['recipePicture']['tmp_name'];
        $file_name = $_FILES['recipePicture']['name'];
        $file_size = $_FILES['recipePicture']['size'];
        $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $recipePhoto = $upload_dir . uniqid() . '.' . $file_ext;
        
        if (!getimagesize($file_tmp)) {
            $errors[] = 'Uppladdad fil är inte en bild';
        }
        if ($file_size > $max_file_size) {
            $errors[] = 'Filstorlek överskriden (max 20 MB)';
        }
        if (!in_array($file_ext, $file_types)) {
            $errors[] = 'Ej giltig filtyp';
        }
        
        if (count($errors) == 0) {
            move_uploaded_file($file_tmp, $recipePhoto);
        }
    }

    // Create new recipe if no errors
    if (empty($errors)) {
        $sql = 'INSERT INTO recipes (userID, recipeTitle, recipePhoto, recipeCuisine, recipeProtein, recipeDifficulty, recipeTime, recipeDescription, recipePortions, recipeIngrediens, recipeHow, recipeTips, recipeImprovements, recipeDate, isMonthly) VALUES (1, :recipeTitle, :recipePhoto, :recipeCuisine, :recipeProtein, :recipeDifficulty, :recipeTime, :recipeDescription, :recipePortions, :recipeIngrediens, :recipeHow, :recipeTips, :recipeImprovements, NOW(), 0)';
        
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':recipeTitle', $_POST['recipeTitle']);
        $stmt->bindValue(':recipePhoto', $recipePhoto);
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
        
        if ($stmt->execute()) {
            header('Location: recipe_view_all.php?action=iterated');
            exit();
        }
    }
}
?>