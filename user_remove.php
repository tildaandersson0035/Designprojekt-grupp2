<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'assets/includes/display_errors.php';
// Databasanslutning
require_once 'assets/config/db.php';

// Skyddar sidan så att bara inloggade användare kan ta bort sitt konto
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Hanterar borttagning av användaren från databasen
require_once 'assets/functions/user_delete.php';
// Sidhuvud
require_once 'assets/includes/header.php';
?>

<main class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">

            <!-- Section används här eftersom detta är en egen, avgränsad del av sidan med ett tydligt syfte -->
            <section class="card shadow-sm border-danger">
                <div class="card-body p-4">

                    <!-- Header används här eftersom detta är den inledande delen med rubrik och viktig varningsinformation -->
                    <header>
                        <h1 class="h3 text-danger mb-3">Ta bort konto</h1>

                        <p>
                            Är du säker på att du vill ta bort ditt konto?
                        </p>

                        <p class="mb-4">
                            Detta går inte att ångra.
                        </p>
                    </header>

                    <!-- Formulär som bekräftar borttagning av användarkontot -->
                    <form action="user_remove.php" method="post">
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-danger">
                                Ja, ta bort mitt konto
                            </button>

                            <!-- Avbryter borttagningen och går tillbaka till profilsidan -->
                            <a href="user_view_one.php" class="btn btn-outline-secondary">
                                Avbryt
                            </a>
                        </div>
                    </form>
                </div>
            </section>

        </div>
    </div>
</main>

<?php require_once 'assets/includes/footer.php'; ?>