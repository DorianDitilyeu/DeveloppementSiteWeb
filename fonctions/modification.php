<!--Commande PHP permettant la modification d'un message dans la base de données-->
<?php
  include ("connexion.inc.php");

  $query = "UPDATE messages SET contenu = :contenu,date = :date WHERE id = :id"; //Commande SQL permettant l'update dans la BDD
  $prep = $pdo->prepare($query);
  $prep->bindValue(':contenu', $_POST['message']); //Recupération du contenu du commentaire
  $prep->bindValue(':date', time()); //Recupération de l'id du commentaire
  $prep->bindValue(':id', $_POST['id']); //Recupération de l'id du commentaire

  $prep->execute();

  header('Location: ../index.php'); //Commande permettant de revenir sur l'index
?>
