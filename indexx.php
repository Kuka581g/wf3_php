<html>

<head></head>
<link rel="stylesheet" href="style.css">

<body>
  
<?php
  require("poke.php")
   ;
?>

<form>
  
  <fieldset>
  <legend>Pokemon 1 :
    <select id="pokemon1" name="pokemon1" <?php echo isset($form_error['pokemon1']) ? 'class="error"' : ''; ?>>
    <option value="">- Aucun -</option>
          <?php
            foreach($pokemons as $pokemon => $stats) {
              echo '<option value="' . $pokemon . '" ' . (isset($nom_pokemon1) && $pokemon == $nom_pokemon1 ? 'selected' : '') . '>' . $pokemon . '</option>';
            }
          ?>
    </select>
  </legend>
  <div>Points de vie : <input type="test" name="pv_pokemon1" value="<?php echo $pikachu['pv']; ?>" <?php echo isset($form_error['pv_pokemon1']) ? 'class="error"' : ''; ?> /></div>
  <div>Points de défense : <input type="test" name="defense_pokemon1" value="<?php echo $pikachu['defense']; ?>" <?php echo isset($form_error['defense_pokemon1']) ? 'class="error"' : ''; ?> /></div>
  <div>Points d'attaque : <input type="test" name="attaque_pokemon1" value="<?php echo $pikachu['attaque']; ?>" <?php echo isset($form_error['attaque_pokemon1']) ? 'class="error"' : ''; ?> /></div>
  </fieldset>

  <button type="submit" style="margin-top: 10px; margin-bottom: 10px; box-shadow: 1px 1px 1px grey; ">Combattez !</button>

  <fieldset>
  <legend>Pokemon 2 :
    <select id="pokemon2" name="pokemon2" <?php echo isset($form_error['pokemon2']) ? 'class="error"' : ''; ?>>
      <?php
        foreach($pokemons as $pokemon => $stats) {
          echo '<option value="' . $pokemon . '" ' . ($pokemon == 'Bulbizarre' ? 'selected' : '') . '>' . $pokemon . '</option>';
        }
      ?>
    </select>
  </legend>
  <div>Points de vie : <input type="test" name="pv_pokemon2" value="<?php echo $bulbizarre['pv']; ?>" <?php echo isset($form_error['pv_pokemon2']) ? 'class="error"' : ''; ?> /></div>
  <div>Points de défense : <input type="test" name="defense_pokemon2" value="<?php echo $bulbizarre['defense']; ?>" <?php echo isset($form_error['defense_pokemon2']) ? 'class="error"' : ''; ?> /></div>
  <div>Points d'attaque : <input type="test" name="attaque_pokemon2" value="<?php echo $bulbizarre['attaque']; ?>" <?php echo isset($form_error['attaque_pokemon2']) ? 'class="error"' : ''; ?> /></div>
  </fieldset>

</form>
</body>
</html>