<?php
// Start session FIRST before any other output
session_start();
// Opens database connection 
require_once 'assets/config/db.php';
// Register information to database
require_once 'assets/functions/recipe_refine.php';
// Recipe info
require_once 'assets/functions/recipe_select-id.php';
// User info
require_once 'assets/functions/user_select-id.php';
// Header
require_once 'assets/includes/header.php';
?>

<main class="container mt-5">
<form action="recipe_iterate.php" method="post">

<div class="row mb-3">
<label for="recipeTitle" class="col-1 col-form-label">Titel</label>
<div class="col-4">
<input type="text" class="form-control" id="recipeTitle" name="recipeTitle" required placeholder="Vad har du lagat för recept?" maxlength="255" value="<?php echo isset($row['recipeTitle']) ? htmlspecialchars($row['recipeTitle']) : ''; ?>">
</div>
</div>


<div class="row mb-3">
<label for="recipePhoto" class="col-1 col-form-label">Foto</label>
<div class="col-4">
<input type="text" class="form-control" id="recipePhoto" name="recipePhoto" required placeholder="Lägg upp ett foto" maxlength="255" value="<?php echo isset($row['recipePhoto']) ? htmlspecialchars($row['recipePhoto']) : ''; ?>">
</div>
</div>

<div class="row mb-3 mt-3">
  <label for="recipeCuisine" class="col-1 col-form-label">Kök</label>
  <div class="col-4">
    <select class="form-select" id="recipeCuisine" name="recipeCuisine" required>
      <option value="" disabled>Välj kök...</option>
      
      <optgroup label="Europa">
        <option value="Svenskt" <?php if(isset($row['recipeCuisine']) && $row['recipeCuisine'] == 'Svenskt') echo 'selected'; ?>>Svenskt</option>
        <option value="Italienskt" <?php if(isset($row['recipeCuisine']) && $row['recipeCuisine'] == 'Italienskt') echo 'selected'; ?>>Italienskt</option>
        <option value="Franskt" <?php if(isset($row['recipeCuisine']) && $row['recipeCuisine'] == 'Franskt') echo 'selected'; ?>>Franskt</option>
        <option value="Grekiskt" <?php if(isset($row['recipeCuisine']) && $row['recipeCuisine'] == 'Grekiskt') echo 'selected'; ?>>Grekiskt</option>
        <option value="Spanskt" <?php if(isset($row['recipeCuisine']) && $row['recipeCuisine'] == 'Spanskt') echo 'selected'; ?>>Spanskt</option>
      </optgroup>
      
      <optgroup label="Asien">
        <option value="Indiskt" <?php if(isset($row['recipeCuisine']) && $row['recipeCuisine'] == 'Indiskt') echo 'selected'; ?>>Indiskt</option>
        <option value="Japanskt" <?php if(isset($row['recipeCuisine']) && $row['recipeCuisine'] == 'Japanskt') echo 'selected'; ?>>Japanskt</option>
        <option value="Kinesiskt" <?php if(isset($row['recipeCuisine']) && $row['recipeCuisine'] == 'Kinesiskt') echo 'selected'; ?>>Kinesiskt</option>
        <option value="Thailändskt" <?php if(isset($row['recipeCuisine']) && $row['recipeCuisine'] == 'Thailändskt') echo 'selected'; ?>>Thailändskt</option>
        <option value="Vietnamesiskt" <?php if(isset($row['recipeCuisine']) && $row['recipeCuisine'] == 'Vietnamesiskt') echo 'selected'; ?>>Vietnamesiskt</option>
      </optgroup>
      
      <optgroup label="Amerika & Övriga">
        <option value="Amerikanskt" <?php if(isset($row['recipeCuisine']) && $row['recipeCuisine'] == 'Amerikanskt') echo 'selected'; ?>>Amerikanskt</option>
        <option value="Mexikanskt" <?php if(isset($row['recipeCuisine']) && $row['recipeCuisine'] == 'Mexikanskt') echo 'selected'; ?>>Mexikanskt</option>
        <option value="Mellanöstern" <?php if(isset($row['recipeCuisine']) && $row['recipeCuisine'] == 'Mellanöstern') echo 'selected'; ?>>Mellanöstern</option>
        <option value="Annat" <?php if(isset($row['recipeCuisine']) && $row['recipeCuisine'] == 'Annat') echo 'selected'; ?>>Annat</option>
      </optgroup>
    </select>
    <div class="invalid-feedback">
      Välj ett kök.
    </div>
  </div>
</div>

