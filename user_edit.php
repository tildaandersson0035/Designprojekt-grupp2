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

require_once 'assets/functions/user_update.php';
require_once 'assets/includes/header.php';

$userID = $_SESSION['userID'];

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
?>

<main class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">

            <div class="card shadow-sm">
                <div class="card-body p-4">

                    <h1 class="mb-4">Redigera profil</h1>

                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger">
                            <?= htmlspecialchars($error) ?>
                        </div>
                    <?php endif; ?>

                    <form action="user_edit.php" method="post">

                        <div class="mb-3">
                            <label for="userFirstname" class="form-label">Förnamn</label>
                            <input
                                type="text"
                                class="form-control"
                                id="userFirstname"
                                name="userFirstname"
                                value="<?= htmlspecialchars($user['userFirstname']) ?>"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="userSurname" class="form-label">Efternamn</label>
                            <input
                                type="text"
                                class="form-control"
                                id="userSurname"
                                name="userSurname"
                                value="<?= htmlspecialchars($user['userSurname']) ?>"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="userEmail" class="form-label">E-post</label>
                            <input
                                type="email"
                                class="form-control"
                                id="userEmail"
                                name="userEmail"
                                value="<?= htmlspecialchars($user['userEmail']) ?>"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="userPicture" class="form-label">Profilbild</label>
                            <input
                                type="number"
                                class="form-control"
                                id="userPicture"
                                name="userPicture"
                                value="<?= htmlspecialchars($user['userPicture']) ?>"
                                min="1"
                                required>
                        </div>

                        <div class="d-flex flex-wrap gap-2">
                            <button type="submit" class="btn btn-warning">Spara ändringar</button>
                            <a href="user_view_one.php" class="btn btn-outline-secondary">Avbryt</a>
                        </div>

                    </form>

                    <hr class="my-4">

                    <div class="text-center">
                        <p class="text-muted mb-2">Vill du ta bort ditt konto?</p>
                        <a href="user_remove.php" class="btn btn-outline-danger">
                            Ta bort konto
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</main>

<?php require_once 'assets/includes/footer.php'; ?>