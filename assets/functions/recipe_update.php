<?php
if (isset($_POST['edit_recipe'])) {
    $errors = array();
    
    // Validate required fields
    if (empty($_POST['recipeTitle'])) {
        $errors[] = 'Titel är obligatorisk';
    }
    if (empty($_POST['recipeTime'])) {
        $errors[] = 'Tid är obligatorisk';
    }
    if (empty($_POST['recipePortions'])) {
        $errors[] = 'Portioner är obligatoriska';
    }
    
    $recipePhoto = $_POST['recipePhoto'] ?? ''; // Keep existing path by default

    // Only process file upload if a file was selected
    if (isset($_FILES['recipePicture']) && $_FILES['recipePicture']['size'] != 0) {
        $max_file_size = 20971520;
        $file_types = array('gif', 'jpg', 'jpeg', 'png', 'webp');
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

    // Only update if no errors
    if (empty($errors)) {
        $sql = 'UPDATE recipes SET recipeTitle = :recipeTitle, recipePhoto = :recipePhoto, recipeCuisine = :recipeCuisine, recipeProtein = :recipeProtein, recipeDifficulty = :recipeDifficulty, recipeTime = :recipeTime, recipeDescription = :recipeDescription, recipePortions = :recipePortions, recipeIngrediens = :recipeIngrediens, recipeHow = :recipeHow, recipeTips = :recipeTips, recipeImprovements = :recipeImprovements, recipeDate = NOW() WHERE recipeID = :recipeID';
        
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
        $stmt->bindValue(':recipeID', $_POST['recipeID']);
        
        if ($stmt->execute()) {
            header('Location: ../../recipe_view_all.php?action=updated');
            exit();
        }
    }
}
?>