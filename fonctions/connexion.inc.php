<!--Commande PHP permettant la connexion à la base de données-->
<?php
$pdo = new PDO('mysql:host=localhost;dbname=micro blog', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
