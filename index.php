<?php
// Start session FIRST before any other output
session_start();
// Opens database connection 
require_once 'assets/config/db.php';
// Omvandlare för att visa dynamiskt månadsnamn på svenska
$months_sv = [
  1 => 'januari',
  2 => 'februari',
  3 => 'mars',
  4 => 'april',
  5 => 'maj',
  6 => 'juni',
  7 => 'juli',
  8 => 'augusti',
  9 => 'september',
  10 => 'oktober',
  11 => 'november',
  12 => 'december'
]; // Månadsnamn på svenska
$monthNumber = date('n'); // Hämtar aktuell månad som nummer
$currentMonth = $months_sv[$monthNumber]; // Hämtar motsvarande månadsnam
// Gets monthly recipes from database
require_once 'assets/functions/recipe_select_monthly.php';
// User info
require_once 'assets/functions/user_select-id.php';
// Header
require_once 'assets/includes/header.php';
?>

<main>
    <!-- Registera dig och intro -->
<div class="start-background">
      <div class="container px-4 pt-5">
        <div class="row align-items-center g-lg-5 pt-5">
            <!-- introtext -->
          <div class="col-lg-8 text-center text-lg-start">
            <h1 class="col-lg-10 display-5 fw-bold 1h-1 mb-3 text-light">
               Vad har du lagat som förtjänar en <emp class= "text-primary">chef's kiss</emp>?
            </h1>
            <p class="col-lg-10 fs-5 text-light">
             Dyk in i den sociala kokboken där matälskare som du och jag inspirerar varandra till nya höjder av matlagning och diskberg!
            </p>
          </div>
          <!-- Registera dig ruta -->
          <div class="col-md-10 mx-auto col-lg-4">
            <form class="p-4 p-md-5 border rounded-3 bg-light ">
              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"/>
                <label for="floatingInput">E-post</label>
              </div>
              <div class="form-floating mb-3">
                <input
                  type="password"
                  class="form-control"
                  id="floatingPassword"
                  placeholder="Password"
                />
                <label for="floatingPassword">Lösenord</label>
              </div>
              <button class="w-100 btn btn-lg btn-dark mb-2 rounded-pill " type="submit">
                Logga in
              </button>
              <small class="text-body-secondary"> Första gången? <a href="register.php">Registera dig här!</a></small>
            </form>
          </div>
        </div>
        <!-- Registera dig ruta -->
        <div class="col-md-10 mx-auto col-lg-4">
          <form class="p-4 p-md-5 border rounded-3 bg-light ">
            <div class="form-floating mb-3">
              <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" />
              <label for="floatingInput">E-post</label>
            </div>
            <div class="form-floating mb-3">
              <input
                type="password"
                class="form-control"
                id="floatingPassword"
                placeholder="Password" />
              <label for="floatingPassword">Lösenord</label>
            </div>
            <button class="w-100 btn btn-lg btn-dark mb-2 rounded-pill " type="submit">
              Registera
            </button>
            <small class="text-body-secondary">Genom att registrera dig godkänner du våra <a href="terms.html">användarvillkor.</a>
              Redan medlem? <a href="log-in.html">logga in här.</a></small>
          </form>
        </div>
      </div>
    </div>
    <!-- Innehåll -->
    <div class="container pb-4 py-5" id="featured-3">
      <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
        <!-- En ruta -->
        <div class="feature col pe-lg-5">
          <div class="feature-icon fs-2 mb-3">
            <i class="fa-solid fa-share text-light"></i>
          </div>
          <h3 class="fs-2 text-light">Dela dina köksäventyr</h3>
          <p class="text-light">
            Vi vet att du sitter på en paradrätt som förtjänar en chef's kiss. Vad gör du som imponerar på dejten eller svärmor eller vardagshjälten?
          </p>
          <a href="#" class="btn btn-secondary rounded-pill my-2 text-dark">Lägg upp egna recept <i class="fa-solid fa-arrow-right"></i></a>
        </div>
        <!-- En ruta -->
        <div class="feature col pe-lg-5">
          <div
            class="feature-icon fs-2 mb-3">
            <i class="fa-solid fa-spoon text-light"></i>
          </div>
          <h3 class="fs-2  text-light">Gör om gör rätt</h3>
          <p class="text-light">
            Hjälp andra att nå en större chef's kiss genom att förbättra deras recept! Kanske har du en hemlig ingrediens eller ett knep att dela med dig av?
          </p>
          <a href="#" class="btn btn-secondary rounded-pill my-2 text-dark">Förbättra andras recept <i class="fa-solid fa-arrow-right"></i></a>
        </div>
        <!-- En ruta -->
        <div class="feature col pe-lg-5">
          <div
            class="feature-icon fs-2 mb-3">
            <i class="fa-solid fa-lightbulb text-light"></i>
          </div>
          <h3 class="fs-2 text-light">Inspireras och diskutera</h3>
          <p class="text-light">
            Här i vår aktiva gemenskap finns en uppsjö av recept som förtjänar en chef's kiss. Kanske är världens bästa köttfärssås bara ett klick bort?
          </p>
          <a href="#" class="btn btn-secondary rounded-pill my-2 text-dark">Bläddra i kokboken <i class="fa-solid fa-arrow-right"></i></a>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid p-0">
    <img src="assets/images/awning_blue.svg" class="w-100 d-block" alt="awning graphic">
</div>
      <!-- Månadens recept galleri -->
       <div class="row py-lg-3 mt-5">
          <div class="col-lg-6 col-md-8 mx-auto text-center">
            <h1 class="fw-regular">Månadens recept</h1>
            <p class="lead text-body-secondary">
              Utvalda gobitar att mumsa på i <?php echo $currentMonth; ?>. 
            </p>
          </div>
        </div>
       <div class="container mt-5">
          <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 g-3">
       <?php
// Checks whether database is empty
if ($stmt->rowCount() > 0) {
// Get items from database
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
                                    <img src="<?php echo htmlspecialchars($row['recipePhoto']); ?>" class="plate-border" alt="<?php echo htmlspecialchars($row['recipeTitle']); ?>">
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

        <!-- Call to action -->
          <div class="text-end mt-4 ">
              <a href="recipe_add.php" class="btn btn-secondary text-dark my-2 rounded-pill">Lägg till eget recept <i class="fa-solid fa-arrow-right"></i></a>
              <a href="recipe_view_all.php" class="btn btn-dark text-light my-2 rounded-pill">Bläddra i hela kokboken <i class="fa-solid fa-arrow-right"></i></a>
            </div>
      


</main>
<?php
// footer
require_once 'assets/includes/footer.php';
?>
