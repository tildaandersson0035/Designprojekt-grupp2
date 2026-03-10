<?php
// Start session FIRST before any other output
session_start();
// Opens database connection 
require_once 'assets/config/db.php';
// Register information to database
require_once 'assets/functions/recipe_insert.php';
// User info
require_once 'assets/functions/user_select-id.php';
// Header
require_once 'assets/includes/header.php';
?>

<?php
// Checks whether errors have been set
if (!empty($errors)) {
echo '<ul class="alert alert-danger ps-5">';
// Prints out all possible errors
foreach ($errors as $error) {
echo '<li>' . $error . '</li>';
}
echo '</ul>';
}
?>


<main class="container mt-5">
<form action="recipe_add.php" method="post" enctype="multipart/form-data">

<div class="row mb-3">
<label for="recipeTitle" class="col-1 col-form-label">Titel</label>
<div class="col-4">
<input type="text" class="form-control" id="recipeTitle" name="recipeTitle" required placeholder="Vad har du lagat för recept?" maxlength="255">
</div>
</div>


<div class="row mb-3">
<label for="recipePicture" class="col-1 col-form-label">Foto</label>
<div class="col-4">
<input type="file" class="form-control" id="recipePicture" name="recipePicture" required placeholder="Lägg upp ett foto">
</div>

</div>

<div class="row mb-3 mt-3">
  <label for="recipeCuisine" class="col-1 col-form-label">Kök</label>
  <div class="col-4">
    <select class="form-select" id="recipeCuisine" name="recipeCuisine" required>
      <option value="" selected disabled>Välj kök...</option>
      
      <optgroup label="Europa">
        <option value="Svenskt">Svenskt</option>
        <option value="Italienskt">Italienskt</option>
        <option value="Franskt">Franskt</option>
        <option value="Grekiskt">Grekiskt</option>
        <option value="Spanskt">Spanskt</option>
      </optgroup>
      
      <optgroup label="Asien">
        <option value="Indiskt">Indiskt</option>
        <option value="Japanskt">Japanskt</option>
        <option value="Kinesiskt">Kinesiskt</option>
        <option value="Thailändskt">Thailändskt</option>
        <option value="Vietnamesiskt">Vietnamesiskt</option>
      </optgroup>
      
      <optgroup label="Amerika & Övriga">
        <option value="Amerikanskt">Amerikanskt</option>
        <option value="Mexikanskt">Mexikanskt</option>
        <option value="Mellanöstern">Mellanöstern</option>
        <option value="Annat">Annat</option>
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
      <option value="" selected disabled>Välj protein...</option>
      <option value="Kyckling">🐤Kyckling</option>
      <option value="Nöt">🐮Nöt</option>
      <option value="Fläsk">🐷Fläsk</option>
      <option value="Vilt">🫎Vilt</option>
      <option value="Fisk">🐟Fisk</option>
      <option value="Skaldjur">🦐Skaldjur</option>
      <option value="Vegetarisk">🥚Vegetarisk</option>
      <option value="Veganskt">🌱Veganskt</option>
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
      <option value="" selected disabled>Välj svårighetsgrad...</option>
      <option value="Lätt">🟢Lätt</option>
      <option value="Mellan">🟡Mellan</option>
      <option value="Svår">🔴Svår</option>
    </select>
    <div class="invalid-feedback">
      Välj svårighetsgrad.
    </div>
  </div>
</div>
     
<div class="row mb-3">
<label for="recipeTime" class="col-1 col-form-label">Tid</label>
<div class="col-4">
<input type="number" class="form-control" id="recipeTime" name="recipeTime" required min="1" max="1440" placeholder="Tid i minuter">
</div>
</div>

<div class="row mb-3">
<label for="recipeDescription" class="col-1 col-form-label">Beskrivning</label>
<div class="col-4">
<textarea class="form-control" id="recipeDescription" name="recipeDescription" rows= "3" maxlength="2000" required placeholder="Beskriv rätten i ett par meningar."></textarea>
</div>
</div>

<div class="row mb-3">
<label for="recipePortions" class="col-1 col-form-label">Portioner</label>
<div class="col-4">
<input type="number" class="form-control" id="recipePortions" name="recipePortions" required min="1" max="20" placeholder="Antal portioner">
</div>
</div>

<div class="row mb-3">
<label for="recipeIngrediens" class="col-1 col-form-label">Ingredienser</label>
<div class="col-4">
<textarea class="form-control" id="recipeIngrediens" name="recipeIngrediens" rows= "10" maxlength="65535" required placeholder="Vilka ingredienser behövdes för ditt magiska trick?"></textarea>
</div>
</div>

<div class="row mb-3">
<label for="recipeHow" class="col-1 col-form-label">Gör såhär</label>
<div class="col-4">
<textarea class="form-control" id="recipeHow" name="recipeHow" rows= "10" maxlength="65535" required placeholder="Hur återskapar man ditt trolleri i köket?"></textarea>
</div>
</div>

<div class="row mb-3">
<label for="recipeTips" class="col-1 col-form-label">Tips</label>
<div class="col-4">
<textarea class="form-control" id="recipeTips" name="recipeTips" rows= "3" maxlength="2000"  placeholder="Vad är bra att tänka på när man lagar detta mästerverk?"></textarea>
</div>
</div>

<div class="row mb-3">
<label for="recipeImprovements" class="col-1 col-form-label">Förbättringar</label>
<div class="col-4">
<textarea class="form-control" id="recipeImprovements" name="recipeImprovements" rows= "3" maxlength="2000" placeholder="Vad hade du förbättrat nästa gång du lagar rätten?"></textarea>
</div>
</div>



<button type="submit" class="btn btn-primary text-light my-2 rounded-pill" name="add_recipe">
<i class="fa-solid fa-plus"></i> Lägg till recept
</button>
</form>
</main>


<?php
// footer
require_once 'assets/includes/footer.php';
?>