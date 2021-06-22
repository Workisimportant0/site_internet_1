<?php
    $connexion = connectBdd("chezoim");
    $resultat = $connexion->query("SELECT * FROM produit;");
    $listeProduits= $resultat->fetchAll();
    foreach ($listeProduits as $produit) {?>
        <h2><?php echo $article["nom"] ?></h2>
        <img src="./img/<?php echo $article["nomImage"]; ?>"  alt="">
        <p><?php echo $article["description"] ?></p>
        <h3><?php echo $article["prix"] ?></h3>
    <?php
    }
?>
