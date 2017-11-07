<?php

function attaque($nom_pokemon1, &$pokemon1, $nom_pokemon2, &$pokemon2) {
    // $tour est initialisée à 0 et conservera sa dernière modification à chaque appel de la fonction graçe au mot clé static
    static $tour = 0;
    echo "<hr><h2> Tour : " . ++$tour . " à " . date('H:i:s') . "</h2>";
    // pokemon1 attaque pokemon2
    echo "<h3 style=\" font-size: 3em; \">$nom_pokemon1 attaque $nom_pokemon2</h3>";
    if ($pokemon1['attaque'] >= $pokemon2['defense']) {
      // L'attaque est supérieure à la défense : pokemon1 touche
      $coup = $pokemon1['attaque'] - $pokemon2['defense'] + 1; // La valeur du coup est la différence entre l'attaque et la défense
      $pokemon2['pv'] -= $coup;
      echo "<p>$nom_pokemon2 perd <span class=\"negative\">$coup PV</span>, il lui reste <span class=\"pv\"> " . $pokemon2['pv'] . " PV </span></p>";
    } else {
      // La défense est supérieure à l'attaque, pokemon1 prend la moitié du coup et la défense baisse un peu
      $coup = ($pokemon2['defense'] - $pokemon1['attaque']) / 2;
      $pokemon1['pv'] -= $coup;
      $pokemon2['defense'] -= 1;
      echo "<p>$nom_pokemon2 perd <span class=\"negative\"> 1 PDEF </span>, il lui reste <span class=\"def\">" . $pokemon2['defense'] . " PDEF </span></p>";
      echo "<p>$nom_pokemon1 rate son attaque ! Il perd <span class=\"negative\">$coup PV</span>, il lui reste <span class=\"pv\">" . $pokemon1['pv'] . " PV </span></p>";
    }
    if ($pokemon2['pv'] <= 0) // S'il n'y a pas d'accolades après un if, seule la première instruction est filtrée par le if
      echo "<hr><p class=\" ko \">$nom_pokemon2 est KO !</p><hr>";
    if ($pokemon1['pv'] <= 0)
      echo "<hr><p class=\" ko \">$nom_pokemon1 est KO !</p><hr>";
  }

?>