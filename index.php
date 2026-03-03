<?php
// Omvandlare för att visa dynamiskt månadsnamn på svenska
$months_sv = [
    1 => 'januari', 2 => 'februari', 3 => 'mars', 4 => 'april',
    5 => 'maj', 6 => 'juni', 7 => 'juli', 8 => 'augusti',
    9 => 'september', 10 => 'oktober', 11 => 'november', 12 => 'december'
]; // Månadsnamn på svenska
$monthNumber = date('n'); // Hämtar aktuell månad som nummer
$currentMonth = $months_sv[$monthNumber]; // Hämtar motsvarande månadsnam
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
      <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div class="row align-items-center g-lg-5 py-5">
            <!-- introtext -->
          <div class="col-lg-7 text-center text-lg-start">
            <h1 class="display-5 fw-bold 1h-1 text-body-emphasis mb-3">
               Vad har du lagat som förtjärnar en chef's kiss?
            </h1>
            <p class="col-lg-10 fs-5">
             Dyk in i den sociala kokboken där matälskare som du och jag inspirerar varandra till nya höjder av matlagning och diskberg!
            </p>
          </div>
          <!-- Registera dig ruta -->
          <div class="col-md-10 mx-auto col-lg-5">
            <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary">
              <div class="form-floating mb-3">
                <input
                  type="email"
                  class="form-control"
                  id="floatingInput"
                  placeholder="name@example.com"
                />
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
              <button class="w-100 btn btn-lg btn-primary mb-2" type="submit">
                Registera
              </button>
              <small class="text-body-secondary"
                >Genom att registrera dig godkänner du våra <a href="terms.html">användarvillkor.</a></small
              >
              <hr class="my-3" />
              <small class="text-body-secondary"
                >Redan medlem? <a href="log-in.html">logga in här.</a></small
              >
            </form>
          </div>
        </div>
      </div>

      <hr class="my-3" /> <!-- Separator -->

        <!-- Innehåll -->
      <div class="container px-4 py-5" id="featured-3">
        
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
            <!-- En ruta -->
          <div class="feature col">
            <div
              class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3"
            >
              <svg class="bi" width="1em" height="1em" aria-hidden="true">
                <use xlink:href="#collection"></use>
              </svg>
            </div>
            <h3 class="fs-2 text-body-emphasis">Dela dina köksäventyr</h3>
            <p>
              Vi vet att du sitter på en paradrätt som förtjänar en chef's kiss. Vad gör du som imponerar på dejten eller svärmor eller vardagshjälten?
            </p>
            <a href="#" class="icon-link">
              Lägg upp egna recept
              <svg class="bi" aria-hidden="true">
                <use xlink:href="#chevron-right"></use>
              </svg>
            </a>
          </div>
           <!-- En ruta -->
          <div class="feature col">
            <div
              class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3"
            >
              <svg class="bi" width="1em" height="1em" aria-hidden="true">
                <use xlink:href="#people-circle"></use>
              </svg>
            </div>
            <h3 class="fs-2 text-body-emphasis">Gör om gör rätt</h3>
            <p>
              Hjälp andra att nå en större chef's kiss genom att förbättra deras recept! Kanske har du en hemlig ingrediens eller ett knep som gör att det blir ännu bättre? 
            </p>
            <a href="#" class="icon-link">
              Förbättra andras recept
              <svg class="bi" aria-hidden="true">
                <use xlink:href="#chevron-right"></use>
              </svg>
            </a>
          </div>
           <!-- En ruta -->
          <div class="feature col">
            <div
              class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3"
            >
              <svg class="bi" width="1em" height="1em" aria-hidden="true">
                <use xlink:href="#toggles2"></use>
              </svg>
            </div>
            <h3 class="fs-2 text-body-emphasis">Inspireras och diskutera</h3>
            <p>
              Här i vår aktiva gemenskap finns en uppsjö av recept som förtjänar en chef's kiss och diskussioner som hjälper till att höja matlagningen till nya nivåer. Kanske är världens bästa köttfärssås bara ett klick bort? 
            </p>
            <a href="#" class="icon-link">
              Bläddra i kokboken
              <svg class="bi" aria-hidden="true">
                <use xlink:href="#chevron-right"></use>
              </svg>
            </a>
          </div>
        </div>
      </div>

         <hr class="my-3" /> <!-- separator -->

    
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
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            
           <!-- Ett recept -->
          <div class="col"> 
            <div class="card shadow-sm">
            <div class="text-center">
                <h3 class="card-title mt-4">$recipieTitle</h3>
                <div class="container">
    <div class="d-flex align-items-center justify-content-center">
        
        <div style="width: 7%;">
            <div class="ratio ratio-1x1">
                <img src="assets/images/example.png" 
                     class="rounded-circle object-fit-cover" 
                     alt=" $recipeChefName profile picture">
            </div>
        </div>

        <p class="card-text ms-3 mb-0">
            $recipeChefName
        </p> 
        
    </div>
