<?php
// Start session
session_start();
// Opens database connection 
require_once 'assets/config/db.php';
// Register information to database
require_once 'assets/functions/recipe_update.php';
// Deletes information from database
require_once 'assets/functions/recipe_delete.php';
// Recipe info
require_once 'assets/functions/recipe_select-id.php';
// User info
require_once 'assets/functions/user_select-id.php';
// Header
require_once 'assets/includes/header.php';
?>

<main class="container mt-5">
  <div class="row">
    <div class="col-8">

      <h1 class="px-3 mb-4 fw-bold"><?php echo ucfirst($row['recipeTitle']); ?></h1>

      <div class="plate-container-big">
        <img src="<?php echo $row['recipePhoto']; ?>" class="plate-border" alt="<?php echo $row['recipeTitle']; ?>">
      </div>

      <div class="px-3 mb-4">
        <h2 class="fw-bold mb-3">Detta behöver du</h2>
        <p><?= $row['recipeIngrediens']; ?></p>
      </div>

      <div class="px-3 mb-4">
        <h2 class="fw-bold mb-3">Gör såhär</h2>
        <p><?php echo $row['recipeHow']; ?></p>
      </div>
    </div>

    <div class="col-4">
      <div class="d-flex align-items-center mb-3">
        <img src="assets/images/profilepictures/Picture<?= $user['userPicture'] ?? '1' ?>.png"
          class="rounded-circle border"
          style="width: 35px; height: 35px; object-fit: cover;" alt="Profilbild">

        <span class="fs-5 fw-semibold ms-2">
          <?= $user['userFirstname'] . " " . $user['userSurname'] ?>
        </span>
      </div>

      <p><?php echo $row['recipeDescription']; ?></p>

      <p>Antal portioner: <?php echo $row['recipePortions']; ?></p>

      <div class="row text-center mt-4 pb-3 border-bottom">
        <div class="col-3">
          <i class="fa-solid fa-flag fa-fw d-block mx-auto mb-1 text-primary"></i>
          <span class="fw-medium small text-first-capitalize d-inline-block"><?= $row['recipeCuisine'] ?></span>
        </div>
        <div class="col-3">
          <i class="fa-solid fa-utensils fa-fw d-block mx-auto mb-1 text-primary"></i>
          <span class="fw-medium small text-first-capitalize d-inline-block"><?= $row['recipeProtein'] ?></span>
        </div>
        <div class="col-3">
          <i class="fa-solid fa-chart-simple fa-fw d-block mx-auto mb-1 text-primary"></i>
          <span class="fw-medium small text-first-capitalize d-inline-block"><?= $row['recipeDifficulty'] ?></span>
        </div>
        <div class="col-3">
          <i class="fa-solid fa-clock fa-fw d-block mx-auto mb-1 text-primary"></i>
          <span class="fw-medium small text-first-capitalize d-inline-block"><?= $row['recipeTime'] ?> min</span>
        </div>
      </div>

      <div class="bg-body-tertiary rounded mt-4 p-3">
        <h3>Tips</h3>
        <p><?php echo $row['recipeTips']; ?></p>
      </div>

      <div class="bg-body-tertiary rounded mt-4 p-3">
        <h3>Förbättringar</h3>
        <p><?php echo $row['recipeImprovements']; ?></p>
      </div>

      <div class="d-grid gap-2 mt-4">
        <?php
        // Is user logged in and is it users recipe?
        if (isset($_SESSION['userID']) && $_SESSION['userID'] == $row['userID']):
        ?>
          <a href="recipe_edit.php?mode=edit&recipeID=<?= $row['recipeID']; ?>" class="btn btn-primary text-light rounded-pill">
            <i class="fa-solid fa-pen me-2"></i>Redigera/ radera recept
          </a>

        <?php else: ?>
          <a href="recipe_edit.php?mode=iterate&recipeID=<?= $row['recipeID']; ?>" class="btn btn-warning text-dark rounded-pill">
            <i class="fa-solid fa-utensils me-2"></i>Gör om gör rätt
          </a>          
        <?php endif; ?>
      </div>
    </div>
  </div>

</main>


<?php
// footer
require_once 'assets/includes/footer.php';
?>