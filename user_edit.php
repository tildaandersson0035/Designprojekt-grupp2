<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'assets/includes/display_errors.php';
// Databasanslutning
require_once 'assets/config/db.php';

// Skyddar sidan så att bara inloggade användare kommer åt den
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Hanterar uppdatering av användaruppgifter
require_once 'assets/functions/user_update.php';
// Sidhuvud
require_once 'assets/includes/header.php';

// Hämtar den inloggade användarens id från sessionen
$userID = $_SESSION['user_id'];

// Hämtar användarens nuvarande uppgifter från databasen
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
        <div class="col-12 col-md-10 col-lg-8 col-xl-7">

            <!-- Section används här eftersom detta är sidans huvudsakliga och avgränsade innehållsdel -->
            <section class="card shadow-sm">
                <div class="card-body p-4">

                    <!-- Header används här eftersom detta är den inledande delen med sidans rubrik -->
                    <header>
                        <h1 class="mb-4">Redigera profil</h1>
                    </header>

                    <?php if (!empty($error)): ?>
                        <!-- Visar felmeddelande om uppdateringen misslyckas -->
                        <div class="alert alert-danger">
                            <?= htmlspecialchars($error) ?>
                        </div>
                    <?php endif; ?>

                    <!-- Skickar de uppdaterade uppgifterna till samma sida -->
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

                        <?php
                        // Låter användaren välja en ny profilbild
                        ?>
                        <div class="mb-4">
                            <label class="form-label fw-semibold d-block">Profilbild</label>

                            <div class="row g-3 text-center">
                                <?php for ($i = 1; $i <= 6; $i++): ?>
                                    <div class="col-4">
                                        <input
                                            class="form-check-input mb-2"
                                            type="radio"
                                            name="userPicture"
                                            id="userPicture<?= $i ?>"
                                            value="<?= $i ?>"
                                            <?= ($user['userPicture'] == $i) ? 'checked' : '' ?>>

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

                        <?php
                        // Användaren kan byta lösenord, men fälten kan lämnas tomma om lösenordet inte ska ändras
                        ?>
                        <div class="mb-3">
                            <label for="userPassword" class="form-label">Nytt lösenord</label>
                            <input
                                type="password"
                                class="form-control"
                                id="userPassword"
                                name="userPassword"
                                placeholder="Lämna tomt om du inte vill byta lösenord">
                        </div>

                        <div class="mb-4">
                            <label for="confirmPassword" class="form-label">Bekräfta nytt lösenord</label>
                            <input
                                type="password"
                                class="form-control"
                                id="confirmPassword"
                                name="confirmPassword"
                                placeholder="Upprepa det nya lösenordet">
                        </div>

                        <div class="d-flex flex-wrap gap-2">
                            <button type="submit" class="btn btn-warning">Spara ändringar</button>
                            <a href="user_view_one.php" class="btn btn-outline-secondary">Avbryt</a>
                        </div>

                    </form>

                    <hr class="my-4">

                    <!-- Section används här eftersom borttagning av konto är en egen del med ett separat syfte -->
                    <section class="text-center">
                        <p class="text-muted mb-2">Vill du ta bort ditt konto?</p>
                        <a href="user_remove.php" class="btn btn-outline-danger">
                            Ta bort konto
                        </a>
                    </section>

                </div>
            </section>

        </div>
    </div>
</main>

<?php require_once 'assets/includes/footer.php'; ?>