</div>

                <div class="container d-flex justify-content-center">
                    <div style="width: 50%;">
                        <div class="ratio ratio-1x1">
                            <img src="assets/images/example.png" class="rounded-circle object-fit-cover" alt="recipieTitle>">
                        </div>
                    </div>
                </div>

            </div>
                <div class="card-body">
                  <p class="card-text">
                    Receptbeskrivning. En kort beskrivning av vad det är för rätt och varför den förtjänar en chef's kiss.
                  </p>
                  <div
                    class="d-flex justify-content-between align-items-center"
                  >
                    <div class="btn-group">
                      <button
                        type="button"
                        class="btn btn-sm btn-outline-secondary"
                      >
                        Öppna repcept
                      </button>
                      <button
                        type="button"
                        class="btn btn-sm btn-outline-secondary"
                      >
                        Gör om gör rätt
                      </button>
                    </div>
                    <small class="text-body-secondary">Tidsåtgång</small>
                  </div>
                </div>
              </div>
            </div>

<!-- Ett recept -->
            <div class="col">
              <div class="card shadow-sm">
                <svg
                  aria-label="Placeholder: Thumbnail"
                  class="bd-placeholder-img card-img-top"
                  height="225"
                  preserveAspectRatio="xMidYMid slice"
                  role="img"
                  width="100%"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <title>Placeholder</title>
                  <rect width="100%" height="100%" fill="#55595c"></rect>
                  <text x="50%" y="50%" fill="#eceeef" dy=".3em">
                    Thumbnail
                  </text>
                </svg>
                <div class="card-body">
                  <p class="card-text">
                    This is a wider card with supporting text below as a natural
                    lead-in to additional content. This content is a little bit
                    longer.
                  </p>
                  <div
                    class="d-flex justify-content-between align-items-center"
                  >
                    <div class="btn-group">
                      <button
                        type="button"
                        class="btn btn-sm btn-outline-secondary"
                      >
                        View
                      </button>
                      <button
                        type="button"
                        class="btn btn-sm btn-outline-secondary"
                      >
                        Edit
                      </button>
                    </div>
                    <small class="text-body-secondary">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card shadow-sm">
                <svg
                  aria-label="Placeholder: Thumbnail"
                  class="bd-placeholder-img card-img-top"
                  height="225"
                  preserveAspectRatio="xMidYMid slice"
                  role="img"
                  width="100%"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <title>Placeholder</title>
                  <rect width="100%" height="100%" fill="#55595c"></rect>
                  <text x="50%" y="50%" fill="#eceeef" dy=".3em">
                    Thumbnail
                  </text>
                </svg>
                <div class="card-body">
                  <p class="card-text">
                    This is a wider card with supporting text below as a natural
                    lead-in to additional content. This content is a little bit
                    longer.
                  </p>
                  <div
                    class="d-flex justify-content-between align-items-center"
                  >
                    <div class="btn-group">
                      <button
                        type="button"
                        class="btn btn-sm btn-outline-secondary"
                      >
                        View
                      </button>
                      <button
                        type="button"
                        class="btn btn-sm btn-outline-secondary"
                      >
                        Edit
                      </button>
                    </div>
                    <small class="text-body-secondary">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card shadow-sm">
                <svg
                  aria-label="Placeholder: Thumbnail"
                  class="bd-placeholder-img card-img-top"
                  height="225"
                  preserveAspectRatio="xMidYMid slice"
                  role="img"
                  width="100%"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <title>Placeholder</title>
                  <rect width="100%" height="100%" fill="#55595c"></rect>
                  <text x="50%" y="50%" fill="#eceeef" dy=".3em">
                    Thumbnail
                  </text>
                </svg>
                <div class="card-body">
                  <p class="card-text">
                    This is a wider card with supporting text below as a natural
                    lead-in to additional content. This content is a little bit
                    longer.
                  </p>
                  <div
                    class="d-flex justify-content-between align-items-center"
                  >
                    <div class="btn-group">
                      <button
                        type="button"
                        class="btn btn-sm btn-outline-secondary"
                      >
                        View
                      </button>
                      <button
                        type="button"
                        class="btn btn-sm btn-outline-secondary"
                      >
                        Edit
                      </button>
                    </div>
                    <small class="text-body-secondary">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card shadow-sm">
                <svg
                  aria-label="Placeholder: Thumbnail"
                  class="bd-placeholder-img card-img-top"
                  height="225"
                  preserveAspectRatio="xMidYMid slice"
                  role="img"
                  width="100%"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <title>Placeholder</title>
                  <rect width="100%" height="100%" fill="#55595c"></rect>
                  <text x="50%" y="50%" fill="#eceeef" dy=".3em">
                    Thumbnail
                  </text>
                </svg>
                <div class="card-body">
                  <p class="card-text">
                    This is a wider card with supporting text below as a natural
                    lead-in to additional content. This content is a little bit
                    longer.
                  </p>
                  <div
                    class="d-flex justify-content-between align-items-center"
                  >
                    <div class="btn-group">
                      <button
                        type="button"
                        class="btn btn-sm btn-outline-secondary"
                      >
                        View
                      </button>
                      <button
                        type="button"
                        class="btn btn-sm btn-outline-secondary"
                      >
                        Edit
                      </button>
                    </div>
                    <small class="text-body-secondary">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card shadow-sm">
                <svg
                  aria-label="Placeholder: Thumbnail"
                  class="bd-placeholder-img card-img-top"
                  height="225"
                  preserveAspectRatio="xMidYMid slice"
                  role="img"
                  width="100%"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <title>Placeholder</title>
                  <rect width="100%" height="100%" fill="#55595c"></rect>
                  <text x="50%" y="50%" fill="#eceeef" dy=".3em">
                    Thumbnail
                  </text>
                </svg>
                <div class="card-body">
                  <p class="card-text">
                    This is a wider card with supporting text below as a natural
                    lead-in to additional content. This content is a little bit
                    longer.
                  </p>
                  <div
                    class="d-flex justify-content-between align-items-center"
                  >
                    <div class="btn-group">
                      <button
                        type="button"
                        class="btn btn-sm btn-outline-secondary"
                      >
                        View
                      </button>
                      <button
                        type="button"
                        class="btn btn-sm btn-outline-secondary"
                      >
                        Edit
                      </button>
                    </div>
                    <small class="text-body-secondary">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card shadow-sm">
                <svg
                  aria-label="Placeholder: Thumbnail"
                  class="bd-placeholder-img card-img-top"
                  height="225"
                  preserveAspectRatio="xMidYMid slice"
                  role="img"
                  width="100%"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <title>Placeholder</title>
                  <rect width="100%" height="100%" fill="#55595c"></rect>
                  <text x="50%" y="50%" fill="#eceeef" dy=".3em">
                    Thumbnail
                  </text>
                </svg>
                <div class="card-body">
                  <p class="card-text">
                    This is a wider card with supporting text below as a natural
                    lead-in to additional content. This content is a little bit
                    longer.
                  </p>
                  <div
                    class="d-flex justify-content-between align-items-center"
                  >
                    <div class="btn-group">
                      <button
                        type="button"
                        class="btn btn-sm btn-outline-secondary"
                      >
                        View
                      </button>
                      <button
                        type="button"
                        class="btn btn-sm btn-outline-secondary"
                      >
                        Edit
                      </button>
                    </div>
                    <small class="text-body-secondary">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card shadow-sm">
                <svg
                  aria-label="Placeholder: Thumbnail"
                  class="bd-placeholder-img card-img-top"
                  height="225"
                  preserveAspectRatio="xMidYMid slice"
                  role="img"
                  width="100%"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <title>Placeholder</title>
                  <rect width="100%" height="100%" fill="#55595c"></rect>
                  <text x="50%" y="50%" fill="#eceeef" dy=".3em">
                    Thumbnail
                  </text>
                </svg>
                <div class="card-body">
                  <p class="card-text">
                    This is a wider card with supporting text below as a natural
                    lead-in to additional content. This content is a little bit
                    longer.
                  </p>
                  <div
                    class="d-flex justify-content-between align-items-center"
                  >
                    <div class="btn-group">
                      <button
                        type="button"
                        class="btn btn-sm btn-outline-secondary"
                      >
                        View
                      </button>
                      <button
                        type="button"
                        class="btn btn-sm btn-outline-secondary"
                      >
                        Edit
                      </button>
                    </div>
                    <small class="text-body-secondary">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card shadow-sm">
                <svg
                  aria-label="Placeholder: Thumbnail"
                  class="bd-placeholder-img card-img-top"
                  height="225"
                  preserveAspectRatio="xMidYMid slice"
                  role="img"
                  width="100%"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <title>Placeholder</title>
                  <rect width="100%" height="100%" fill="#55595c"></rect>
                  <text x="50%" y="50%" fill="#eceeef" dy=".3em">
                    Thumbnail
                  </text>
                </svg>
                <div class="card-body">
                  <p class="card-text">
                    This is a wider card with supporting text below as a natural
                    lead-in to additional content. This content is a little bit
                    longer.
                  </p>
                  <div
                    class="d-flex justify-content-between align-items-center"
                  >
                    <div class="btn-group">
                      <button
                        type="button"
                        class="btn btn-sm btn-outline-secondary"
                      >
                        View
                      </button>
                      <button
                        type="button"
                        class="btn btn-sm btn-outline-secondary"
                      >
                        Edit
                      </button>
                    </div>
                    <small class="text-body-secondary">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Call to action -->
          <div class="text-end">
              <a href="#" class="btn btn-primary my-2">Bläddra i hela kokboken</a>
              <a href="#" class="btn btn-secondary my-2">Lägg upp recept</a>
</div>
        </div>
        
      </div>


</body>

</html>