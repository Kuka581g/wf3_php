<?php

function attaque($nom_pokemon1, &$pokemon1, $nom_pokemon2, &$pokemon2) {
    static $tour = 0;
    echo "<hr><h2> Tour : " . ++$tour . " à " . date('H:i:s') . "</h2>";
    
    echo "<h3>$nom_pokemon1 attaque $nom_pokemon2</h3>";
    if ($pokemon1['attaque'] >= $pokemon2['defense']) {
      $coup = $pokemon1['attaque'] - $pokemon2['defense'] + 1;
      $pokemon2['pv'] -= $coup;
      echo "<p>$nom_pokemon2 perd $coup PV, il lui reste " . $pokemon2['pv'] . " PV</p>";
    } else {
        $coup = ($pokemon2['defense'] - $pokemon1['attaque']) / 2;
        $pokemon1['pv'] -= $coup;
        $pokemon2['defense'] -= 1;
        echo "<p>$nom_pokemon2 perd 1 Points de défense, il lui reste " . $pokemon2['defense'] . " Points de défense</p>";
        echo "<p>$nom_pokemon1 rate son attaque ! Il perd $coup Points de vie, il lui reste " . $pokemon1['pv'] . " Points de vie</p>";
    }
    if ($pokemon2['pv'] <= 0)
    echo "<hr><p style=\"color: red; font-weight: 600; font-size: 3em; text-shadow: 1px 0px 1px;\">$nom_pokemon2 est KO !</p><hr>";
    
    if ($pokemon1['pv'] <= 0)
    echo "<hr><p style=\"color: red; font-weight: 600; font-size: 3em; text-shadow: 1px 0px 1px;\">$nom_pokemon1 est KO !</p><hr>";
} 

?>