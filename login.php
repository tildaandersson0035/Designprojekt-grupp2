<?php
require_once 'assets/includes/display_errors.php';
require_once 'assets/config/db.php';
require_once 'assets/functions/user_session.login.php';
require_once 'assets/includes/header.php';
?>

<main class="background-about">
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-12 col-md-8 col-lg-6">

        <div class="text-center mb-4">
          <h1 class="py-2">Chefs Kiss</h1>
          <h2 class="h4">Logga in</h2>
        </div>

        <div class="bg-white rounded-3 p-4">

          <?php if (!empty($error)): ?>
            <div class="alert alert-danger">
              <?= htmlspecialchars($error) ?>
            </div>
          <?php endif; ?>

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

              <div class="input-group">
                <input
                  type="password"
                  class="form-control"
                  id="password"
                  name="password"
                  placeholder="Skriv in ditt lösenord..."
                  required>
                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                  <i class="fa-solid fa-eye"></i>
                </button>
              </div>
            </div>

            <button type="submit" class="send text-white w-100">
              Logga in
            </button>

            <div class="text-center mt-3">
              <a href="#" class="text-decoration-none">Glömt lösenord?</a>

              <hr class="my-3">

              <div>Har du inget konto?</div>
              <a href="register.php" class="text-decoration-none fw-semibold">
                Registrera dig
              </a>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
</main>

<script>
  const btn = document.getElementById('togglePassword');
  const input = document.getElementById('password');

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