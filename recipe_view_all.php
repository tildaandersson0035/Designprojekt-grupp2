<?php
// Start session FIRST before any other output
session_start();
// Opens database connection 
require_once 'assets/config/db.php';
// Register information to database
require_once 'assets/functions/recipe_select.php';
// User info
require_once 'assets/functions/user_select-id.php';
// Header
require_once 'assets/includes/header.php';
?>

<main class="container mt-5">

<?php
// Checks if an action is set
if (isset($_GET['action'])) {
// Checks which action is set
switch ($_GET['action']) {
case 'inserted':
echo '
<div class="alert alert-success">
Posten har lagts till i databasen!
</div>
';
break;
}
}
?>

<?php
// Checks if an action is set
if (isset($_GET['action'])) {
// Checks which action is set
switch ($_GET['action']) {
case 'updated':
echo '
<div class="alert alert-success">
Posten har uppdaterats i databasen!
</div>
';
break;
}
}
?>

<?php
// Checks if an action is set
if (isset($_GET['action'])) {
// Checks which action is set
switch ($_GET['action']) {
case 'deleted':
echo '
<div class="alert alert-danger">
Posten har raderats från databasen!
</div>
';
break;
}
}
?>


<div class="container">
          <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 g-3">
           
          <?php
// Checks whether database is empty
if ($stmt->rowCount() > 0) {
// Get users from database
while ($row = $stmt->fetch()) {
    ?>

    <div class="col d-flex align-items-stretch position-relative mb-4">

                    <div class="card shadow-sm px-4 py-3" style="z-index: 2; width: 53%; transform: translateY(-10px); margin-right: -20px;">
                        <div class="text-center mb-3">
                            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
                                <small class="text-body-secondary"><?php echo htmlspecialchars($row['recipeCuisine']); ?></small>
                                <small class="text-body-secondary"><?php echo htmlspecialchars($row['recipeProtein']); ?></small>
                                <small class="text-body-secondary"><?php echo htmlspecialchars($row['recipeDifficulty']); ?></small>
                                <small class="text-body-secondary"><?php echo htmlspecialchars($row['recipeTime']); ?> min</small>
                            </div>
                            <h3 class="card-title mt-4 mb-3"><?php echo htmlspecialchars($row['recipeTitle']); ?></h3>
                            
                            <div class="container text-center mt-4">
                                <div class="plate-container">
                                    <img src="photos/<?php echo htmlspecialchars($row['recipePhoto']); ?>" class="plate-border" alt="<?php echo htmlspecialchars($row['recipeTitle']); ?>">
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <p class="text-center">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star-half-stroke"></i>
                                        <i class="fa-regular fa-star"></i>
                                        (45)
                                    </p>
                                    <button type="button" class="btn btn-light btn-sm clickable-top"><i class="fa-regular fa-bookmark"></i></button>
                                    <button type="button" class="btn btn-light btn-sm clickable-top"><i class="fa-regular fa-comment"></i></button>
                                    <button type="button" class="btn btn-light btn-sm clickable-top"><i class="fa-regular fa-star"></i></button>
                                    <button type="button" class="btn btn-light btn-sm clickable-top"><i class="fa-solid fa-utensils"></i></button>
                                </div>
                                <a href="recipe_view_one.php?recipeID=<?php echo $row['recipeID']; ?>" class="link-underline stretched-link">Se recept</a>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow-sm px-4 py-3" style="z-index: 1; width: 47%; margin-top: 10px;">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div style="width: 25%;">
                                    <div class="ratio ratio-1x1">
                                        <img src="assets/images/profilepictures/Picture<?php echo htmlspecialchars($row['userPicture']); ?>.png" class="rounded-circle object-fit-cover" alt="Profilbild">
                                    </div>
                                </div>
                                <p class="card-text fw-bold ms-3 mb-0"><?php echo htmlspecialchars($row['userFirstname'] . ' ' . $row['userSurname']); ?></p> 
                            </div>
                            <a href="recipe_view_one.php?recipeID=<?php echo $row['recipeID']; ?>" class="text-start text-decoration-none text-reset">
                            <p class="text-start" style="display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden;">
                                <?php echo htmlspecialchars($row['recipeDescription']); ?>
                            </p></a>
                            
                            <hr class="my-3" />
                            
                            <div class="comment-section mb-3">
                                <div class="comment mb-3">
                                    <p class="card-text mb-1 small">Kommentarer</p>
                                </div>
                                <a href="recipe_view_one.php?recipeID=<?php echo $row['recipeID']; ?>" class="link-underline">Se alla kommentarer</a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php 
                } // End of while loop
            } else {
                echo '<div class="col-12"><p class="alert alert-info">Inga recept hittades i kokboken.</p></div>';
            }
            ?>

    </div>
    </div>

</main>


<?php
// footer
require_once 'assets/includes/footer.php';
?>