<html>
	<head>
		<title>Pokémon</title>
		<meta charset="utf-8">
		<link href="https://fonts.googleapis.com/css?family=Saira+Semi+Condensed:400,600,700" rel="stylesheet">
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"> -->
	</head>
	<body>
		<style type="text/css">

			@font-face {
				font-family: "Pixel";
				src: url('font/PIXELADE.ttf');
			} 

			body {
				font-family: 'Pixel', sans-serif;
				text-align: center;
				
			}
			form {
				background-image: url ('../img/background.png');
				background-size: cover;
			}

			h2 {
				text-decoration: underline;
			}

			fieldset {
				width: 50%;
				margin: auto;
			}

			.error {
				border-color: red;
				background-color: red;
			}
			
		</style>


<?php
// tableau de validation
$form_error = [];
// Validation du formulaire
foreach($_GET as $input => $value) {
	if ($input === 'pokemon1' || $input === 'pokemon2') {
		if (!isset ($pokemons[$input])) {
			
		}
	}elseif (empty($value) || !ctype_digit($value) || $value <= 0) {
	  echo '<p style="">Le champ ' . $input . ' doit un entier strictement supérieur à 0</p>';
	  $form_error[$input] = 1;
	}
	
  }

// MES POKEMONS
$pokemons = array();

// Pikachu
$pikachu = [
  'pv' => isset($_GET['pv_pikachu']) ? $_GET['pv_pikachu'] : 25, // 25 Points de vie par défaut
  'attaque' => isset($_GET['attaque_pikachu']) ? $_GET['attaque_pikachu'] : 15,
  'defense' => isset($_GET['defense_pikachu']) ? $_GET['defense_pikachu'] : 10
];
$pokemons['Pikachu'] = $pikachu;
// Bulbizarre
$bulbizarre = [
  'pv' => isset($_GET['pv_bulbizarre']) ? $_GET['pv_bulbizarre'] : 30,
  'attaque' => isset($_GET['attaque_bulbizarre']) ? $_GET['attaque_bulbizarre'] : 8,
  'defense' => isset($_GET['defense_bulbizarre']) ? $_GET['defense_bulbizarre'] : 20
];
$pokemons['Bulbizarre'] = $bulbizarre;

echo "<pre>";
var_dump ($pokemons);
echo "</pre>";
?>


		<form>
			<fieldset class="pika">
			<legend> Pokemon 1 :
				<select name="pokemon1">
					<?php 
						foreach($pokemons as $pokemon => $stats) {
							echo '<option value="' . $pokemon . '">' . $pokemon . '</option>';
						}
					?>
				</select>
			</legend>
			<div>Points VIE : <input type="text" name="pv_pikachu" value ="<?php echo isset ($_GET['pv_pikachu']) ?  $_GET['pv_pikachu'] : ''; ?>" <?php echo isset($form_error['pv_pikachu']) ? 'class="error"' : ''; ?> /></div>
			<div>Points DEF : <input type="text" name="defense_pikachu" value ="<?php echo isset ($_GET['defense_pikachu']) ?  $_GET['defense_pikachu'] : ''; ?>" <?php echo isset($form_error['defense_pikachu']) ? 'class="error"' : ''; ?> /></div>
			<div>Points ATK : <input type="text" name="attaque_pikachu" value ="<?php echo isset ($_GET['attaque_pikachu']) ?  $_GET['attaque_pikachu'] : ''; ?>" <?php echo isset($form_error['attaque_pikachu']) ? 'class="error"' : ''; ?> /></div>
			</fieldset>

			<button type="submit" style="margin-top: 10px; margin-bottom: 10px; box-shadow: 1px 1px 1px grey; ">Combattez !</button>

			<fieldset class="bulbi">
			<legend> Pokemon 2 :
				<select name="pokemon2">
					<?php 
						foreach($pokemons as $pokemon => $stats) {
							echo '<option value="' . $pokemon . '">' . $pokemon . '</option>';
						}
					?>
				</select>
			</legend>
			<div>Points VIE : <input type="text" name="pv_bulbizarre" value ="<?php echo isset ($_GET['pv_bulbizarre']) ?  $_GET['pv_bulbizarre'] : ''; ?>" <?php echo isset($form_error['pv_bulbizarre']) ? 'class="error"' : ''; ?> /></div>
			<div>Points DEF : <input type="text" name="defense_bulbizarre" value ="<?php echo isset ($_GET['defense_bulbizarre']) ?  $_GET['defense_bulbizarre'] : ''; ?>" <?php echo isset($form_error['defense_bulbizarre']) ? 'class="error"' : ''; ?> /></div>
			<div>Points ATK : <input type="text" name="attaque_bulbizarre" value ="<?php echo isset ($_GET['attaque_bulbizarre']) ?  $_GET['attaque_bulbizarre'] : ''; ?>" <?php echo isset($form_error['attaque_bulbizarre']) ? 'class="error"' : ''; ?> /></div>
			</fieldset>

		</form>


