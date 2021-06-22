<h1>Ajouter un article</h1>
<a href="user.php?page=deco">Deconnexion</a>
<?php
if (
    isset($_POST["titre"])
    && isset($_POST["contenu"])
    && isset($_POST["auteur"])
    && isset($_POST["nom_image"])
    && isset($_POST["date"])
) {
    if ($_POST["titre"] != "" && $_POST["contenu"] != "" && $_POST["auteur"] !="" && $_POST["nom_image"] !="" && $_POST["date"] !="") {
        $sql = 'INSERT INTO article (titre, contenu, auteur, nom_image, date)
        VALUES (
            :titre,
            :contenu,
            :auteur,
            :nom_image,
            :date
        )';
        $connexion = connectBdd("chezoim");
        $resultat = $connexion->prepare($sql);
        $resultat->execute(
            [
                ":titre" => $_POST["titre"],
                ":contenu" => $_POST["contenu"],
                ":auteur" => $_POST["auteur"],
                ":nom_image" => $_POST["nom_image"],
                ":date" => $_POST["date"]
            ]
            );
    }
} else {
    echo "Tous les champs sont obligatoires";
}
?>
<form method="post">
    <input type="text" name="titre">
    <textarea name="contenu" id="" cols="30" rows="10"></textarea>
    <input type="text" name="auteur">
    <input type="text" name="nom_image">
    <input type="date" name="date">
    <input type="submit" value="ajouter article">
</form>