<?php
// Start session
session_start();
// Opens database connection 
require_once 'assets/config/db.php';

$mode = $_GET['mode'] ?? 'add'; // add, edit, iterate
$recipeID = $_GET['recipeID'] ?? null; // Gets recipeID from GET if available

// User info
require_once 'assets/functions/user_select-id.php';

// Recipe info
require_once 'assets/functions/recipe_select-id.php';


// Register information to database
require_once 'assets/functions/recipe_insert.php';
require_once 'assets/functions/recipe_update.php';
require_once 'assets/functions/recipe_refine.php';
require_once 'assets/functions/recipe_delete.php';

// Header
require_once 'assets/includes/header.php';

// Errors
if (!empty($errors)) {
    echo '<ul class="alert alert-danger ps-5">';
    foreach ($errors as $error) {
        echo '<li>' . $error . '</li>';
    }
    echo '</ul>';
}
?>

<main class="container mt-5">
<form action="recipe_edit.php" method="post"  enctype="multipart/form-data">
<input type="hidden" name="mode" value="<?php echo $mode; ?>">
<input type="hidden" name="recipeID" value="<?php echo $recipeID ?? ''; ?>">

<!--Title -->
<div class="row mb-3">
<label for="recipeTitle" class="col-1 col-form-label">Titel</label>
<div class="col-4">
<input type="text" class="form-control" id="recipeTitle" name="recipeTitle" required placeholder="Vad har du lagat för recept?" maxlength="255" value="<?php echo htmlspecialchars($row['recipeTitle']); ?>">
</div>
</div>

<!--Picture -->
<div class="row mb-3">
<label for="recipePicture" class="col-1 col-form-label">Foto</label>
<div class="col-4">
<?php if ($mode === 'add'): ?>
<input type="file" class="form-control" id="recipePicture" name="recipePicture" required placeholder="Lägg upp ett foto">
<?php else: ?>
<!-- Keep current photo path (hidden from user) -->
<input type="hidden" id="recipePhoto" name="recipePhoto" value="<?php echo htmlspecialchars($row['recipePhoto']); ?>">
<!-- Allow uploading a new photo -->
<input type="file" class="form-control" id="recipePicture" name="recipePicture" placeholder="Lägg upp ett nytt foto (valfritt)">
<small class="form-text text-muted">Lämna tomt för att behålla nuvarande foto</small>
<?php endif; ?>
</div>
</div>

<!--Cusine -->
<div class="row mb-3 mt-3">
  <label for="recipeCuisine" class="col-1 col-form-label">Kök</label>
  <div class="col-4">
    <select class="form-select" id="recipeCuisine" name="recipeCuisine" required>
      <option value="" disabled>Välj kök...</option>
      
      <optgroup label="Europa">
        <option value="Svenskt" <?php if($row['recipeCuisine'] === 'Svenskt') echo 'selected'; ?>>Svenskt</option>
        <option value="Italienskt" <?php if($row['recipeCuisine'] === 'Italienskt') echo 'selected'; ?>>Italienskt</option>
        <option value="Franskt" <?php if($row['recipeCuisine'] === 'Franskt') echo 'selected'; ?>>Franskt</option>
        <option value="Grekiskt" <?php if($row['recipeCuisine'] === 'Grekiskt') echo 'selected'; ?>>Grekiskt</option>
        <option value="Spanskt" <?php if($row['recipeCuisine'] === 'Spanskt') echo 'selected'; ?>>Spanskt</option>
      </optgroup>
      
      <optgroup label="Asien">
        <option value="Indiskt" <?php if($row['recipeCuisine'] === 'Indiskt') echo 'selected'; ?>>Indiskt</option>
        <option value="Japanskt" <?php if($row['recipeCuisine'] === 'Japanskt') echo 'selected'; ?>>Japanskt</option>
        <option value="Kinesiskt" <?php if($row['recipeCuisine'] === 'Kinesiskt') echo 'selected'; ?>>Kinesiskt</option>
        <option value="Thailändskt" <?php if($row['recipeCuisine'] === 'Thailändskt') echo 'selected'; ?>>Thailändskt</option>
        <option value="Vietnamesiskt" <?php if($row['recipeCuisine'] === 'Vietnamesiskt') echo 'selected'; ?>>Vietnamesiskt</option>
      </optgroup>
      
      <optgroup label="Amerika & Övriga">
        <option value="Amerikanskt" <?php if($row['recipeCuisine'] === 'Amerikanskt') echo 'selected'; ?>>Amerikanskt</option>
        <option value="Mexikanskt" <?php if($row['recipeCuisine'] === 'Mexikanskt') echo 'selected'; ?>>Mexikanskt</option>
        <option value="Mellanöstern" <?php if($row['recipeCuisine'] === 'Mellanöstern') echo 'selected'; ?>>Mellanöstern</option>
        <option value="Annat" <?php if($row['recipeCuisine'] === 'Annat') echo 'selected'; ?>>Annat</option>
      </optgroup>
    </select>
    <div class="invalid-feedback">
      Välj ett kök.
    </div>
  </div>
</div>

