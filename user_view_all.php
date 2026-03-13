<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'assets/includes/display_errors.php';
require_once 'assets/config/db.php';

if (!isset($_SESSION['userID'])) {
    header('Location: login.php');
    exit;
}

require_once 'assets/functions/user_select.php';
require_once 'assets/includes/header.php';
?>

<main class="background-about py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-10">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="mb-0">Alla användare</h1>
                    <a href="user_view_one.php" class="btn btn-outline-secondary">Till min profil</a>
                </div>

                <?php if (empty($users)): ?>
                    <div class="alert alert-info">
                        Det finns inga användare att visa.
                    </div>
                <?php else: ?>
                    <div class="row g-4">
                        <?php foreach ($users as $user): ?>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="card h-100 shadow-sm border-0">
                                    <div class="card-body text-center p-4">

                                        <div class="rounded-circle bg-warning-subtle d-inline-flex align-items-center justify-content-center mb-3"
                                            style="width: 90px; height: 90px; font-size: 2rem; font-weight: 700;">
                                            <?= htmlspecialchars(substr($user['userFirstname'], 0, 1)) ?>
                                        </div>

                                        <h2 class="h4 mb-2">
                                            <?= htmlspecialchars($user['userFirstname'] . ' ' . $user['userSurname']) ?>
                                        </h2>

                                        <p class="text-muted mb-2">
                                            <?= htmlspecialchars($user['userEmail']) ?>
                                        </p>

                                        <p class="small text-muted mb-3">
                                            Profilbild: <?= htmlspecialchars($user['userPicture']) ?>
                                        </p>

                                        <div class="d-grid">
                                            <a href="user_view_one.php?id=<?= urlencode($user['userID']) ?>" class="btn btn-warning text-white">
                                                Visa profil
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</main>

<?php require_once 'assets/includes/footer.php'; ?>