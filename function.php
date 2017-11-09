<?php
function attaque($nom_pokemon1, &$pokemon1, $nom_pokemon2, &$pokemon2) {
  // $tour est initialis�e � 0 et conservera sa derni�re modification � chaque appel de la fonction gr��e au mot cl� static
  static $tour = 0;
  echo "<hr><h2> Tour : " . ++$tour . " à " . date('H:i:s') . "</h2>";
  // pokemon1 attaque pokemon2
  echo "<h3>$nom_pokemon1 attaque $nom_pokemon2</h3>";
  if ($pokemon1['attaque'] >= $pokemon2['defense']) {
    // L'attaque est sup�rieure � la d�fense : pokemon1 touche
    $coup = $pokemon1['attaque'] - $pokemon2['defense'] + 1; // La valeur du coup est la diff�rence entre l'attaque et la d�fense
    $pokemon2['pv'] -= $coup;
    if ($pokemon2['pv'] < 0)
      $pokemon2['pv'] = 0;
    echo "<p>$nom_pokemon2 perd <span class=\"negative\">$coup PV</span>, il lui reste <span class=\"pv\">" . $pokemon2['pv'] . " PV</p>";
  } else {
    // La d�fense est sup�rieure � l'attaque, pokemon1 prend la moiti� du coup et la d�fense baisse un peu
    $coup = ($pokemon2['defense'] - $pokemon1['attaque']) / 2;
    $pokemon1['pv'] -= $coup;
    if ($pokemon1['pv'] < 0)
      $pokemon1['pv'] = 0;
    $pokemon2['defense'] -= 1;
    echo "<p>$nom_pokemon2 perd <span class=\"negative\">1 PDEF</span>, il lui reste <span class=\"def\">" . $pokemon2['defense'] . " PDEF</p>";
    echo "<p>$nom_pokemon1 rate son attaque ! Il perd <span class=\"negative\">$coup PV</span>, il lui reste <span class=\"pv\">" . $pokemon1['pv'] . " PV</p>";
  }
  if ($pokemon2['pv'] <= 0)
    echo "<hr><p class=\"ko\">$nom_pokemon2 est KO !</p><hr>";
  if ($pokemon1['pv'] <= 0)
    echo "<hr><p class=\"ko\">$nom_pokemon1 est KO !</p><hr>";
}
?>