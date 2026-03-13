<?php
require_once 'assets/includes/display_errors.php';
// Databasanslutning
require_once 'assets/config/db.php';
// Hanterar inloggning och skapar session vid lyckad inloggning
require_once 'assets/functions/user_session.login.php';
// Sidhuvud
require_once 'assets/includes/header.php';
?>

<main class="background-about">
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-12 col-md-8 col-lg-6">

        <!-- Section används här eftersom detta är sidans huvudsakliga och avgränsade innehållsdel -->
        <section class="bg-white rounded-3 p-4">

          <!-- Header används här eftersom detta är den inledande delen med sidans rubriker -->
          <header class="text-center mb-4">
            <h1 class="py-2">Chefs Kiss</h1>
            <h2 class="h4">Logga in</h2>
          </header>

          <?php if (!empty($error)): ?>
            <!-- Visar felmeddelande om inloggningen misslyckas -->
            <div class="alert alert-danger">
              <?= htmlspecialchars($error) ?>
            </div>
          <?php endif; ?>

          <!-- Skickar användarens inloggningsuppgifter till samma sida -->
          <form method="post" action="login.php">

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
                required>
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">
                <i class="fa-solid fa-lock me-2"></i>Lösenord
              </label>

              <input
                type="password"
                class="form-control"
                id="password"
                name="password"
                placeholder="Skriv in ditt lösenord..."
                required>
            </div>

            <button type="submit" class="send text-white w-100">
              Logga in
            </button>

            <!-- Section används här eftersom länkarna är en egen avslutande del som kompletterar formuläret -->
            <section class="text-center mt-3">
              <a href="#" class="text-decoration-none">Glömt lösenord?</a>

              <hr class="my-3">

              <div>Har du inget konto?</div>
              <a href="register.php" class="text-decoration-none fw-semibold">
                Registrera dig
              </a>
            </section>

          </form>

        </section>
      </div>
    </div>
  </div>
</main>

<?php require_once 'assets/includes/footer.php'; ?>