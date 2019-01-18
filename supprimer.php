<!--Page de suppression d'un commentaire-->
<?php include ("fonctions/connexion.inc.php") ?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Micro blog</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

<!--Ajout du haut de page-->
  <?php
    include ("includes/haut.inc.php");
  ?>

    <!-- Commande permettant la suppression d'un commentaire -->
    <section>
        <div class="container">
            <h1>Suppression en cours</h1>
            <?php
              include ("fonctions/connexion.inc.php");
              $supprimer = $_GET["supp"];

              $query = "DELETE FROM messages WHERE id = $supprimer";
              $prep = $pdo->prepare($query);
              $prep->execute();

              header('Location: index.php');
            ?>
        </div>
    </section>

<!--Ajout du bas de page-->
    <?php
      include ("includes/bas.inc.php");
    ?>
  </body>
</html>
