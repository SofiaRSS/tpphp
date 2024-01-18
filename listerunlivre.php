<?php
session_start();
include 'entete.php';?>
<br>
<div class="container-fluid">
    <div class="row">
      <div class="col-sm-9">
        <!--Listage des livres-->
        <?php
        require_once('connexion.php');

        $stmt = $connexion->prepare("SELECT * FROM livre INNER JOIN auteur ON (auteur.noauteur=livre.noauteur) WHERE nom = :nom");

        $nom = $_POST['nom'];

        $stmt->bindValue(':nom', $nom); 
        $stmt->setFetchMode(PDO::FETCH_OBJ);

        $stmt->execute();
        while($enregistrement = $stmt->fetch())
        {
          echo '<div class="list-group">';
          echo "<a href='http://localhost/PROJET/detailslivre.php?nolivre=$enregistrement->nolivre' class='list-group-item list-group-item-action'>$enregistrement->titre  ($enregistrement->anneeparution)</a><br><br>";
          echo '</div>';
        }
        ?>
      </div>
     <div class="col-sm-3">
     <?php include 'seconnecter.php';?>
     </div>
   </div>
</div>

<br>

<!--Fin de page-->
<div class="jumbotron bg-dark text-center" style="margin-bottom:0">
<p>FIN</p>
</div>
