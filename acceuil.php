<?php 
  session_start();
  ?>
<?php
if(isset($_SESSION['profil']) && $_SESSION['profil']=='admin')
{
    
    include 'adminpage.php';
    //echo '<li class="nav-item">';
    //echo '<a class="nav-link" href="http://localhost/PROJET/ajoumembre.php">Ajout Membre</a>';
    //echo '</li>';
    //echo '<li class="nav-item">';
    //echo '<a class="nav-link" href="http://localhost/PROJET/auteur.php">Ajout Auteur</a>';
    //echo '</li>';
    //echo '<li class="nav-item">';
    //echo '<a class="nav-link" href="http://localhost/PROJET/ajoutlivre.php">Ajout Livre</a>';
    //echo '</li>';
}
else
//sinon ça redirige vers la page acceuil
{
  //L'Acceuil
  include 'entete.php';

           echo "<br>
           <div class='container-fluid'>
          <div class='row'>
          <div class='col-sm-9'>";
            echo  "<br>
            <h1> DERNIERES ACQUISITIONS </h1>
            <br>";

            //Caroussel dynamique
            echo "<div id='demo' class='carousel slide' data-ride='carousel'>
                  <ul class='carousel-indicators'>
                    <li data-slide-to='0' class='active'></li>
                    <li data-slide-to='1'></li>
                  </ul>
                  <div class='carousel-inner'>
                  ";

                  require_once('connexion.php');
                  $stmt = $connexion->prepare("SELECT * FROM livre limit 2");
                  $stmt->setFetchMode(PDO::FETCH_OBJ);
                  $stmt->execute();
                  $enregistrement = $stmt->fetch();
                  echo '<div class="carousel-item active">';
                  echo '<img src="./IMAGE/'.$enregistrement->image.'">';
                  echo '</div>';
                  while($enregistrement = $stmt->fetch(PDO::FETCH_OBJ))
                  { 
                    echo '<div class="carousel-item">';
                    echo '<img src="./IMAGE/'.$enregistrement->image.'">';
                    echo '</div>';
                  }

                  echo"</div>
                  <a class='carousel-control-prev' data-slide='prev'>
                    <span class='carousel-control-prev-icon'></span>
                  </a>
                  <a class='carousel-control-next' data-slide='next'>
                    <span class='carousel-control-next-icon'></span>
                  </a>
            </div> 
          </div>";

        echo "
          <div class='col-sm-3'>";
          include 'seconnecter.php';
          echo "</div>  

    </div>
  </div>
  ";
}
?>
<br>
  <!--Fin de page-->
  <div class="jumbotron bg-dark text-center" style="margin-bottom:0">
  </div>


  </body>
  </html>
