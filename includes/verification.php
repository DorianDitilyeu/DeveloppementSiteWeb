<!--Commande PHP permettant de vérifier les cookies-->
<?php
  include("connexion.inc.php");
  $pseudo=$_POST['pseudo'];
  $passe=$_POST['passe'];
  $query="SELECT * FROM utilisateurs WHERE pseudo=:pseudo AND motdepasse=:motdepasse"; //Commande SQL permettant de recherche l'utilisateur dans la BDD
  $prep=$pdo->prepare($query);
  $prep->bindValue(':pseudo', $pseudo); //Recupération du pseudo de l'utilisateur
  $prep->bindValue(':motdepasse', $passe); //Recupération du mot de passe de l'utilisateur
  $prep->execute();

  $test=$prep->rowCount();

  if($test==0){
      header("Location:..\connexion.php");//Commande permettant de revenir sur la page connexion
  }

  else{
      $connect = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST']:false;
      setcookie('pseudo', $pseudo, time()+60*60*24*365, '/', $connect, false);
      echo $_COOKIE['pseudo'];
      header("Location:..\index.php");//Commande permettant de revenir sur l'index
  }
?>
