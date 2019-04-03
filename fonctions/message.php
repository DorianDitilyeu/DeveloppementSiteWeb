<!--Commande PHP permettant l'insertion d'un message dans la base de données-->
<?php
include ("connexion.inc.php");
if ($_FILES['fichier']['error'] != UPLOAD_ERR_NO_FILE) {
$dossier = 'img/';
$fichier = basename($_FILES['fichier']['name']);
if (move_uploaded_file($_FILES['fichier']['tmp_name'], $dossier . $fichier)) {
$image = $_FILES["fichier"]["name"];
}
else {
$image = "";
}
$query = "INSERT INTO messages(contenu, date, vote, image) VALUES(:contenu, :date, 0, :image)";
$prep = $pdo->prepare($query);
$prep->bindValue(':contenu', $_POST['message']);
$prep->bindValue(':date', time());
$prep->bindValue(':image', $image);
$prep->execute();
header('Location: ../index.php'); //Commande permettant de revenir sur l'index
}
else{
$query = "INSERT INTO messages (contenu, date, vote, image) VALUES (:contenu, :date, 0, :image)"; //Commande SQL permettant l'insertion dans la BDD
$prep = $pdo->prepare($query);
$prep->bindValue(':contenu', $_POST['message']); //Recupération du contenu du commentaire
$prep->bindValue(':date', time()); //Recupération de la date de l'insertion
$prep->bindValue(':image', '');
$prep->execute();
header('Location: ../index.php'); //Commande permettant de revenir sur l'index
}
?>