<?php
/**
 * Bienvenue dans ce module PHP
 * Nous allons travailler à la réalisation d'un pokedex
 */

// Vérifions les informations
/*echo "<pre>";
var_dump($_GET);
var_dump($_POST);
echo "</pre>";*/
if (count($form_error) > 0)
die ("Le combat est reporté pour cause d'erreurs de saisie");

// Tableau de validation
$form_error = [];

$tour = 0;

//echo "Date : ". date('d/m/Y : H:i:s');

do {

echo "<hr><h2> Tour : ". ++$tour . " à " . date('H:i:s') . "</h2>";

echo "<p >Pikachu attaque bulbizarre</p>";
if ($pikachu['attaque'] >= $bulbizarre['defense']) {
  // L'attaque est supérieure à la défense : pikachu touche
  $coup = $pikachu['attaque'] - $bulbizarre['defense'] + 1; // La valeur du coup est la différence entre l'attaque et la défense
  $bulbizarre['pv'] -= $coup;
  echo "<p>Bulbizarre perd $coup PV, il lui reste " . $bulbizarre['pv'] . " PV</p><hr>";
} else {
  // La défense est supérieure à l'attaque, pikachu prend la moitié du coup et la défense baisse un peu
  $coup = ($bulbizarre['defense'] - $pikachu['attaque']) / 2;
  $pikachu['pv'] -= $coup;
  $bulbizarre['defense'] -= 1;
  echo "<p>Bulbizarre perd 1 Points de défense, il lui reste " . $bulbizarre['defense'] . " Points de défense</p>";
  echo "<p>Pikachu rate son attaque ! Il perd $coup Points de vie, il lui reste " . $pikachu['pv'] . " Points de vie</p>";
}
if ($bulbizarre['pv'] <= 0) // S'il n'y a pas d'accolades après un if, seule la première instruction est filtrée par le if
  echo "<hr><p>Bulbizarre est KO !</p><hr>";
if ($pikachu['pv'] <= 0)
  echo '<hr><p style=\"color: red; font-weight: 600;\">Pikachu est KO !</p><hr>';
// Et maintenant la contre-attaque : à vous de jouer !
// bulbizarre attaque pikachu
echo "<p>Bulbizarre attaque Pikachu</p>";
if ($bulbizarre['attaque'] >= $pikachu['defense']) {
  // L'attaque est supérieure à la défense : bulbizarre touche
  $coup = $bulbizarre['attaque'] - $pikachu['defense'] + 1; // La valeur du coup est la différence entre l'attaque et la défense
  $pikachu['pv'] -= $coup;
  echo "<p>Pikachu perd $coup PV, il lui reste " . $pikachu['pv'] . " PV</p>";
} else {
  // La défense est supérieure à l'attaque, bulbizarre prend la moitié du coup et la défense baisse un peu
  $coup = ($pikachu['defense'] - $bulbizarre['attaque']) / 2;
  $bulbizarre['pv'] -= $coup;
  $pikachu['defense'] -= 1;
  echo "<p>Pikachu perd 1 Points de défense, il lui reste " . $pikachu['defense'] . " Points de défense</p>";
  echo "<p>Bulbizarre rate son attaque ! Il perd $coup Points de vie, il lui reste " . $bulbizarre['pv'] . " Points de vie</p>";
}

if ($bulbizarre['pv'] <= 0)
	echo "<hr><p>Bulbizarre est KO !</p><hr>";
if ($pikachu['pv'] <= 0)
	echo "<hr><p>Pikachu est KO !</p><hr>";
	
sleep(0);
} while ( $pikachu['pv'] > 0  && $bulbizarre['pv'] > 0);

$pv_baie_rouge = 50;
$pv_baie_noire = 30;
// Bulbizarre mange une baie rouge
// Pikachu mange une baie noire
?>
	</body>
</html>