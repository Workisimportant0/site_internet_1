<h1>Ajouter un produit</h1>
<a href="user.php?page=deco">Deconnexion</a>

<?php
    if (
        isset($_POST["nom"])
        && isset($_POST["nomImage"])
        && isset($_POST["description"])
        && isset($_POST["prix"])
    ) {
        if ($_POST["nom"] !=""  && $_POST["nomImage"] !="" && $_POST["description"] !="" && $_POST["prix"] !="") {
            $sql = "INSERT INTO produit (nom, nomImage, description, prix)
            VALUES (:nom, :nomImage, :description, :prix)";
            $connexion = connectBdd("chezoim");
            $resultat = $connexion->prepare($sql);
            $resultat->execute(
                [
                    ":nom" => $_POST["nom"],
                    ":nomImage" => $_POST["nomImage"],
                    ":description" => $_POST["description"],
                    ":prix" => $_POST["prix"]
                ]
                );
        }
    } else {
        echo "Remplissez tous les champs";
    }

?>
<form method="post">
    <input type="text" name="nom">
    <input type="text" name="nomImage">
    <textarea name="description" cols="30" rows="10"></textarea>
    <input type="number" name="prix">
    <input type="submit" value="ajouter produit">
</form>