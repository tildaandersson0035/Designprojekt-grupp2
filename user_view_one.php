<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'assets/includes/display_errors.php';
// Databasanslutning
require_once 'assets/config/db.php';

// Skyddar sidan så att bara inloggade användare kan se profiler
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Sidhuvud
require_once 'assets/includes/header.php';

// Hämtar id för den inloggade användaren
$loggedInUserID = $_SESSION['user_id'];

// Bestämmer vilken användare som ska visas (egen profil eller via URL)
$userID = isset($_GET['id']) ? (int) $_GET['id'] : $loggedInUserID;

// Hämtar användarens uppgifter från databasen
$sql = "SELECT * FROM users WHERE userID = :userID LIMIT 1";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
$stmt->execute();

$user = $stmt->fetch();

// Om användaren inte finns visas ett felmeddelande
if (!$user) {
    echo "<main class='container mt-4'><div class='alert alert-danger'>Användaren kunde inte hittas.</div></main>";
    require_once 'assets/includes/footer.php';
    exit;
}

// Kontrollerar om det är den inloggade användarens egen profil
$isOwnProfile = ($userID === $loggedInUserID);

// Hämtar alla recept som tillhör användaren
$recipeSql = "SELECT * FROM recipes WHERE userID = :userID ORDER BY recipeDate DESC";
$recipeStmt = $dbh->prepare($recipeSql);
$recipeStmt->bindParam(':userID', $userID, PDO::PARAM_INT);
$recipeStmt->execute();

$userRecipes = $recipeStmt->fetchAll();
?>

<main class="background-about py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-10">

                <!-- Section används här eftersom hela profilkortet är en tydlig och sammanhängande del av sidans huvudinnehåll -->
                <section class="bg-white rounded-4 shadow-sm overflow-hidden">

                    <!-- Header används här eftersom detta är profilsidans översta informationsdel med namn, bild och viktiga profilåtgärder -->
                    <header class="p-4 p-md-5 border-bottom">
                        <div class="row align-items-center g-4">

                            <div class="col-12 col-md-auto text-center">

                                <?php
                                // Visar användarens valda profilbild
                                ?>

                                <img src="assets/images/profilepictures/Picture<?= $user['userPicture'] ?? '1' ?>.png"
                                    class="rounded-circle border"
                                    style="width:150px; height:150px; object-fit:cover;"
                                    alt="Profilbild för <?= htmlspecialchars($user['userFirstname'] . ' ' . $user['userSurname']) ?>">

                            </div>

                            <div class="col">
                                <!-- Visar användarens namn -->
                                <h1 class="mb-2">
                                    <?= htmlspecialchars($user['userFirstname'] . ' ' . $user['userSurname']) ?>
                                </h1>

                                <!-- Visar användarens e-post -->
                                <p class="text-muted mb-3">
                                    <i class="fa-regular fa-envelope me-2"></i>
                                    <?= htmlspecialchars($user['userEmail']) ?>
                                </p>

                                <!-- Visar när kontot skapades -->
                                <div class="d-flex flex-wrap gap-3">
                                    <div class="px-3 py-2 rounded-pill bg-light border">
                                        <i class="fa-regular fa-calendar me-2 text-warning"></i>
                                        Medlem sedan: <?= htmlspecialchars($user['userDate']) ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-auto">
                                <div class="d-grid gap-2">

                                    <?php if ($isOwnProfile): ?>
                                        <!-- Alternativ som visas på den egna profilsidan -->
                                        <a href="user_edit.php" class="btn btn-warning text-white fw-semibold px-4">
                                            Redigera profil
                                        </a>

                                        <a href="user_logout.php" class="btn btn-outline-danger fw-semibold px-4">
                                            Logga ut
                                        </a>

                                    <?php else: ?>
                                        <!-- Alternativ när man tittar på någon annans profil -->
                                        <a href="user_view_all.php" class="btn btn-outline-secondary fw-semibold px-4">
                                            Tillbaka till alla användare
                                        </a>
                                    <?php endif; ?>

                                </div>
                            </div>

                        </div>
                    </header>

                    <!-- Section används här eftersom användaruppgifterna är en egen innehållsdel på profilsidan -->
                    <section class="p-4 p-md-5">
                        <div class="row g-4">

                            <div class="col-12 col-lg-6">
                                <div class="card h-100 border-0 bg-light">
                                    <div class="card-body">

                                        <!-- Sammanfattning av användarens uppgifter -->
                                        <h2 class="h4 mb-3">Användaruppgifter</h2>

                                        <p><strong>Förnamn:</strong> <?= htmlspecialchars($user['userFirstname']) ?></p>
                                        <p><strong>Efternamn:</strong> <?= htmlspecialchars($user['userSurname']) ?></p>
                                        <p class="mb-0"><strong>E-post:</strong> <?= htmlspecialchars($user['userEmail']) ?></p>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>

                    <?php
                    // Visar användarens recept
                    ?>
                    <!-- Section används här eftersom receptlistan är en egen del av profilsidan med flera relaterade objekt -->
                    <section class="p-4 p-md-5 border-top">

                        <h2 class="h4 mb-4">
                            <?= $isOwnProfile ? 'Mina recept' : 'Användarens recept' ?>
                        </h2>

                        <div class="row g-4">

                            <?php if (!empty($userRecipes)): ?>

                                <?php foreach ($userRecipes as $recipe): ?>

                                    <!-- Article används här eftersom varje recept är ett självständigt innehåll som kan visas separat på en egen sida -->
                                    <article class="col-12 col-md-6 col-lg-4">
                                        <div class="card h-100 border-0 bg-light shadow-sm">
                                            <div class="card-body d-flex flex-column">

                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <small class="text-muted text-first-capitalize">
                                                        <?= htmlspecialchars($recipe['recipeCuisine']) ?>
                                                    </small>

                                                    <small class="text-muted">
                                                        <?= htmlspecialchars($recipe['recipeTime']) ?> min
                                                    </small>
                                                </div>

                                                <h3 class="h5 mb-3 text-first-capitalize">
                                                    <?= htmlspecialchars($recipe['recipeTitle']) ?>
                                                </h3>

                                                <div class="text-center mb-3">
                                                    <img src="<?= htmlspecialchars($recipe['recipePhoto']) ?>"
                                                        alt="Bild på <?= htmlspecialchars($recipe['recipeTitle']) ?>"
                                                        class="img-fluid rounded"
                                                        style="max-height: 180px; object-fit: cover;">
                                                </div>

                                                <p class="text-muted small flex-grow-1">
                                                    <?= htmlspecialchars($recipe['recipeDescription']) ?>
                                                </p>

                                                <!-- Länk till hela receptet -->
                                                <a href="recipe_view_one.php?recipeID=<?= $recipe['recipeID'] ?>"
                                                    class="btn btn-outline-warning mt-2">
                                                    Se recept
                                                </a>

                                            </div>
                                        </div>
                                    </article>

                                <?php endforeach; ?>

                            <?php else: ?>

                                <!-- Visas om användaren inte har några recept -->
                                <div class="col-12">
                                    <div class="alert alert-info mb-0">
                                        <?= $isOwnProfile ? 'Du har inte lagt till några recept ännu.' : 'Den här användaren har inte lagt till några recept ännu.' ?>
                                    </div>
                                </div>

                            <?php endif; ?>

                        </div>
                    </section>

                </section>

            </div>
        </div>
    </div>
</main>

<?php require_once 'assets/includes/footer.php'; ?>