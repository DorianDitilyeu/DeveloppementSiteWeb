<!--Commande PHP permettant la connexion à la base de données-->
<?php
	$pdo = new PDO('mysql:host=localhost;dbname=dorian-ditilyeu', 'root', '');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
