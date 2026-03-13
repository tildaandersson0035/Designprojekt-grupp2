<?php
require_once 'assets/includes/display_errors.php';
// Databasanslutning
require_once 'assets/config/db.php';
// Hanterar registrering och sparar ny användare i databasen
require_once 'assets/functions/user_insert.php';
// Sidhuvud
require_once 'assets/includes/header.php';
?>

<main class="background-about py-5">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-12 col-md-10 col-lg-8 col-xl-7">

                <!-- Section används här eftersom detta är sidans huvudsakliga och avgränsade innehållsdel -->
                <section class="bg-white rounded-4 shadow-sm p-4 p-md-5">

                    <!-- Header används här eftersom detta är den inledande delen med sidans rubrik -->
                    <header class="text-center mb-4">
                        <h1 class="display-6 fw-semibold">Registrera dig</h1>
                    </header>

                    <?php if (!empty($error)): ?>
                        <!-- Visar felmeddelande om registreringen misslyckas -->
                        <div class="alert alert-danger">
                            <?= htmlspecialchars($error) ?>
                        </div>
                    <?php endif; ?>

                    <!-- Skickar registreringsuppgifterna till samma sida -->
                    <form action="register.php" method="post">

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="userFirstname" class="form-label fw-semibold">
                                    <i class="fa-regular fa-user me-2"></i>Förnamn
                                </label>
                                <input
                                    type="text"
                                    class="form-control form-control-lg"
                                    id="userFirstname"
                                    name="userFirstname"
                                    placeholder="Skriv ditt förnamn..."
                                    required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="userSurname" class="form-label fw-semibold">
                                    <i class="fa-regular fa-user me-2"></i>Efternamn
                                </label>
                                <input
                                    type="text"
                                    class="form-control form-control-lg"
                                    id="userSurname"
                                    name="userSurname"
                                    placeholder="Skriv ditt efternamn..."
                                    required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="userEmail" class="form-label fw-semibold">
                                <i class="fa-regular fa-envelope me-2"></i>E-post
                            </label>
                            <input
                                type="email"
                                class="form-control form-control-lg"
                                id="userEmail"
                                name="userEmail"
                                placeholder="Skriv in din e-postadress..."
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="userPassword" class="form-label fw-semibold">
                                <i class="fa-solid fa-lock me-2"></i>Lösenord
                            </label>

                            <input
                                type="password"
                                class="form-control form-control-lg"
                                id="userPassword"
                                name="userPassword"
                                placeholder="Skapa ett lösenord..."
                                required>
                        </div>

                        <div class="mb-4">
                            <label for="confirmPassword" class="form-label fw-semibold">
                                <i class="fa-solid fa-lock me-2"></i>Bekräfta lösenord
                            </label>
                            <input
                                type="password"
                                class="form-control form-control-lg"
                                id="confirmPassword"
                                name="confirmPassword"
                                placeholder="Upprepa ditt lösenord..."
                                required>
                        </div>

                        <?php
                        // Låter användaren välja profilbild vid registrering
                        ?>
                        <div class="mb-4">
                            <label class="form-label fw-semibold d-block">
                                <i class="fa-regular fa-image me-2"></i>Välj profilbild
                            </label>

                            <div class="row g-3 text-center">
                                <?php for ($i = 1; $i <= 6; $i++): ?>
                                    <div class="col-4">
                                        <input
                                            class="form-check-input mb-2"
                                            type="radio"
                                            name="userPicture"
                                            id="userPicture<?= $i ?>"
                                            value="<?= $i ?>"
                                            <?= $i === 1 ? 'checked' : '' ?>>

                                        <label for="userPicture<?= $i ?>" class="d-block">
                                            <img
                                                src="assets/images/profilepictures/Picture<?= $i ?>.png"
                                                alt="Valbar profilbild <?= $i ?>"
                                                class="img-fluid rounded-circle border"
                                                style="width: 90px; height: 90px; object-fit: cover;">
                                        </label>
                                    </div>
                                <?php endfor; ?>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-warning btn-lg w-100 fw-semibold text-white">
                            Skapa konto
                        </button>

                        <hr class="my-4">

                        <!-- Section används här eftersom inloggningslänken är en egen avslutande del som kompletterar formuläret -->
                        <section class="text-center">
                            Har du redan ett konto?
                            <a href="login.php" class="fw-semibold text-decoration-none">Logga in</a>
                        </section>

                    </form>
                </section>
            </div>

        </div>
    </div>
</main>

<?php require_once 'assets/includes/footer.php'; ?>