<div class="row mb-3 mt-3">
  <label for="recipeProtein" class="col-1 col-form-label">Protein</label>
  <div class="col-4">
    <select class="form-select" id="recipeProtein" name="recipeProtein" required>
      <option value="" disabled>Välj protein...</option>
      <option value="Kyckling" <?php if(isset($row['recipeProtein']) && $row['recipeProtein'] == 'Kyckling') echo 'selected'; ?>>🐤Kyckling</option>
      <option value="Nöt" <?php if(isset($row['recipeProtein']) && $row['recipeProtein'] == 'Nöt') echo 'selected'; ?>>🐮Nöt</option>
      <option value="Fläsk" <?php if(isset($row['recipeProtein']) && $row['recipeProtein'] == 'Fläsk') echo 'selected'; ?>>🐷Fläsk</option>
      <option value="Vilt" <?php if(isset($row['recipeProtein']) && $row['recipeProtein'] == 'Vilt') echo 'selected'; ?>>🫎Vilt</option>
      <option value="Fisk" <?php if(isset($row['recipeProtein']) && $row['recipeProtein'] == 'Fisk') echo 'selected'; ?>>🐟Fisk</option>
      <option value="Skaldjur" <?php if(isset($row['recipeProtein']) && $row['recipeProtein'] == 'Skaldjur') echo 'selected'; ?>>🦐Skaldjur</option>
      <option value="Vegetarisk" <?php if(isset($row['recipeProtein']) && $row['recipeProtein'] == 'Vegetarisk') echo 'selected'; ?>>🥚Vegetarisk</option>
      <option value="Veganskt" <?php if(isset($row['recipeProtein']) && $row['recipeProtein'] == 'Veganskt') echo 'selected'; ?>>🌱Veganskt</option>
    </select>
    <div class="invalid-feedback">
      Välj protein.
    </div>
  </div>
</div>

<div class="row mb-3 mt-3">
  <label for="recipeDifficulty" class="col-1 col-form-label">Svårighetsgrad</label>
  <div class="col-4">
    <select class="form-select" id="recipeDifficulty" name="recipeDifficulty" required>
      <option value="" disabled>Välj svårighetsgrad...</option>
      <option value="Lätt" <?php if(isset($row['recipeDifficulty']) && $row['recipeDifficulty'] == 'Lätt') echo 'selected'; ?>>🟢Lätt</option>
      <option value="Mellan" <?php if(isset($row['recipeDifficulty']) && $row['recipeDifficulty'] == 'Mellan') echo 'selected'; ?>>🟡Mellan</option>
      <option value="Svår" <?php if(isset($row['recipeDifficulty']) && $row['recipeDifficulty'] == 'Svår') echo 'selected'; ?>>🔴Svår</option>
    </select>
    <div class="invalid-feedback">
      Välj svårighetsgrad.
    </div>
  </div>
</div>
     
<div class="row mb-3">
<label for="recipeTime" class="col-1 col-form-label">Tid</label>
<div class="col-4">
<input type="number" class="form-control" id="recipeTime" name="recipeTime" required min="1" max="1440" placeholder="Tid i minuter" value="<?php echo isset($row['recipeTime']) ? htmlspecialchars($row['recipeTime']) : ''; ?>">
</div>
</div>

<div class="row mb-3">
<label for="recipeDescription" class="col-1 col-form-label">Beskrivning</label>
<div class="col-4">
<textarea class="form-control" id="recipeDescription" name="recipeDescription" rows= "3" maxlength="2000" required placeholder="Beskriv rätten i ett par meningar."><?php echo isset($row['recipeDescription']) ? htmlspecialchars($row['recipeDescription']) : ''; ?></textarea>
</div>
</div>

<div class="row mb-3">
<label for="recipePortions" class="col-1 col-form-label">Portioner</label>
<div class="col-4">
<input type="number" class="form-control" id="recipePortions" name="recipePortions" required min="1" max="20" placeholder="Antal portioner" value="<?php echo isset($row['recipePortions']) ? htmlspecialchars($row['recipePortions']) : ''; ?>">
</div>
</div>

<div class="row mb-3">
<label for="recipeIngrediens" class="col-1 col-form-label">Ingredienser</label>
<div class="col-4">
<textarea class="form-control" id="recipeIngrediens" name="recipeIngrediens" rows= "10" maxlength="65535" required placeholder="Vilka ingredienser behövdes för ditt magiska trick?"><?php echo isset($row['recipeIngrediens']) ? htmlspecialchars($row['recipeIngrediens']) : ''; ?></textarea>
</div>
</div>

<div class="row mb-3">
<label for="recipeHow" class="col-1 col-form-label">Gör såhär</label>
<div class="col-4">
<textarea class="form-control" id="recipeHow" name="recipeHow" rows= "10" maxlength="65535" required placeholder="Hur återskapar man ditt trolleri i köket?"><?php echo isset($row['recipeHow']) ? htmlspecialchars($row['recipeHow']) : ''; ?></textarea>
</div>
</div>

<div class="row mb-3">
<label for="recipeTips" class="col-1 col-form-label">Tips</label>
<div class="col-4">
<textarea class="form-control" id="recipeTips" name="recipeTips" rows= "3" maxlength="2000"  placeholder="Vad är bra att tänka på när man lagar detta mästerverk?"><?php echo isset($row['recipeTips']) ? htmlspecialchars($row['recipeTips']) : ''; ?></textarea>
</div>
</div>

<div class="row mb-3">
<label for="recipeImprovements" class="col-1 col-form-label">Förbättringar</label>
<div class="col-4">
<textarea class="form-control" id="recipeImprovements" name="recipeImprovements" rows= "3" maxlength="2000" placeholder="Vad hade du förbättrat nästa gång du lagar rätten?"><?php echo isset($row['recipeImprovements']) ? htmlspecialchars($row['recipeImprovements']) : ''; ?></textarea>
</div>
</div>



<button type="submit" class="btn btn-primary text-light my-2 rounded-pill" name="iterate_recipe">
<i class="fa-solid fa-utensils"></i> Spara förbättrat recept
</button>
</form>
</main>


<?php
// footer
require_once 'assets/includes/footer.php';
?>