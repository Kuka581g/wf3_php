<?php
/** 
 * Bienvenue dans ce module PHP
 * Nous allons travailler à la réalisation d'un pokédex
 */

// Pikachu
$attaque_pikachu = 15;
$defense_pikachu = 10;
$pv_pikachu = 25;

// Bulbizarre
$attaque_bulbizarre = 8;
$defense_bulbizarre = 20;
$pv_bulbizarre = 30;

// Pikachu attaque Bulbizarre
echo "<p>Pikachu attaque Bulbizarre</p>";
if ($attaque_pikachu >= $defense_bulbizarre) {
	// L'attaque est supérieure à la défense : Pikachu touche
	$coup = $attaque_pikachu - $defense_bulbizarre + 1; // La valeur du coup est la différence entre l'attaque et la défense
	$pv_bulbizarre -= $coup;
	echo "<p>Bulbizarre perd $coup PV, il lui reste $pv_bulbizarre PV </p>";
} else {
	// La défense est supérieure à l'attaque, Pikachu prend la moitié du coup et la défense baisse un peu
	$coup = ($defense_bulbizarre - $attaque_pikachu) / 2;
	$pv_pikachu -= $coup;
	$defense_bulbizarre -= 1;
	echo "<p> Bulbizarre perd 1 point de défense, il lui reste $defense_bulbizarre point de défense</p>";
	echo "<p> Pikachu perd $coup PV, il lui reste $pv_pikachu PV</p>";
}

if ($pv_bulbizarre <= 0) {
	echo "<p>Bulbizarre est KO</p>";
}

if ($pv_pikachu <= 0) {
	echo "<p>Pikachu est KO</p>";
}

// La contre attaque

echo "<p>Bulbizarre riposte<p>";
if ($attaque_bulbizarre >= $defense_pikachu) {
	$coup = $attaque_bulbizarre - $defense_pikachu + 1;
	$pv_pikachu -= $coup;
	echo "<p>Pikachu perd $coup PV, il lui reste $pv_pikachu PV</p>"; 
} else {
	$coup = ($defense_pikachu - $attaque_bulbizarre) /2;
	$pv_bulbizarre -= $coup;
	$defense_pikachu -= 1;
	echo "<p>Pikachu perd 1 point de défense, il lui rest $defense_pikachu point de défense</p>";
	echo "<p>Bulbizarre râte son attaque, il perd $coup PV, il lui reste $pv_bulbizarre PV</p>";
}

// Ajoutons quelques baies pour restaurer les PV
$pv_baie_rouge = 50;
$pv_baie_noire = 30;
 ?>
