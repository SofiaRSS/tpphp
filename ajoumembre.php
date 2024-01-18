<?php 
session_start();
include 'adminpage.php';?>
<div class="container-fluid">
    <h1> AJOUTER UN MEMBRE </h1>
    <br>
    <?php 
    //Mettre condition pour restreindre 
        if (!isset($_POST['Envoyer']))
        {
            echo '
            <form method = "post" >
            Mel : <input name="mel" type="text" size ="30" required
            pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$"><br>
            Mot de passe : <input name="motdepasse" type="text" size ="30" required
            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"><br>
            <p>Doit contenir au moins un chiffre et une lettre majuscule et minuscule, et au moins 8 caracteres ou plus.</p>
            Nom :<input name="nom" type="text" size ="30" required><br>
            Prenom: <input name="prenom" type="text" size ="30" required><br>
            Adresse : <input name="adresse" type="text" size ="30" required><br>
            Ville :<input name="ville" type="text" size ="30" required><br>
            Code Postal :<input name="codepostal" type="text" size ="30" required><br>
            Profil: <input name="profil" type="text" size ="30" required><br>
            <input type="submit" name="Envoyer" value="Creer un membre"><br>
            </form>
            ';
        }
        else 
        {
            require_once('connexion.php');

            $stmt = $connexion->prepare("INSERT INTO utilisateur (mel,motdepasse,nom,prenom,adresse , ville , codepostal ) VALUES (:mel,:motdepasse,:nom,:prenom,:adresse , :ville , :codepostal )");


            // insertion d'une ligne

            $mel = $_POST['mel'];
            $motdepasse =$_POST['motdepasse']; 
            $nom = $_POST['nom'];
            $prenom =$_POST['prenom'];
            $adresse =$_POST['adresse'];
            $ville =$_POST['ville'];
            $codepostal =$_POST['codepostal'];

            $stmt->bindValue(':mel', $mel, PDO::PARAM_STR);

            $stmt->bindValue(':motdepasse', $motdepasse, PDO::PARAM_STR);

            $stmt->bindValue(':nom', $nom, PDO::PARAM_STR);

            $stmt->bindValue(':prenom', $prenom, PDO::PARAM_STR);

            $stmt->bindValue(':adresse', $adresse, PDO::PARAM_STR);

            $stmt->bindValue(':ville', $ville, PDO::PARAM_STR);

            $stmt->bindValue(':codepostal', $codepostal, PDO::PARAM_STR);

            $stmt->execute();

            $nb_ligne_affectees = $stmt->rowCount();

            echo $nb_ligne_affectees." NOUVEAU MEMBRE AJOUTEE.<BR>";
        }
    ?>
</div>    
<br>
        <!--Fin de page-->
        <div class="jumbotron bg-dark text-center" style="margin-bottom:0">
        <p>FIN</p>
        </div>
