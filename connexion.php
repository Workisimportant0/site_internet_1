<?php
if(isset($_POST["pseudo"])
    && isset($_POST["motDePasse"])
) {
    $sql = 'SELECT * 
    FROM utilisateur
    WHERE pseudo = :pseudo';

$connexion = connectBdd("chezoim");
# Avec la fonction prepare() on sécurise input pseudo ex pour qu'on puisse pas mettre des comandes sql
$resultat = $connexion->prepare($sql);
$resultat->execute(
    [
        ":pseudo" => $_POST["pseudo"]
    ]
    );
$utilisateur = $resultat->fetch();
    if ($utilisateur && password_verify($_POST["motDePasse"], $utilisateur["motDePasse"])) {
        $_SESSION["pseudo"] = $_POST["pseudo"] ;
        $_SESSION["is_admin"] = $utilisateur["is_admin"] ;
    } else {
        echo "Mauvais pseudo / mot de passe ";
        if ($utilisateur["is_admin"]) {
            header("Location: ./user.php?page=ajout_article");
            header("Location: ./user.php?page=ajout_produit");
        } else {
            header("Location: ./user.php");
        }
    }
}
?>
<form method="post">
    <input type="text" name="pseudo">
    <input type="password" name="motDePasse">
    <input type="submit" value="connexion">
</form>