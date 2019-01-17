<?php
  include("connexion.inc.php");
  $pseudo=$_POST['pseudo'];
  $passe=$_POST['passe'];
  $query="SELECT * FROM utilisateurs WHERE pseudo=:pseudo AND motdepasse=:motdepasse";
  $prep=$pdo->prepare($query);
  $prep->bindValue(':pseudo', $pseudo);
  $prep->bindValue(':motdepasse', $passe);
  $prep->execute();

  $nbr=$prep->rowCount();

  if($nbr==0){
      header("Location:..\connexion.php");
  }

  else{
      $domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;
      setcookie('pseudo', $pseudo, time()+60*60*24*365, '/', $domain, false);
      echo $_COOKIE['pseudo'];
      header("Location:..\index.php");
  }
?>
