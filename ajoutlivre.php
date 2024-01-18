<?php 
session_start();
include 'adminpage.php';?>
<div class="container-fluid">
    <h1> AJOUTER UN LIVRE </h1>
    <br>
<?php
if (!isset($_POST['Envoyer']))
{
    echo '
    <form  method="post">

        <label for="auteur">Auteur :</label>
        <select name="noauteur" id="noauteur">';

        require_once('connexion.php');
        $stmt = $connexion->prepare("SELECT * FROM auteur ");
        $stmt->setFetchMode(PDO::FETCH_OBJ);          
        $stmt->execute();          
        $enregistrement = $stmt->fetch();
        echo "<option value='$enregistrement->noauteur'>$enregistrement->nom $enregistrement->prenom </option>";
        while($enregistrement = $stmt->fetch(PDO::FETCH_OBJ))
        {                   
           echo "<option value='$enregistrement->noauteur'>$enregistrement->nom $enregistrement->prenom </option>";
        }
        echo '</select>';
        echo '
        <br><br>
        Titre : <input name="titre" type="text" size ="30" required>

        <br><br>
        ISBN13 : <input name="isbn13" type="text" size ="30" required>

        <br><br>
        Annee de parution : <input name="anneeparution" type="text" size ="30" required>

        <br><br>
        Resume : <textarea name="resume" rows="10" cols="30" required></textarea>

        <br><br>
        Image : <input name="image" type="text" size ="30" required>

        <br><br>
        <input type="submit" name="Envoyer" value="Ajouter">

    </form>
    ';
}
else
{
require_once('connexion.php');

$stmt = $connexion->prepare("INSERT INTO livre (noauteur,titre, isbn13, anneeparution, resume ,dateajout, image) VALUES (:noauteur, :titre, :isbn13, :anneeparution, :resume , :dateajout, :image)");

// insertion d'une ligne

$noauteur = $_POST['noauteur'];
$titre =$_POST['titre']; 
$isbn13 = $_POST['isbn13'];
$anneeparution =$_POST['anneeparution'];
$resume =$_POST['resume'];
$image = $_POST['image'];
$dateajout = date("Y-m-d H:i:s");

$stmt->bindValue(':noauteur', $noauteur, PDO::PARAM_STR);

$stmt->bindValue(':titre', $titre, PDO::PARAM_STR);

$stmt->bindValue(':isbn13', $isbn13, PDO::PARAM_STR);

$stmt->bindValue(':anneeparution', $anneeparution, PDO::PARAM_STR);

$stmt->bindValue(':resume', $resume, PDO::PARAM_STR);

$stmt->bindValue(':image', $image, PDO::PARAM_STR);

$stmt->bindValue(':dateajout', $dateajout, PDO::PARAM_STR);

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
