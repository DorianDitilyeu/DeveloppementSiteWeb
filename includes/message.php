<?php

  include ("connexion.inc.php");

  $query = "INSERT INTO messages (contenu, date, vote) VALUES (:contenu, :date, 0)";
  $prep = $pdo->prepare($query);
  $prep->bindValue(':contenu', $_POST['message']);
  $prep->bindValue(':date', time());

  $prep->execute();

  header('Location: ../index.php');
?>
