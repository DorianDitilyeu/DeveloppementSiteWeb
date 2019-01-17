<!--Commande PHP permettant la modification d'un message dans la base de données-->
<?php
  include ("connexion.inc.php");

  $query = "UPDATE messages SET contenu = :contenu,date = :date WHERE id = :id"; //Commande SQL permettant l'update dans la BDD
  $prep = $pdo->prepare($query);
  $prep->bindValue(':contenu', $_POST['message']);
  $prep->bindValue(':date', time());
  $prep->bindValue(':id', $_POST['id']);

  $prep->execute();

  header('Location: ../index.php');
?>
