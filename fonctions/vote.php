<!--Commande PHP permettant de rajouter vote sur un message dans la base de données-->
<?php
include ("connexion.inc.php");
$query = "UPDATE messages SET vote = vote+1 WHERE id = :id"; //Commande SQL permettant l'ajout d'un vote dans la BDD
$prep = $pdo->prepare($query);
$prep->bindValue(':id', $_GET['id']); //Recupération de l'id du commentaire
$prep->execute();
header('Location: ../index.php'); //Commande permettant de revenir sur l'index
?>
