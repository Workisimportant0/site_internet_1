<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/5/cyborg/bootstrap.css">
    <title>Mon site internet</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Chezoim</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor03">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="#">Accueil
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Goodies</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-sm-2" type="text" placeholder="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
    <?php
    session_start();
    function connectBdd(
        $bdd,
        $hote = "localhost",
        $user = "root",
        $mdp = ""
      ) {
        $maConnexion = new PDO("mysql:host=" . $hote . ";charset=UTF8; dbname=" . $bdd, $user, $mdp);
        $maConnexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $maConnexion;
      }
      $page = "accueil";
      $listePagesDisponibles = [
        "accueil",
        "ajout-article",
        "connexion",
        "deco",
        "inscription",
        "goodies",
        "blog",
        "404",
        "ajout-produit"
      ];
      $listePagesBackOffice = [
        "ajout-article",
        "ajout-produit"
      ];
      if (isset($_GET["page"])) {
          if (in_array($_GET["page"], $listePagesDisponibles)) {
              if (in_array($_GET["page"], $listePagesBackOffice)) {
                  if (isset($_SESSION["is_admin"]) && $_SESSION["is_admin"]) {
                      $page = $_GET["page"];
                  } else {
                      $page = "connexion";
                  }
              } else {
                  $page = $_GET["page"];
              }
          } else {
              $page = "404";
          }
      }
      include("./" . $page . ".php");
    ?>
</body>
</html>