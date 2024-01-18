<?php
session_start();
require_once('connexion.php');

$stmt = $connexion->prepare("SELECT * FROM utilisateur WHERE mel = :mel AND motdepasse = :motdepasse");

// insertion d'une ligne
$mel = $_POST['mel'];
$motdepasse =$_POST['motdepasse']; 

$stmt->bindValue(':mel', $mel);
$stmt->bindValue(':motdepasse', $motdepasse);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$stmt->execute();

$nb_ligne_affectees = $stmt->rowCount();
if ($nb_ligne_affectees)
{
    // si $enregistrement n'est pas vide = on a trouvé quelque chose -> on est connecté
    echo '<h4>Bienvenue !</h4>';

    //Affichage du Profil
    $enregistrement = $stmt->fetch(PDO::FETCH_OBJ);
    if ($enregistrement)
    {
        $_SESSION['prenom'] = $enregistrement->prenom;
        $_SESSION['nom'] = $enregistrement->nom;
        $_SESSION['mel'] = $enregistrement->mel;
        $_SESSION['adresse'] = $enregistrement->adresse;
        $_SESSION['codepostal'] = $enregistrement->codepostal;
        $_SESSION['ville'] = $enregistrement->ville;
        $_SESSION['profil'] = $enregistrement->profil;

        //session_write_close();
        header('Location:acceuil.php');

}  
else 
{
    // La requête n'a pas retournée de résultat, on a pas trouvé de ligne correspondant au mel et mot de passe
    echo "Echec à la connexion."; 
}
}
?>