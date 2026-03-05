<?php
// Omvandlare för att visa dynamiskt månadsnamn på svenska
$months_sv = [
    1 => 'januari', 2 => 'februari', 3 => 'mars', 4 => 'april',
    5 => 'maj', 6 => 'juni', 7 => 'juli', 8 => 'augusti',
    9 => 'september', 10 => 'oktober', 11 => 'november', 12 => 'december'
]; // Månadsnamn på svenska
$monthNumber = date('n'); // Hämtar aktuell månad som nummer
$currentMonth = $months_sv[$monthNumber]; // Hämtar motsvarande månadsnam
// User info
require_once 'assets/functions/user_select-id.php';
// Header
require_once 'assets/includes/header.php';
?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <title>Chef's Kiss</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/album.css">
</head>
<body>
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
                Registera
              </button>
              <small class="text-body-secondary"
                >Genom att registrera dig godkänner du våra <a href="terms.html">användarvillkor.</a>
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
      <div class="album py-5 bg-body-tertiary">
        <!-- Månadens recept text -->
        <div class="row py-lg-3">
          <div class="col-lg-6 col-md-8 mx-auto text-center">
            <h1 class="fw-regular">Månadens recept</h1>
            <p class="lead text-body-secondary">
              Utvalda gobitar att mumsa på i <?php echo $currentMonth; ?>. 
            </p>
          </div>
        </div>
        <div class="container">
          <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 g-3">
           <!-- Ett recept -->
          <div class="d-flex align-items-stretch position-relative">

          <!-- Kort 1 -->
            <div class="card shadow-sm px-4 py-3" style="z-index: 2; width: 53%; transform: translateY(-10px); margin-right: -20px;">
            
            <div class="text-center mb-3">
              <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
                  <small class="text-body-secondary">Italienskt</small>
                  <small class="text-body-secondary">Fläsk</small>
                  <small class="text-body-secondary">Medium</small>
                    <small class="text-body-secondary">30 min</small>
                  </div>
                <h3 class="card-title mt-4 mb-3">Pasta carbonara</h3>
                
                <div class="container">
  </div>
  <div class="container text-center mt-4">
    <div class="plate-container">
   <img src="photos/example.png" class="plate-border" alt="recipeTitle">
   </div>
            </div>
                <div class="card-body">
                  <div class="text-center mb-3">
    <p class="text-center "> <!-- Stjärnor för betyg  (behöver lägga till betyg från databasen och text för skärmläsare-->
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star-half-stroke"></i>
        <i class="fa-regular fa-star"></i>
         (45)</p>
            <button type="button" class="btn btn-light btn-sm clickable-top"><i class="fa-regular fa-bookmark"></i></button>
            <button type="button" class="btn btn-light btn-sm clickable-top"><i class="fa-regular fa-comment"></i></button>
            <button type="button" class="btn btn-light btn-sm clickable-top"><i class="fa-regular fa-star"></i></button>
            <button type="button" class="btn btn-light btn-sm clickable-top"><i class="fa-solid fa-utensils"></i></button>
        </div>
        <a href="recept.php" class="link-underline stretched-link">Se recept</a>
              </div>
                </div>
              </div>


              <!-- Kort 2 -->
<div class="card shadow-sm px-4 py-3" style="z-index: 1; width: 47%; margin-top: 10px;">
    <div class="card-body">

    <div class="d-flex ">
        <div style="width: 10%;">
            <div class="ratio ratio-1x1">
                <img src="assets/images/profilepictures/Picture1.png" 
                     class="rounded-circle object-fit-cover" 
                     alt=" $recipeChefName profile picture">
            </div>
        </div>
        <p class="card-text fw-bold ms-3 mb-0"> Per Pasta</p> 
    </div>
    <p class="text-start" style="display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden;">
            En härligt krämig carbonara med krispigt stekt bacon, parmesanost och len grädde som toppas att nymalen svartpeppar och rucola. Lika god en fredagskväll eller som till lyxlunch på helgen.
        
        
        
          </p>
        
           
        
    
        <hr class="my-3" />
        <div class="comment-section mb-3">

            <div class="comment mb-3"> <!-- Kommentar 1 -->
                <div class="d-flex align-items-center mb-2">
                      <div class="ratio ratio-1x1" style="width: 10%;">
                            <img src="assets/images/profilepictures/Picture2.png" class="rounded-circle object-fit-cover" alt="$recipeChefName profile picture">
                    </div>
                    <p class="card-text fw-bold ms-2 mb-0 small">Lisa Larsson</p>
                </div>
                <p class="card-text mb-1 small" style="display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden;">Carbonara med grädde? Nä nu räcker det</p>
              </div>

              <div class="comment mb-3"> <!-- Kommentar 2 -->
                <div class="d-flex align-items-center mb-2">
                      <div class="ratio ratio-1x1" style="width: 10%;">
                            <img src="assets/images/profilepictures/Picture3.png" class="rounded-circle object-fit-cover" alt="$recipeChefName profile picture">
                    </div>
                    <p class="card-text fw-bold ms-2 mb-0 small">Lennart Legend</p>
                </div>
                <p class="card-text mb-1 small" style="display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden;">Gjorde denna på en dejt, vi har 4 barn nu </p>
              </div>

                    <a href="recept.php" class="link-underline stretched-link">Se alla kommentarer</a>
        </div>
    </div>
</div>
    </div>
    <!-- Ett recept -->
           <div class="d-flex align-items-stretch position-relative">

          <!-- Kort 1 -->
            <div class="card shadow-sm px-4 py-3" style="z-index: 2; width: 53%; transform: translateY(-10px); margin-right: -20px;">
            
            <div class="text-center mb-3">
              <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
                  <small class="text-body-secondary">Italienskt</small>
                  <small class="text-body-secondary">Fläsk</small>
                  <small class="text-body-secondary">Medium</small>
                    <small class="text-body-secondary">30 min</small>
                  </div>
                <h3 class="card-title mt-4 mb-3">Pasta carbonara</h3>
                
                <div class="container">
  </div>
  <div class="container text-center mt-4">
    <div class="plate-container">
   <img src="photos/example.png" class="plate-border" alt="recipeTitle">
   </div>
            </div>
                <div class="card-body">
                  <div class="text-center mb-3">
    <p class="text-center "> <!-- Stjärnor för betyg  (behöver lägga till betyg från databasen och text för skärmläsare-->
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star-half-stroke"></i>
        <i class="fa-regular fa-star"></i>
         (45)</p>
            <button type="button" class="btn btn-light btn-sm clickable-top"><i class="fa-regular fa-bookmark"></i></button>
            <button type="button" class="btn btn-light btn-sm clickable-top"><i class="fa-regular fa-comment"></i></button>
            <button type="button" class="btn btn-light btn-sm clickable-top"><i class="fa-regular fa-star"></i></button>
            <button type="button" class="btn btn-light btn-sm clickable-top"><i class="fa-solid fa-utensils"></i></button>
        </div>
        <a href="recept.php" class="link-underline stretched-link">Se recept</a>
              </div>
                </div>
              </div>

              <!-- Kort 2 -->
<div class="card shadow-sm px-4 py-3" style="z-index: 1; width: 47%; margin-top: 10px;">
    <div class="card-body">

    <div class="d-flex ">
        <div style="width: 10%;">
            <div class="ratio ratio-1x1">
                <img src="assets/images/profilepictures/Picture1.png" 
                     class="rounded-circle object-fit-cover" 
                     alt=" $recipeChefName profile picture">
            </div>
        </div>
        <p class="card-text fw-bold ms-3 mb-0"> Per Pasta</p> 
    </div>
    <p class="text-start" style="display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden;">
            En härligt krämig carbonara med krispigt stekt bacon, parmesanost och len grädde som toppas att nymalen svartpeppar och rucola. Lika god en fredagskväll eller som till lyxlunch på helgen.
          </p>
        <hr class="my-3" />
        <div class="comment-section mb-3">

            <div class="comment mb-3"> <!-- Kommentar 1 -->
                <div class="d-flex align-items-center mb-2">
                      <div class="ratio ratio-1x1" style="width: 10%;">
                            <img src="assets/images/profilepictures/Picture2.png" class="rounded-circle object-fit-cover" alt="$recipeChefName profile picture">
                    </div>
                    <p class="card-text fw-bold ms-2 mb-0 small">Lisa Larsson</p>
                </div>
                <p class="card-text mb-1 small" style="display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden;">Carbonara med grädde? Nä nu räcker det</p>
              </div>

              <div class="comment mb-3"> <!-- Kommentar 2 -->
                <div class="d-flex align-items-center mb-2">
                      <div class="ratio ratio-1x1" style="width: 10%;">
                            <img src="assets/images/profilepictures/Picture3.png" class="rounded-circle object-fit-cover" alt="$recipeChefName profile picture">
                    </div>
                    <p class="card-text fw-bold ms-2 mb-0 small">Lennart Legend</p>
                </div>
                <p class="card-text mb-1 small" style="display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden;">Gjorde denna på en dejt, vi har 4 barn nu </p>
              </div>

                    <a href="recept.php" class="link-underline stretched-link">Se alla kommentarer</a>
        </div>
    </div>
    </div>
    </div>
    </div>
        <!-- Call to action -->
          <div class="text-end mt-4 ">
              <a href="#" class="btn btn-dark text-light my-2 rounded-pill">Bläddra i hela kokboken <i class="fa-solid fa-arrow-right"></i></a>
            </div>
      </div>
</div>
</body>
</html>