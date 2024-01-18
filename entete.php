<?php
//session_start();
?>

<html lang="fr">

<head>
<script src="http://localhost/TEST/JS/tarteaucitron/tarteaucitron.js"></script>

  <script>

    tarteaucitron.init({

      "privacyUrl": "", /* URL de la page de la politique de vie privée */

      "hashtag": "#tarteaucitron", /* Ouvrir le panneau contenant ce hashtag */

      "cookieName": "tarteaucitron", /* Nom du Cookie */

      "orientation": "middle", /* Position de la bannière (top - bottom) */

      "showAlertSmall": true, /* Voir la bannière réduite en bas à droite */

      "cookieslist": true, /* Voir la liste des cookies */

      "adblocker": false, /* Voir une alerte si un bloqueur de publicités est détecté */

      "AcceptAllCta": true, /* Voir le bouton accepter tout (quand highPrivacy est à true) */

      "highPrivacy": true, /* Désactiver le consentement automatique : OBLIGATOIRE DANS l'UE */

      "handleBrowserDNTRequest": false, /* Si la protection du suivi du navigateur est activée, tout interdire */

      "removeCredit": false, /* Retirer le lien vers tarteaucitron.js */

      "moreInfoLink": true, /* Afficher le lien "voir plus d'infos" */

      "useExternalCss": false, /* Si false, tarteaucitron.css sera chargé */

      //"cookieDomain": ".my-multisite-domaine.fr", /* Cookie multisite - cas où SOUS DOMAINE */

      "readmoreLink": "/cookiespolicy" /* Lien vers la page "Lire plus" A FAIRE OU PAS  */

    });
    (tarteaucitron.job = tarteaucitron.job || []).push('instagram');
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
<div class="instagram_post" postID="CpK4OYMqbzE" width="width" height="height"></div>
    <!--Zone de l'Entete-->
    <div class="jumbotron bg-dark text-center" style="margin-bottom:0">
        <h1 class="text-white">BIBLIO DRIVE</h1>
        <div class="alert alert-warning">
            <strong>Attention!
              <p>La Bibliothèque de Moulinart est fermée au public jusqu'à nouvel ordre. Mais il vous est possible de réserver et retirer vos livres via notre service Biblio Drive!</p> 
            </strong>
          </div>
    </div>

        <!--<div class="row">
         <div class="col-sm-8">
            <!--Zone Recherche-->
            <nav class="navbar navbar-expand-sm bg-secondary navbar-dark sticky-top">
              <form action="listerunlivre.php" method = "post">
                    <div class="input-group ">
                      <input type="text" name="nom" class="form-control" placeholder="Search">
                        <div class="input-group-append">
                         <button class="btn btn-success" type="submit">Go</button> 
                         <a href="http://localhost/PROJET/panier.php?" class="btn btn-primary">Panier<span><!--array_sum($_SESSION['panier']) ?></span>--></a>
                        </div>
                    </div>
              </form>
            </nav>
         </div>
       </div>
