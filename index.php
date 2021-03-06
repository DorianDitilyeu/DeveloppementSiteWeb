<?php include ("fonctions/connexion.inc.php") ?>
<!DOCTYPE html>
<html lang=fr>
<head>
<meta charset=utf-8>
<meta name=viewport content="width=device-width, initial-scale=1">
<meta name=description content>
<meta name=author content>
<title>Micro blog</title>
<link href=vendor/bootstrap/css/bootstrap.min.css rel=stylesheet>
<link href=css/freelancer.css rel=stylesheet>
<link href=css/style.css rel=stylesheet>
<link href=vendor/font-awesome/css/font-awesome.min.css rel=stylesheet type=text/css>
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel=stylesheet type=text/css>
<link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel=stylesheet type=text/css>
<!--[if lt IE 9]>
<script src=https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js></script>
<script src=https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js></script>
<![endif]-->
</head>
<body id=page-top class=index>
<?php
    include ("includes/haut.inc.php");
  ?>
<section>
<div class=container>
<div class=row>
<?php if(isset($_GET['id'])){ ?>
<form action=fonctions/modification.php method=Post>
<div class=col-sm-10>
<div class=form-group>
<p><?php
if (isset($_COOKIE['pseudo'])) {
echo 'Vous êtes connecté en tant que '.$_COOKIE['pseudo'].' !';
}
else {
echo 'Vous n\'êtes pas connecté';
}
?>
</p>
<textarea id=message name=message class=form-control placeholder=Message><?php
$identifiant = $_GET['id'];
$query = "SELECT * FROM messages WHERE id = '$identifiant'";
$stmt = $pdo->query($query);
while ($donnees = $stmt->fetch()) {
echo $donnees['contenu'];
}
?></textarea>
<input type=hidden name=id value=<?php echo $identifiant ?>>
</div>
</div>
<div class=col-sm-2>
<button type=submit class="btn btn-success btn-lg">Modifier</button>
</div>
</form>
<?php
}
else{
?>
<form action=fonctions/message.php method=Post enctype=multipart/form-data>
<div class=col-sm-10>
<div class=form-group>
<p><?php
if (isset($_COOKIE['pseudo'])) {
echo 'Vous êtes connecté en tant que '.$_COOKIE['pseudo'].' !';
}
else {
echo 'Vous n\'êtes pas connecté';
}
?>
</p>
<textarea id=message name=message class=form-control placeholder=Message></textarea>
</div>
<input type=file name=fichier id="fichier"/>
</div>
<div class=col-sm-2>
<button type=submit class="btn btn-success btn-lg">Envoyer</button>
</div>
</form>
</div>
<?php } ?>
<div class=row>
<div class=col-md-12>
<?php
$nbCommentaire = 5;
$query = $pdo->query('SELECT id FROM messages');
$stmt = $query->rowCount();
$totalCommentaire = ceil($stmt/$nbCommentaire);
if(isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0){
$_GET['page'] = intval($_GET['page']);
$directCommentaire = $_GET['page'];
}
else{
$directCommentaire = 1;
}
$debut = ($directCommentaire-1)*$nbCommentaire;
$prep = $pdo->query('SELECT id, contenu, date, vote, image FROM messages ORDER BY date DESC LIMIT '.$debut.','.$nbCommentaire);
?>
<nav aria-label="Page navigation" style=text-align:left>
<ul class="pagination pagination-lg">
<?php
for($i = 1;$i <= $totalCommentaire; $i++){
/*if ($i = $_GET['page']) {
echo('<li class="page-item"><span class="page-link">'.$i.'<span class="sr-only">(current)</span></span>');
}
else{*/
echo('<li class="page-item"><a class"page-link" href="index.php?page='.$i.'">'.$i.'</a>');
//}
}
?>
</ul>
</nav>
<?php
while ($donnees = $prep->fetch()) {
?>
<blockquote>
<p><?php echo $donnees['contenu'];?></p>
<?php if ($donnees['image'] != null){ ?>
<img class=img-thumbnail width=200px src=fonctions/img/<?php echo $donnees['image'];?> />
<p></p>
<?php } ?>
<footer>
<?php echo date('Y-m-d H:i:s', $donnees['date']);?>
<a href="index.php?id=<?php echo $donnees['id']; ?>" class="btn btn-success">Modifier</a>
<a href="supprimer.php?supp=<?php echo $donnees['id']; ?>" class="btn btn-danger">Supprimer</a>

<a href="fonctions/vote.php?id=<?php echo $donnees['id'] ?>" id=aime data-id=<?php echo $donnees['id']; ?> class="btn btn-info">J'aime</a>
<?php //} ?>
</footer>
<footer>
<?php
echo("J'aime : ");
echo $donnees['vote'];
?>
</footer>
</blockquote>
<?php
}
?>
</div>
</div>
</div>
</section>
<?php
include ("includes/bas.inc.php");
?>
</body>
</html>
