<?php 
session_start();
include 'adminpage.php';?>
<div class="container-fluid">
    <h1> AJOUTER UN AUTEUR </h1>
    <br>
<?php
if (!isset($_POST['Envoyer']))
{
  echo '
  <form method = "post" >
    Numero auteur : <input name="num" type="text" size ="30" required><br>
    Nom auteur : <input name="nom" type="text" size ="30" required><br>
    Prenom auteur :<input name="prenom" type="text" size ="30" required><br>
    <input type="submit" name="Envoyer" value="Ajouter"><br>
    </form>
  ';
}
// Connexion au serveur
else
{
  require_once('connexion.php');

  $stmt = $connexion->prepare("INSERT INTO auteur VALUES (:noauteur,:nom,:prenom)");

  // insertion d'une ligne

  $num = $_POST['num'];
  $nom = $_POST['nom'];
  $prenom =$_POST['prenom'];

  $stmt->bindValue(':noauteur', $num, PDO::PARAM_STR);

  $stmt->bindValue(':nom', $nom, PDO::PARAM_STR);

  $stmt->bindValue(':prenom', $prenom, PDO::PARAM_STR);


  $stmt->execute();

  $nb_ligne_affectees = $stmt->rowCount();

  echo $nb_ligne_affectees." ligne() insérée(s).<BR>";
}
?>
</div>
<br>
        <!--Fin de page-->
        <div class="jumbotron bg-dark text-center" style="margin-bottom:0">
        <p>FIN</p>
        </div>

