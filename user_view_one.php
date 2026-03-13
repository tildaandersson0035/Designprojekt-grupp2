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

require_once 'assets/includes/header.php';

$loggedInUserID = $_SESSION['userID'];
$userID = isset($_GET['id']) ? (int) $_GET['id'] : $loggedInUserID;

$sql = "SELECT * FROM users WHERE userID = :userID LIMIT 1";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
$stmt->execute();

$user = $stmt->fetch();

if (!$user) {
    echo "<main class='container mt-4'><div class='alert alert-danger'>Användaren kunde inte hittas.</div></main>";
    require_once 'assets/includes/footer.php';
    exit;
}

$isOwnProfile = ($userID === $loggedInUserID);
?>

<main class="background-about py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-10">

                <div class="bg-white rounded-4 shadow-sm overflow-hidden">

                    <div class="p-4 p-md-5 border-bottom">
                        <div class="row align-items-center g-4">

                            <div class="col-12 col-md-auto text-center">
                                <div class="rounded-circle bg-warning-subtle d-inline-flex align-items-center justify-content-center"
                                     style="width: 150px; height: 150px; font-size: 3rem; font-weight: 700;">
                                    <?= htmlspecialchars(substr($user['userFirstname'], 0, 1)) ?>
                                </div>
                            </div>

                            <div class="col">
                                <h1 class="mb-2">
                                    <?= htmlspecialchars($user['userFirstname'] . ' ' . $user['userSurname']) ?>
                                </h1>

                                <p class="text-muted mb-3">
                                    <i class="fa-regular fa-envelope me-2"></i>
                                    <?= htmlspecialchars($user['userEmail']) ?>
                                </p>

                                <div class="d-flex flex-wrap gap-3">
                                    <div class="px-3 py-2 rounded-pill bg-light border">
                                        <i class="fa-regular fa-user me-2 text-warning"></i>
                                        ID: <?= htmlspecialchars($user['userID']) ?>
                                    </div>

                                    <div class="px-3 py-2 rounded-pill bg-light border">
                                        <i class="fa-regular fa-image me-2 text-warning"></i>
                                        Profilbild: <?= htmlspecialchars($user['userPicture']) ?>
                                    </div>

                                    <div class="px-3 py-2 rounded-pill bg-light border">
                                        <i class="fa-regular fa-calendar me-2 text-warning"></i>
                                        Skapad: <?= htmlspecialchars($user['userDate']) ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-auto">
                                <div class="d-grid gap-2">
                                    <?php if ($isOwnProfile): ?>
                                        <a href="user_edit.php" class="btn btn-warning text-white fw-semibold px-4">
                                            Redigera profil
                                        </a>
                                        <a href="user_logout.php" class="btn btn-outline-danger fw-semibold px-4">
                                            Logga ut
                                        </a>
                                    <?php else: ?>
                                        <a href="user_view_all.php" class="btn btn-outline-secondary fw-semibold px-4">
                                            Tillbaka till alla användare
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="p-4 p-md-5">
                        <div class="row g-4">

                            <div class="col-12 col-lg-6">
                                <div class="card h-100 border-0 bg-light">
                                    <div class="card-body">
                                        <h2 class="h4 mb-3">Användaruppgifter</h2>

                                        <p><strong>Förnamn:</strong> <?= htmlspecialchars($user['userFirstname']) ?></p>
                                        <p><strong>Efternamn:</strong> <?= htmlspecialchars($user['userSurname']) ?></p>
                                        <p><strong>E-post:</strong> <?= htmlspecialchars($user['userEmail']) ?></p>
                                        <p class="mb-0"><strong>Användar-ID:</strong> <?= htmlspecialchars($user['userID']) ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="card h-100 border-0 bg-light">
                                    <div class="card-body">
                                        <h2 class="h4 mb-3">Profilinformation</h2>

                                        <p><strong>Profilbild:</strong> <?= htmlspecialchars($user['userPicture']) ?></p>
                                        <p class="mb-0"><strong>Konto skapat:</strong> <?= htmlspecialchars($user['userDate']) ?></p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</main>

<?php require_once 'assets/includes/footer.php'; ?>