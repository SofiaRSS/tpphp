
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <!--Zone de l'Entete-->
    <div class="jumbotron text-center" style="margin-bottom:0">
        <h1>BIBLIO DRIVE</h1>
        <div class="alert alert-warning">
            <strong>Attention!
              <p>La Bibliothèque de Moulinart est fermée au public jusqu'à nouvel ordre. Mais il vous est possible de réserver et retirer vos livres via notre service Biblio Drive!</p> 
            </strong>
          </div>
    </div>

        <div class="row">
            <div class="col-sm-8">
            <!--Zone Recherche-->
                 <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
                    <ul class="navbar-nav">
                        <?php 
                        //possible d'afficher les liens que quand on est admin
                        //var_dump(isset($_SESSION['profil']));
                        //var_dump($_SESSION['profil'] == 'admin');
                        if(isset($_SESSION['profil']) && $_SESSION['profil']=='admin')
                        {
                            echo '<li class="nav-item">';
                            echo '<a class="nav-link" href="http://localhost/PROJET/ajoumembre.php">Ajout Membre</a>';
                            echo '</li>';
                            echo '<li class="nav-item">';
                            echo '<a class="nav-link" href="http://localhost/PROJET/auteur.php">Ajout Auteur</a>';
                            echo '</li>';
                            echo '<li class="nav-item">';
                            echo '<a class="nav-link" href="http://localhost/PROJET/ajoutlivre.php">Ajout Livre</a>';
                            echo '</li>';
                            
                        }
                        else
                        //sinon ça redirige vers la page acceuil
                        {
                           header('Location: acceuil.php');
                        }
                        ?>
                    </ul>  
                </nav>
            </div>
            
            <div class="col-sm-4">
                <?php include 'seconnecter.php';?>
            </div>
       </div>