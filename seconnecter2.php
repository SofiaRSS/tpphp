<?php
//session_start();
require_once('connexion.php');
if(isset($_SESSION['profil'])) 

{ //L'entrée btnEnvoyer est vide = le formulaire n'a pas été posté, on affiche le formulaire /
    echo '<h2>', $_SESSION["prenom"], ' ', 
    $_SESSION["prenom"],'<br><br> ',
    ' ' , $_SESSION["prenom"],'<br><br> ', $_SESSION["prenom"],
    '<br><br>', $_SESSION["prenom"],'<br><br>', $_SESSION["prenom"],' ', $_SESSION["prenom"],'</h2>';

} else
{
    echo '
    <h2>connecter vous à votre compte.</h2>
    <form action="" method="post">
    adresse mail : <input type="text" name="mail"><br><br>
    mot de passe : <input type="password" name="mdp"><br>
    <input type="submit" class="btn btn-primary" name="btnEnvoyer" value="Envoyer">
    </form>';
}
// L'utilisateur a cliqué sur Envoyer, l'entrée btnEnvoyer <> vide, on traite le formulaire /
var_dump($_SESSION['profil']);