<?php
    session_start();
    include 'entete.php';
    //lien de suppression
    if(isset($_GET['supprimer']))
    {
        //on recupere la variable et on la supprime
        $suppression=$_GET['supprimer'];
        unset($_SESSION['panier'][$suppression]);
    }

    //bouton de validation
    if(isset($_POST['valider']))
    {
        if (isset($_SESSION['panier'])&& !empty($_SESSION['panier']))
        {
            require_once('connexion.php');

            foreach($_SESSION['panier'] as $nolivre=>$quantité)
            {
                $stmt = $connexion->prepare("INSERT INTO emprunter VALUES (:mel, :nolivre, :dateemprunt, :dateretour)");

                // insertion d'une ligne

                $mel = $_SESSION['mel'];
                $dateemprunt = date("Y-m-d H:i:s");
                $retour = strtotime("+1 Mois");
                $dateretour = date("Y-m-d H:i:s",$retour);

                $stmt->bindValue(':mel', $mel, PDO::PARAM_STR);

                $stmt->bindValue(':nolivre', $nolivre, PDO::PARAM_STR);

                $stmt->bindValue(':dateemprunt', $dateemprunt, PDO::PARAM_STR);

                $stmt->bindValue(':dateretour', $dateretour, PDO::PARAM_STR);

                $stmt->execute();
            }
            unset($_SESSION['panier']);
        }
    }
?>
<br>
<div class="container-fluid">
    <div class="row">
      <div class="col-sm-9">
        <h2>Votre Panier</h2>
                <?php
                echo '<form method="post">';
                echo '<table>';
                //Verification si la session du panier existe et si il contient au moins un element
                if (isset($_SESSION['panier'])&& !empty($_SESSION['panier']))
                { 
                        //si oui on liste 
                        require_once('connexion.php');
                        //var_dump($_SESSION['panier']);
                        //on parcourt chaque elemenet dans le tableau avec la boucle foreach
                        foreach($_SESSION['panier'] as $nolivre=>$quantité)
                        {
                            $stmt = $connexion->prepare("SELECT * FROM livre l INNER JOIN auteur a ON (a.noauteur=l.noauteur) WHERE nolivre = :nolivre");
                    
                            //$nolivre=$_GET['nolivre'];
                    
                            $stmt->bindValue(':nolivre', $nolivre);
                            $stmt->setFetchMode(PDO::FETCH_OBJ);
                            $stmt->execute();

                            while ($enregistrement = $stmt->fetch())
                            {
                                echo '<div class="list-group">';
                                echo "<tr>";
                                echo "<td class='list-group-item list-group-item-action'>$enregistrement->prenom $enregistrement->nom $enregistrement->titre-($enregistrement->anneeparution)</td>";
                                //echo '<td>'.$_SESSION['panier'][$nolivre].'</td>';
                                echo "<td><a href='http://localhost/PROJET/panier.php?supprimer=$enregistrement->nolivre'class='btn btn-primary'>Supprimer</a></td>";
                                echo "</tr>";  
                                echo '<input class="btn btn-success" type="submit" name="valider" value="Valider le panier">';
                            }
                        } 
                }
                else 
                {
                    echo "<tr><td>Votre panier est vide</td></tr>";
                }
                echo '</table>';
                echo '</form>';
                ?>
            <a href="http://localhost/PROJET/acceuil.php" class="btn btn-primary">Acceuil</a>
            </div>
            <div class="col-sm-3">
            <?php include 'seconnecter.php';?>
            </div>
    </div>
  </div>
    


<!--Fin de page-->
<div class="jumbotron text-center" style="margin-bottom:0">
<p>FIN</p>
</div>
            