<h1>Mon Blog</h1>
<?php
    $connexion = connectBdd("chezoim");
    $resultat = $connexion->query("SELECT * FROM article;");
    $listearticles = $resultat->fetchAll();
        foreach($listearticles as $article) {
            setlocale(LC_TIME, "fr_FR");
            $date = strtotime("%A %d %B %G", strtotime($article["date"]));
            ?>
<article>
    <h1><?php echo $article["titre"]; ?></h1>
    <legend>Auteur : <?php echo $article["auteur"]; ?><?php echo $date; ?></legend>
    <img src="./img/<?php echo $article["nom_image"]; ?>"  alt="">
    <p><?php echo substr($article["contenu"], 0, 300); ?></p>
    <button type="button" class="btn btn-info">Afficher la suite de l'article</button>
</article>       
<?php
}
?>
