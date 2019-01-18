<!--Commande PHP permettant l'insertion d'un message dans la base de données-->
<?php

  include ("connexion.inc.php");

  $query = "INSERT INTO messages (contenu, date, vote) VALUES (:contenu, :date, 0)"; //Commande SQL permettant l'insertion dans la BDD
  $prep = $pdo->prepare($query);
  $prep->bindValue(':contenu', $_POST['message']); //Recupération du contenu du commentaire
  $prep->bindValue(':date', time()); //Recupération de la date de l'insertion

  $prep->execute();

  header('Location: ../index.php'); //Commande permettant de revenir sur l'index
?>
