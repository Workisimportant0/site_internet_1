<?php
if (
    isset($_POST["pseudo"])
    && isset($_POST["motDePasse"])
    && $_POST["pseudo"]!="" && $_POST["motDePasse"] !=""
) {
    $connexion = connectBdd("chezoim");
    $sql = 'SELECT * FROM utilisateur WHERE pseudo = :pseudo';
    $resultat = $connexion->prepare($sql);
    $resultat->execute(
        [
            "pseudo" => $_POST["pseudo"]
        ]
        );
        $utilisateurAvecMemePseudo = $resultat->fetch();
        if ($utilisateurAvecMemePseudo) {
            echo "Choisissez un autre pseudo ! ";
        } else {
            if ($_POST["motDePasse"] == $_POST["confirmeMotDePasse"]) {
                $sql = 'INSERT INTO utilisateur (pseudo, motDePasse)
                VALUES (:pseudo, :motDePasse)';
                $resultat = $connexion->prepare($sql);
                $resultat->execute(
                    [
                        ":pseudo" => $_POST["pseudo"],
                        ":motDePasse" => password_hash($_POST["motDePasse"], PASSWORD_BCRYPT)
                    ]
                    );
                    echo "Vous avez bien été inscrit ! ";
            }
        }
} else {
    echo "Tous les champs sont obligatoires";
}
?>
<center>
<form method="post">
    <label>Votre identifiant</label><br>
    <input type="text" name="pseudo"><br>
    <label>Votre mot de passe</label><br>
    <input type="password" name="motDePasse"><br>
    <label>Confirmez votre mot de passe</label><br>
    <input type="text" name="confirmeMotDePasse"><br>
    <input type="submit" name="S'inscrire">
</form>
</center>