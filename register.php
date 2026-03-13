<?php
require_once 'assets/includes/display_errors.php';
require_once 'assets/config/db.php';
require_once 'assets/functions/user_insert.php';
require_once 'assets/includes/header.php';
?>

<main class="background-about py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">

                <div class="text-center mb-4">
                    <h1 class="display-6 fw-semibold">Registrera dig</h1>
                </div>

                <div class="bg-white rounded-4 shadow-sm p-4 p-md-5">

                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger">
                            <?= htmlspecialchars($error) ?>
                        </div>
                    <?php endif; ?>

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
                            <div class="input-group input-group-lg">
                                <input
                                    type="password"
                                    class="form-control"
                                    id="userPassword"
                                    name="userPassword"
                                    placeholder="Skapa ett lösenord..."
                                    required>
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                            </div>
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

                        <input type="hidden" name="userPicture" value="1">

                        <button type="submit" class="btn btn-warning btn-lg w-100 fw-semibold text-white">
                            Skapa konto
                        </button>

                        <hr class="my-4">

                        <div class="text-center">
                            Har du redan ett konto?
                            <a href="login.php" class="fw-semibold text-decoration-none">Logga in</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    const btn = document.getElementById('togglePassword');
    const input = document.getElementById('userPassword');

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

<?php require_once 'assets/includes/footer.php'; ?>