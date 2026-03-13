<?php
// Start session
session_start();
// Opens database connection 
require_once 'assets/config/db.php';
// Get information from database
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
Receptet har lagts till!
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
Receptet har uppdaterats!
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
Receptet har raderats!
</div>
';
                break;
        }
    }
    ?>

    <?php
    // Filtrering/kategorisering för recept
    ?>
    <div class="row">
        <div class="col-lg-2 mb-4">
            <div class="shadow-sm p-3 bg-body-tertiary rounded">
                <h5 class="mb-3">Filtrera recept</h5>

                <form method="GET">
                    <div class="mb-3">
                        <select name="cuisine" class="form-select form-select-sm">
                            <option value="">Alla kök</option>
                            <option value="Italienskt" <?= (isset($_GET['cuisine']) && $_GET['cuisine'] === 'Italienskt') ? 'selected' : ''; ?>>Italienskt</option>
                            <option value="Svenskt" <?= (isset($_GET['cuisine']) && $_GET['cuisine'] === 'Svenskt') ? 'selected' : ''; ?>>Svenskt</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <select name="protein" class="form-select form-select-sm">
                            <option value="">Alla proteiner</option>
                            <option value="Fläsk" <?= (isset($_GET['protein']) && $_GET['protein'] === 'Fläsk') ? 'selected' : ''; ?>>Fläsk</option>
                            <option value="Kyckling" <?= (isset($_GET['protein']) && $_GET['protein'] === 'Kyckling') ? 'selected' : ''; ?>>Kyckling</option>
                            <option value="Nöt" <?= (isset($_GET['protein']) && $_GET['protein'] === 'Nöt') ? 'selected' : ''; ?>>Nöt</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <select name="difficulty" class="form-select form-select-sm">
                            <option value="">Alla nivåer</option>
                            <option value="Lätt" <?= (isset($_GET['difficulty']) && $_GET['difficulty'] === 'Lätt') ? 'selected' : ''; ?>>Lätt</option>
                            <option value="Mellan" <?= (isset($_GET['difficulty']) && $_GET['difficulty'] === 'Mellan') ? 'selected' : ''; ?>>Mellan</option>
                        </select>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-sm">Filtrera</button>
                        <a href="recipe_view_all.php" class="btn btn-outline-secondary btn-sm">Rensa filter</a>
                    </div>
                </form>
            </div>
        </div>
        <?php
        // Slut på filtrering/kategorisering för recept
        ?>

        <div class="col-lg-10">
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4">

                <?php
                // Checks whether database is empty
                if ($stmt->rowCount() > 0) {
                    // Get users from database
                    while ($row = $stmt->fetch()) {
                ?>

                        <div class="col d-flex align-items-stretch position-relative mb-4">
                            <div class="shadow p-3 mb-5 bg-body-tertiary rounded">

                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <small class="text-body-secondary text-first-capitalize"><?php echo $row['recipeCuisine']; ?></small>
                                        <small class="text-body-secondary text-first-capitalize"><?php echo $row['recipeProtein']; ?></small>
                                        <small class="text-body-secondary text-first-capitalize"><?php echo $row['recipeDifficulty']; ?></small>
                                        <small class="text-body-secondary text-first-capitalize"><?php echo $row['recipeTime']; ?> min</small>
                                    </div>

                                    <h4 class="card-title text-center mb-4 fs-3 text-first-capitalize">
                                        <?php echo ucfirst($row['recipeTitle']); ?>
                                    </h4>

                                    <div class="container text-center mb-4">
                                        <div class="plate-container-small">
                                            <img src="<?php echo $row['recipePhoto']; ?>" class="plate-border" alt="<?php echo $row['recipeTitle']; ?>">
                                        </div>
                                    </div>

                                    <div class="text-center mb-4">
                                        <p class="mb-2 text-warning mb-3 fs-6">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star-half-stroke"></i>
                                            <i class="fa-regular fa-star"></i>
                                            <span class="text-muted">(45)</span>
                                        </p>
                                        <div class="d-flex justify-content-center gap-2">
                                            <button type="button" class="btn btn-light btn-sm clickable-top rounded-circle"><i class="fa-regular fa-bookmark"></i></button>
                                            <button type="button" class="btn btn-light btn-sm clickable-top rounded-circle"><i class="fa-regular fa-comment"></i></button>
                                            <button type="button" class="btn btn-light btn-sm clickable-top rounded-circle"><i class="fa-solid fa-utensils"></i></button>
                                        </div>
                                    </div>

                                    <hr class="my-3 opacity-25">

                                    <div class="d-flex align-items-center mb-2">
                                        <img src="assets/images/profilepictures/Picture<?= $row['userPicture'] ?? '1' ?>.png"
                                            class="rounded-circle border"
                                            style="width: 28px; height: 28px; object-fit: cover;" alt="Profilbild">
                                        <small class="fw-bold ms-2 mb-0 fw-semibold">
                                            <?= $row['userFirstname'] . " " . $row['userSurname'] ?>
                                        </small>
                                    </div>

                                    <small class="card-text text-start mb-2 fw-light line-clamp-2 text-first-capitalize">
                                        <?= $row['recipeDescription'] ?>
                                    </small>

                                    <div class="text-center">
                                        <a href="recipe_view_one.php?recipeID=<?php echo $row['recipeID']; ?>"
                                            class="link-underline stretched-link">Se recept</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                <?php
                     } 
                } else {
                    echo '<div class="col-12"><p class="alert alert-info">Inga recept hittades i kokboken.</p></div>';
                }
                ?>

            </div>
        </div>
    </div>

</main>


<?php
// footer
require_once 'assets/includes/footer.php';
?>