<!--Protein -->
<div class="row mb-3 mt-3">
  <label for="recipeProtein" class="col-1 col-form-label">Protein</label>
  <div class="col-4">
    <select class="form-select" id="recipeProtein" name="recipeProtein" required>
      <option value="" disabled>Välj protein...</option>
      <option value="Kyckling" <?php if($row['recipeProtein'] === 'Kyckling') echo 'selected'; ?>>🐤Kyckling</option>
      <option value="Nöt" <?php if($row['recipeProtein'] === 'Nöt') echo 'selected'; ?>>🐮Nöt</option>
      <option value="Fläsk" <?php if($row['recipeProtein'] === 'Fläsk') echo 'selected'; ?>>🐷Fläsk</option>
      <option value="Vilt" <?php if($row['recipeProtein'] === 'Vilt') echo 'selected'; ?>>🫎Vilt</option>
      <option value="Fisk" <?php if($row['recipeProtein'] === 'Fisk') echo 'selected'; ?>>🐟Fisk</option>
      <option value="Skaldjur" <?php if($row['recipeProtein'] === 'Skaldjur') echo 'selected'; ?>>🦐Skaldjur</option>
      <option value="Vegetarisk" <?php if($row['recipeProtein'] === 'Vegetarisk') echo 'selected'; ?>>🥚Vegetarisk</option>
      <option value="Veganskt" <?php if($row['recipeProtein'] === 'Veganskt') echo 'selected'; ?>>🌱Veganskt</option>
    </select>
    <div class="invalid-feedback">
      Välj protein.
    </div>
  </div>
</div>

<!--Difficulty -->
<div class="row mb-3 mt-3">
  <label for="recipeDifficulty" class="col-1 col-form-label">Svårighetsgrad</label>
  <div class="col-4">
    <select class="form-select" id="recipeDifficulty" name="recipeDifficulty" required>
      <option value="" disabled>Välj svårighetsgrad...</option>
      <option value="Lätt" <?php if($row['recipeDifficulty'] === 'Lätt') echo 'selected'; ?>>🟢Lätt</option>
      <option value="Mellan" <?php if($row['recipeDifficulty'] === 'Mellan') echo 'selected'; ?>>🟡Mellan</option>
      <option value="Svår" <?php if($row['recipeDifficulty'] === 'Svår') echo 'selected'; ?>>🔴Svår</option>
    </select>
    <div class="invalid-feedback">
      Välj svårighetsgrad.
    </div>
  </div>
</div>

<!--Time -->
<div class="row mb-3">
<label for="recipeTime" class="col-1 col-form-label">Tid</label>
<div class="col-4">
<input type="number" class="form-control" id="recipeTime" name="recipeTime" required min="1" max="1440" placeholder="Tid i minuter" value="<?php echo htmlspecialchars($row['recipeTime']); ?>">
</div>
</div>

<!--Description -->
<div class="row mb-3">
<label for="recipeDescription" class="col-1 col-form-label">Beskrivning</label>
<div class="col-4">
<textarea class="form-control" id="recipeDescription" name="recipeDescription" rows= "3" maxlength="2000" required placeholder="Beskriv rätten i ett par meningar."><?php echo htmlspecialchars($row['recipeDescription']); ?></textarea>
</div>
</div>

<!--Portions -->
<div class="row mb-3">
<label for="recipePortions" class="col-1 col-form-label">Portioner</label>
<div class="col-4">
<input type="number" class="form-control" id="recipePortions" name="recipePortions" required min="1" max="20" placeholder="Antal portioner" value="<?php echo htmlspecialchars($row['recipePortions']); ?>">
</div>
</div>

<!--Ingredients -->
<div class="row mb-3">
<label for="recipeIngrediens" class="col-1 col-form-label">Ingredienser</label>
<div class="col-4">
<textarea class="form-control" id="recipeIngrediens" name="recipeIngrediens" rows= "10" maxlength="65535" required placeholder="Vilka ingredienser behövdes för ditt magiska trick?"><?php echo htmlspecialchars($row['recipeIngrediens']); ?></textarea>
</div>
</div>

<!--How to -->
<div class="row mb-3">
<label for="recipeHow" class="col-1 col-form-label">Gör såhär</label>
<div class="col-4">
<textarea class="form-control" id="recipeHow" name="recipeHow" rows= "10" maxlength="65535" required placeholder="Hur återskapar man ditt trolleri i köket?"><?php echo htmlspecialchars($row['recipeHow']); ?></textarea>
</div>
</div>

<!--Tips -->
<div class="row mb-3">
<label for="recipeTips" class="col-1 col-form-label">Tips</label>
<div class="col-4">
<textarea class="form-control" id="recipeTips" name="recipeTips" rows= "3" maxlength="2000"  placeholder="Vad är bra att tänka på när man lagar detta mästerverk?"><?php echo htmlspecialchars($row['recipeTips']); ?></textarea>
</div>
</div>

<!--Improvements -->
<div class="row mb-3">
<label for="recipeImprovements" class="col-1 col-form-label">Förbättringar</label>
<div class="col-4">
<textarea class="form-control" id="recipeImprovements" name="recipeImprovements" rows= "3" maxlength="2000" placeholder="Vad hade du förbättrat nästa gång du lagar rätten?"><?php echo htmlspecialchars($row['recipeImprovements']); ?></textarea>
</div>
</div>

<!--Show button dependent on mode -->
<div class="button-group">
<?php if ($mode === 'add'): ?>
  <button type="submit" class="btn btn-primary text-light my-2 rounded-pill" name="add_recipe">
    <i class="fa-solid fa-plus"></i> Lägg till recept
  </button>
<?php elseif ($mode === 'edit'): ?>
  <button type="submit" class="btn btn-primary text-light my-2 rounded-pill" name="edit_recipe">
    <i class="fa-regular fa-floppy-disk"></i> Spara ändringar
  </button>
  <button type="submit" class="btn btn-secondary text-dark my-2 rounded-pill" name="delete_recipe">
    <i class="fa-solid fa-trash"></i> Radera recept
  </button>
<?php elseif ($mode === 'iterate'): ?>
  <button type="submit" class="btn btn-primary text-light my-2 rounded-pill" name="iterate_recipe">
    <i class="fa-solid fa-utensils"></i> Spara förbättrat recept
  </button>
<?php endif; ?>
</div>


</form>
</main>


<?php
// footer
require_once 'assets/includes/footer.php';
?>