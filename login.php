<?php
/* 
----------------------------------------------------------------
IMPORTERA FUNKTIONER OCH HEADER
----------------------------------------------------------------
user_select-id.php:
Används i projektet för att hämta information om den inloggade 
användaren (t.ex. user_id från session). Den kan senare användas 
för att kontrollera om en användare redan är inloggad och i så 
fall redirecta bort från login-sidan.

header.php:
Innehåller sidans <head>, navigation, Bootstrap, CSS och 
övrig gemensam layout.
*/
require_once 'assets/functions/user_select-id.php';
require_once 'assets/includes/header.php';
?>

<main class="background-about">
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-12 col-md-8 col-lg-6">

        <!-- Sidrubrik -->
        <div class="text-center mb-4">
          <h1 class="py-2">Chefs Kiss</h1>
          <h2 class="h4">Logga in</h2>
        </div>

        <!-- Login-box -->
        <div class="bg-white rounded-3 p-4">

          <?php
          /*
          ------------------------------------------------------------
          PLATS FÖR FELMEDDELANDEN
          ------------------------------------------------------------
          Här kan PHP senare skriva ut felmeddelanden från login-
          processen, till exempel:

          - Fel email eller lösenord
          - Användaren finns inte
          - Databasfel

          Exempel som kan implementeras senare:

          if ($error) {
              echo '<div class="alert alert-danger">'.$error.'</div>';
          }
          */
          ?>

          <form method="post" action="login.php">
            
            <?php
            /*
            ------------------------------------------------------------
            FORMULÄR FÖR LOGIN
            ------------------------------------------------------------
            Detta formulär kommer senare att skickas till PHP-kod 
            som kontrollerar användaren i databasen.

            Process som ska implementeras:

            1. Ta emot POST-data (email + password)
            2. Hämta användare från databasen
            3. Kontrollera lösenord med password_verify()
            4. Skapa session för användaren
            5. Redirect till startsida eller profil
            */
            ?>

            <!-- E-post -->
            <div class="mb-3">
              <label for="email" class="form-label">
                <i class="fa-solid fa-envelope me-2"></i>E-post
              </label>
              <input
                type="email"
                class="form-control"
                id="email"
                name="email"
                placeholder="Skriv in din e-postadress..."
                required
              >
            </div>

            <!-- Lösenord -->
            <div class="mb-3">
              <label for="password" class="form-label">
                <i class="fa-solid fa-lock me-2"></i>Lösenord
              </label>

              <div class="input-group">
                <input
                  type="password"
                  class="form-control"
                  id="password"
                  name="password"
                  placeholder="Skriv in ditt lösenord..."
                  required
                >
                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                  <i class="fa-solid fa-eye"></i>
                </button>
              </div>
            </div>

            <!-- Login-knapp -->
            <button type="submit" class="send text-white w-100">
              Logga in
            </button>

            <?php
            /*
            ------------------------------------------------------------
            EFTER LOGIN
            ------------------------------------------------------------
            När login-funktionaliteten är implementerad ska 
            formuläret ovan:

            POST → login.php

            PHP-koden ska då:

            - kontrollera email + lösenord
            - skapa en session (ex: $_SESSION['user_id'])
            - redirecta användaren till t.ex:

                index.php
                eller
                user_view_one.php (profil)

            */
            ?>

            <!-- Länkar -->
            <div class="text-center mt-3">

              <?php
              /*
              ------------------------------------------------------------
              GLÖMT LÖSENORD
              ------------------------------------------------------------
              Här kan senare en funktion för lösenordsåterställning
              implementeras.

              Exempel:
              forgot_password.php
              */
              ?>

              <a href="#" class="text-decoration-none">
                Glömt lösenord?
              </a>

              <hr class="my-3">

              <div>Har du inget konto?</div>

              <?php
              /*
              ------------------------------------------------------------
              REGISTRERING
              ------------------------------------------------------------
              Denna länk leder till registreringssidan där nya 
              användare kan skapa konto.

              user_add.php hanterar skapandet av nya användare
              i databasen.
              */
              ?>

              <a href="user_add.php" class="text-decoration-none fw-semibold">
                Registrera dig
              </a>

            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
</main>

<script>
/*
------------------------------------------------------------
VISA / DÖLJ LÖSENORD
------------------------------------------------------------
Frontend-funktion som gör att användaren kan visa eller 
dölja sitt lösenord.

Ingen koppling till backend eller databasen.
*/
const btn = document.getElementById('togglePassword');
const input = document.getElementById('password');

if (btn && input) {
  btn.addEventListener('click', () => {

    const isPassword = input.type === 'password';
    input.type = isPassword ? 'text' : 'password';

    const icon = btn.querySelector('i');

    if (icon) {
      icon.classList.toggle('fa-eye');
      icon.classList.toggle('fa-eye-slash');
    }

  });
}
</script>

<?php
/*
----------------------------------------------------------------
FOOTER
----------------------------------------------------------------
Footer innehåller sidans nederdel och laddas från en 
gemensam include-fil för att återanvändas på alla sidor.
*/
require_once 'assets/includes/footer.php';
?>