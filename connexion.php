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
<form action=fonctions/verification.php method=POST>
<section>
<div class=container>
<form>
<div class=form-group>
<label for=exampleInputEmail1>Nom d'utilisateur</label>
<input type=pseudo class=form-control id=pseudo name=pseudo aria-describedby=emailHelp placeholder="Nom d'utilisateur">
</div>
<div class=form-group>
<label for=exampleInputPassword1>Mot de passe</label>
<input type=password class=form-control id=passe name=passe placeholder="Mot de passe">
</div>
<button type=submit class="btn btn-primary">Envoyer</button>
</form>
</div>
</section>
</form>
<?php
      include ("includes/bas.inc.php");
    ?>
</body>
</html>
