<?php 

$pokemons = array (
    '0' => array (
        'nom' => 'Pikachu',
        'attaque' => 15,
        'defense' => 10,
        'vie' => 25
    ),

    '1' => array (
        'nom' => 'Bulbizarre',
        'attaque' => 8,
        'defense' => 20,
        'vie' => 30
    )
);

foreach($pokemons as $pokemon) {
    if ($pokemon['nom'] == 'Pikachu') {
        
    }

    echo 'Nom : '.$pokemon['nom'].'<br/>';
    echo 'ATK : '.$pokemon['attaque'].'<br/>';
    echo 'DEF : '.$pokemon['defense'].'<br/>';
    echo 'PV : '.$pokemon['vie'].'<br/><br/>';
};


echo 'Nom : '.$pokemons[0]['nom'].'<br/>';
echo 'ATK : '.$pokemons[0]['attaque'].'<br>';
echo 'DEF : '.$pokemons[0]['defense'].'<br>';
echo 'PV : '.$pokemons[0]['vie'].'<br>';







?>