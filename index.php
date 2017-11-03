<!DOCTYPE HTML>
<html>
<head>
	<title>Exemple</title>
</head>
<body>

	<?php
	$nom = 'Dupont';
	$prénom = 'Jean';
	$age = 42;

	echo "Bonjour je suis ".$nom." ".$prénom;

	echo "<br/>";

	echo "J'ai $age ans";

	echo "<br/>";

	if ($age > 18 && $prénom == "Jean") {
		echo "Je suis majeur";
	} elseif ($age > 15) {
		echo "Je suis un ado";
	} else {
		echo "Je suis un enfant";
	}

	?>

</body>
</html>