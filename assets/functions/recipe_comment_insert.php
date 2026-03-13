<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['commentContent'], $_POST['recipeID'])) {

    if (isset($_SESSION['userID'])) {

        $commentContent = trim($_POST['commentContent']);
        $recipeID = (int)$_POST['recipeID'];
        $userID = $_SESSION['userID'];

        if (!empty($commentContent)) {

            $stmt = $pdo->prepare("
                INSERT INTO recipeComments 
                (recipeID, userID, commentContent) 
                VALUES (?, ?, ?)
            ");

            $stmt->execute([$recipeID, $userID, $commentContent]);
        }

        header("Location: recipe_view_one.php?recipeID=" . $recipeID);
        exit;
    }
}
