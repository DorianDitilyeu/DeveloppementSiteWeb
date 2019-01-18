<?php

  include ("connexion.inc.php");

  $query = "UPDATE messages SET vote = vote+1 WHERE id = :id";
  $prep = $pdo->prepare($query);
  $prep->bindValue(':id', $_GET['id']);

  $prep->execute();

  header('Location: ../index.php');
?>
