<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
        crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>

    <?php
    define('HOST', 'localhost'); // Domaine ou IP du serveur ou est située la base de données
    define('USER', 'root'); // Nom d'utilisateur autorisé à se connecter à la base
    define('PASS', ''); // Mot de passe de connexion à la base
    define('DB', 'pokemon'); // Base de données sur laquelle on va faire les requêtes

    function formIsSubmit($form_name) {
        return (isset($_POST[$form_name]) ? $_POST[$form_name] : '0') === '1';
      }

      if (formIsSubmit('insertPokemon')) {
        // code d'insertion
        $numero_pokemon = $_POST['numero_pokemon'];
        $nom_pokemon = $_POST['nom_pokemon'];
        $experience_pokemon = $_POST['experience_pokemon'];
        $vie_pokemon = $_POST['vie_pokemon'];
        $defense_pokemon = $_POST['defense_pokemon'];
        $attaque_pokemon = $_POST['attaque_pokemon'];
        $pokedex_pokemon = $_POST['pokedex_pokemon'];
        // Validation
        // Le nom ne doit pas être vide et faire au maximum 50 caractères
        if (empty($nom_pokemon)) {
          $form_errors['nom_pokemon'] = "Le nom doit être renseigné";
        } elseif (strlen($nom_pokemon) > 50) {
          $form_errors['nom_pokemon'] = "Le nom doit faire 50 caractères maximum";
        } else {
          // ici nous ferons l'insertion
          $query = $db->prepare("INSERT INTO pokedex(nom_pokemon) VALUES (:nom_pokemon)");
          $query->bindParam(':nom_pokemon', $nom_pokemon, PDO::PARAM_STR);
          // exécution de la requête préparée
          try {
            $query->execute();
          } catch(PDOException $e) {
            // Il y a eu une erreur
            if ($e->getCode() == "23000")
              $form_errors['nom_pokemon'] = "Le nom $nom_pokemon existe déjà !";
            else {
              $form_errors['nom_pokemon'] = "Erreur lors de l'insertion en base : " . $e->getMessage();
            }
          }
        }
      }
    ?>

        <div class="text-center">
            <img src="../img/pokemon.png" alt="" style="width: 30%;">
        </div>
        <img src="../img/pokeball.png" alt="" style=" width: 20%;
                position: absolute;
                left: 427px;
                top: 198px;
        ">
        <form action="" style="margin-top: 10px;">
            <div class="form-control form-control-lg" style="margin-top: 5px; margin: auto; width: 50%; text-align: center;    box-shadow: 2px 3px 8px grey;
">
                <div style="text-align: -webkit-right;">
                    <label for="numero_pokemon"> Numéro Pokemon :</label>
                    <input type="text" id="numero_pokemon" name="numero_pokemon">
                    <br>
                    <label for="nom_pokemon"> Nom Pokemon :</label>
                    <input type="text" id="nom_pokemon" name="nom_pokemon">
                    <br>
                    <label for="experience_pokemon"> XP Pokemon :</label>
                    <input type="text" id="experience_pokemon" name="experience_pokemon">
                    <br>
                    <label for="vie_pokemon"> PV Pokemon :</label>
                    <input type="text" id="vie_pokemon" name="vie_pokemon">
                    <br>
                    <label for="defense_pokemon"> DEF Pokemon :</label>
                    <input type="text" id="defense_pokemon" name="defense_pokemon">
                    <br>
                    <label for="attaque_pokemon"> ATK Pokemon :</label>
                    <input type="text" id="attaque_pokemon" name="attaque_pokemon">
                    <br>
                    <label for="pokedex_pokemon"> N.Pokedex :</label>
                    <input type="text" id="pokedex_pokemon" name="pokedex_pokemon">
                    <br>
                </div>
                <button type="submit" style="margin-top: 14px;">Valider</button>
            </div>

        </form>
</body>

</html>