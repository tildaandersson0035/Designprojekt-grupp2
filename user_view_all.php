<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'assets/includes/display_errors.php';
// Databasanslutning
require_once 'assets/config/db.php';

// Skyddar sidan så att bara inloggade användare kan se listan över användare
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Hämtar alla användare från databasen
require_once 'assets/functions/user_select.php';
// Sidhuvud
require_once 'assets/includes/header.php';
?>

<main class="background-about py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-10">

                <!-- Header används här eftersom detta är sidans inledande del med rubrik och navigationslänk -->
                <header class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="mb-0">Alla användare</h1>
                    <!-- Länk tillbaka till den inloggade användarens profilsida -->
                    <a href="user_view_one.php" class="btn btn-outline-secondary">Till min profil</a>
                </header>

                <?php if (empty($users)): ?>
                    <!-- Visas om det inte finns några användare i databasen -->
                    <div class="alert alert-info">
                        Det finns inga användare att visa.
                    </div>
                <?php else: ?>

                    <!-- Section används här eftersom användarlistan är en egen innehållsdel med flera relaterade användarkort -->
                    <section class="row g-4">
                        <?php foreach ($users as $user): ?>

                            <!-- Article används här eftersom varje användarkort är ett självständigt innehåll som kan visas separat -->
                            <article class="col-12 col-md-6 col-lg-4">
                                <div class="card h-100 shadow-sm border-0">
                                    <div class="card-body text-center p-4">

                                        <!-- Visar första bokstaven i användarens förnamn som avatar -->
                                        <div class="rounded-circle bg-warning-subtle d-inline-flex align-items-center justify-content-center mb-3"
                                            style="width: 90px; height: 90px; font-size: 2rem; font-weight: 700;">
                                            <?= htmlspecialchars(substr($user['userFirstname'], 0, 1)) ?>
                                        </div>

                                        <!-- Användarens namn -->
                                        <h2 class="h4 mb-2">
                                            <?= htmlspecialchars($user['userFirstname'] . ' ' . $user['userSurname']) ?>
                                        </h2>

                                        <!-- Användarens e-postadress -->
                                        <p class="text-muted mb-2">
                                            <?= htmlspecialchars($user['userEmail']) ?>
                                        </p>

                                        <!-- Visar vilken profilbild användaren har valt -->
                                        <p class="small text-muted mb-3">
                                            Profilbild: <?= htmlspecialchars($user['userPicture']) ?>
                                        </p>

                                        <div class="d-grid">
                                            <!-- Länk till användarens profilsida -->
                                            <a href="user_view_one.php?id=<?= urlencode($user['userID']) ?>" class="btn btn-warning text-white">
                                                Visa profil
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </article>

                        <?php endforeach; ?>
                    </section>
                <?php endif; ?>

            </div>
        </div>
    </div>
</main>

<?php require_once 'assets/includes/footer.php'; ?>