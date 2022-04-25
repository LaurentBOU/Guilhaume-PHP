<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Inscription</title>
</head>
<body>
<?php
    include "pdo.php";
    include "requete.php";

    // Si déjà connecté, on redirige vers index.php
    if (!empty($_SESSION['user'])) {
        header('location: index.php');
    }
    ?>
<h2 class="text-center text-capitalize mt-2">Fiche d'inscription</h2><br>
<img src="image/maxresdefault.jpeg" alt="mytho" class="d-block m-auto w-50">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <form action="" method="POST" class="mb-5">
                    <div class="mb-3">
                        <label for="pseudo" class="form-label">Pseudo</label>
                        <input type="text" class="form-control" id="pseudo" name="pseudo" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de Passe</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-outline-primary" name="btn_inscription">Inscription</button>
                </form>
            </div>
        </div>
    </div>

    <?php

        // On vérifie si le $_POST['btn_inscription'] est bien initialisé, btn_inscription est le name donné au bouton de mon formulaire
        if (isset($_POST['btn_inscription'])) {

            //Je cherche si le pseudo saisi dans le formulaire, existe déjà en BdD
            $users = requete_findUser($_POST['pseudo']);

            // J'initialise une variable à 0, cette variable nous permettra d'adapter les messages d'erreur ou de succés sur la page connexion.php
            $existe = 0;

            // Je vérifie si l'utilisateur existe déjà
            if ($users){

                // Si il existe, je met 1 dans la variable $existe et je redirige sur la page connexion.php avec la variable $existe en méthode GET
                $existe = 1;
                header("location: connexion.php?existe=".$existe);

                // Si il n'existe pas...
            } else {

                // Je hash le mdp entré dans le formulaire et le stock dans une variable
                $mdp = password_hash($_POST['password'], PASSWORD_DEFAULT);

                // J'appelle ma fonction qui ajoute un nouvelle utilisateur en BdD avec les bons arguments
                requete_inscription($_POST['pseudo'],$mdp,1);

                //Puis je redirige vers connexion.php toujours avec la variable $existe en méthode GET
                header("location: connexion.php?existe=".$existe);
            }
        }
    ?>
    
</body>
</html>