<?php
// session_start() nous permet d'utiliser $_SESSION sur cette page
session_start();
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
</head>
<body>
<?php
    
    // Si l'utilisateur n'est pas connecté, il est redirigé vers connexion.php
    if (empty($_SESSION['user'])) {
        header('location: connexion.php');
    }

    include "pdo.php";
    include "requete.php";

    //Je stock tout les utilisateurs enregistrés en BdD dans une variable
    $allData = requete_lire_all_user();

?>
  <h1 class="text-center text-uppercase">accueil</h1>
  <br>

  <h2 class="text-center text-capitalize"> blog sur la mythologie grecque</h2>
  <br>
  <div id="carouselExampleCaptions" class="carousel carousel-dark slide " data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div id="imgDefault" class="carousel-inner d-block w-100">
    <div class="carousel-item active">
      <a href="image/Zeus.png"><img src="image/Zeus.jpeg" id="imgDefault" class="d-block mx-auto img-fluid" alt="img01"></a>
      <div class="carousel-caption d-none d-md-block">
        <h5>Zeus</h5>
        <p>Dieu des Dieux</p>
      </div>
    </div>
    <div class="carousel-item">
      <a href="image/Hera.png"><img src="image/Héra.jpeg" id="imgDefault" class="d-block mx-auto img-fluid" alt="img02"></a>
      <div class="carousel-caption d-none d-md-block">
        <h5>Héra</h5>
        <p>Femme de Zeus</p>
      </div>
    </div>
    <div class="carousel-item">
      <a href="image/Poseidon.png"><img src="image/Poseidon.jpeg" id="imgDefault" class="d-block mx-auto img-fluid" alt="img03"></a>
      <div class="carousel-caption d-none d-md-block">
        <h5>Poséïdon</h5>
        <p>Dieu des Mers, des Océans et frère de Zeus</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<br><br>
    <div class="text-center dropdown">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
        Liens déroulants
        </a>

  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <li><a class="dropdown-item" href="image/Zeus.png">Zeus</a></li>
    <li><a class="dropdown-item" href="image/Hera.png">Héra</a></li>
    <li><a class="dropdown-item" href="image/Poseidon.png">Poséïdon</a></li>
    <li><a class="dropdown-item" href="image/Hephaïstos.png">Héphaïstos</a></li>
    <li><a class="dropdown-item" href="image/Hades.png">Hadès</a></li>
    <li><a class="dropdown-item" href="image/Demeter.png">Déméter</a></li>
    <li><a class="dropdown-item" href="image/Hermes.png">Hermès</a></li>
    <li><a class="dropdown-item" href="image/Apollon.png">Apollon</a></li>
    <li><a class="dropdown-item" href="image/Artemis.png">Artémis</a></li>
    <li><a class="dropdown-item" href="image/Dionysos.png">Dionysos</a></li>
    <li><a class="dropdown-item" href="image/Athena.png">Athéna</a></li>
    <li><a class="dropdown-item" href="image/Aphrodite.png">Aphrodite</a></li>
  </ul>
</div>
<br><br>
<center>
        <form action="deconnexion.php">

            <!-- Un bouton qui envoie sur déconnexion.php pour se déconnecter -->
            <button class="btn btn-danger">DECONNEXION</button>

        </form>
</center>
<div class="container mt-5 mb-5 d-flex justify-content-center">
    <!-- Un bouton un peu inutile qui renvoie en haut de la page ! :D -->
    <a id="retourHaut" href="#" class="btn btn-dark">RETOUR HAUT</a>
</div> 


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    

</body>
</html>