<div class="card-header bg-dark" style="width:350px" >
    <div class="card-body">
        <?php

        if (isset($_SESSION['profil']))
        {
            //Verification du profil de l'utilisateur 

            //Si l'utilisateur est membre on le redirige vers la page classique
            if ($_SESSION['profil'] == 'membre')
            {
                echo '<br>';
                echo "<h2 class='text-white'> MEMBRE :</h2>";
                echo "<h3 class='text-white'>" .$_SESSION['prenom']. " " . $_SESSION['nom']. "</h3><br>" ;
                echo "<h4 class='text-white'> " .$_SESSION['mel']. "</h4><br>";
                echo "<h3 class='text-white'> " .$_SESSION['adresse']. "</h3><br>" ;
                echo "<h3 class='text-white'> " .$_SESSION['codepostal']. " " .$_SESSION['ville']. "</h3><br>" ;
                echo '<a href="http://localhost/PROJET/deconnexion.php" class="btn btn-primary">Se déconnecter</a>';
            }
            //Si l'utilisateur est admin on le redirige vers la page dédier aux admins
            elseif ($_SESSION['profil'] == 'admin')
            {
            //Affichage des données est differents pour l'admin
                echo '<br>';
                echo "<h2 class='text-white'> ADMIN :</h2>";
                echo "<h3 class='text-white'> " .$_SESSION['prenom']. " " .$_SESSION['nom']. "</h3><br>" ;
                echo "<h4 class='text-white'> " .$_SESSION['mel']. "</h4><br>";
                //if (basename($_SERVER['PHP_SELF']) != 'adminpage.php') {
                //header('Location: adminpage.php');
                //} 
                //else
                //{
                    echo '<a href="http://localhost/PROJET/deconnexion.php" class="btn btn-primary">Se déconnecter</a>';
                //}
            }
            else 
            {
                echo "Profil introuvable";
            }
        }
        else
        {
            echo '
            <h4 class="text-white"> SE CONNECTER </h4>
            <form method = "post" action="connecter.php">
            <input name="mel" type="text" size ="30" placeholder="Votre Email" required
            pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$">
            <input name="motdepasse" type="password" size ="30" placeholder="Votre Mot de Passe" required
            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
            <input type="submit" class="btn btn-primary" name="Connection" value="Se connecter">
            </form>
                </div>
            </div>
            ';
        }
        ?>
    </div>
</div>