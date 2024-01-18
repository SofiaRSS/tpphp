 <?php
 session_start();
 //Création d'une session Panier
 //Verification de l'existence de la session Panier
 if(!isset($_SESSION['panier']))
 {//On mets un tableau dans la session qu'on a créé
    $_SESSION['panier']=array();
 }

 if(isset($_GET['nolivre']))
{
      $nolivre=$_GET['nolivre'];

      require_once('connexion.php');
      $stmt = $connexion->prepare("SELECT * FROM livre WHERE nolivre = :nolivre");

      $stmt->bindValue(':nolivre', $nolivre);
      $stmt->setFetchMode(PDO::FETCH_OBJ);
      $stmt->execute();
      
   if(isset($_SESSION['panier']))
 {
    //On ajoute le produit
    $_SESSION['panier'][$nolivre]=1; 
    var_dump($_SESSION);    
 }
 else
 {
   //Si un element existe deja dans le panier on ajoute d'autresS
   $_SESSION['panier'][$nolivre]++; 
 }
}
else
{
    echo "Le numéro de livre n'est pas spécifié.";
    exit();
}

 //on se redirige direct sur la page acceuil
 header("Location:acceuil.php");
 ?>