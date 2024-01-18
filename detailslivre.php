<?php 
session_start();
include 'entete.php';
?>
<br>
<div class="container-fluid">
    <div class="row">
      <div class="col-sm-9">
        <!-- Details du livre-->
        <?php
        require_once('connexion.php');

        $stmt = $connexion->prepare("SELECT * FROM livre l LEFT OUTER JOIN emprunter e on (e.nolivre=l.nolivre) WHERE l.nolivre = :nolivre");
        //$stmt = $connexion->prepare("SELECT * FROM livre l INNER JOIN emprunter e on (e.nolivre=l.nolivre) WHERE l.nolivre = :nolivre");
        $nolivre=$_GET['nolivre'];

        $stmt->bindValue(':nolivre', $nolivre);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();

        while($enregistrement = $stmt->fetch())
        {
          echo '<div class="container-fluid">';
          echo '<div class="row">';

          echo '<div class="col-sm-4">';
          echo '<img src="./IMAGE/'.$enregistrement->image.'" >';
          echo '</div>';

          echo '<div class="col-sm-8">';
          echo '<br>';
          echo "<h3> $enregistrement->titre</h3><br>" ;
          echo '<h3>Résumé du livre</h3><br>';
          echo "<h3> $enregistrement->resume</h3><br>" ;
          echo "<h3> Date de parution: $enregistrement->anneeparution</h3><br>" ;

          //Verification de disponibiltée
          $disponible=$enregistrement->dateretour;

          
          //Si le livre est dispo :
          if($disponible==null)
          {
          echo "<h3>Disponible</h3>";
          //Si il est dispo on ajoute au panier
            if(isset($_SESSION['profil']))
             {
              echo '<a href="http://localhost/PROJET/ajout_panier.php?nolivre='.$nolivre.'" class="btn btn-primary">Ajouter au panier</a>';
             }
          }
          else
          {
            echo "<h3>Pas Disponible</h3>"; 
          }
          echo '<br>';
          echo '<br>';
           echo  '<a href="http://localhost/PROJET/acceuil.php" class="btn btn-primary">Acceuil</a>';
          echo '</div>';
         
          echo '</div>';
          echo '</div>';
        }
        ?>
       </div>

      <div class="col-sm-3">
      <?php include 'seconnecter.php';?>
      </div>

    </div>
  </div>
    


<!--Fin de page-->
<div class="jumbotron bg-dark text-center" style="margin-bottom:0">
<p>FIN</p>
</div>