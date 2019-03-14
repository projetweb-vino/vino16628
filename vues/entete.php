<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Un petit verre de vino</title>

		<meta charset="utf-8">
		<meta http-equiv="cache-control" content="no-cache">
		<meta name="viewport" content="width=device-width, minimum-scale=0.5, initial-scale=1.0, user-scalable=yes">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<meta name="description" content="Un petit verre de vino">
		<meta name="author" content="Jonathan Martel (jmartel@cmaisonneuve.qc.ca)">

		<link rel="stylesheet" href="./css/normalize.css" type="text/css" media="screen">
		<link rel="stylesheet" href="./css/base_h5bp.css" type="text/css" media="screen">
		<link rel="stylesheet" href="./css/main.css" type="text/css" media="screen">
		<base href="<?php echo BASEURL; ?>">
		<!--<script src="./js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>-->
		<!-- <script src="./js/plugins.js"></script> -->
		<script src="./js/main.js"></script>
	</head>
	<body >
		<header>
			<h1>Un petit verre de vino ?</h1>
			<nav>
				<ul>
					<li><a href="<?php echo URL_ROOT; ?>?requete=cellier">Mon cellier</a></li>
					<li><a href="<?php echo URL_ROOT; ?>?requete=ajouterNouvelleBouteilleCellier">Ajouter une bouteille au cellier</a></li>
					Bonjour <?php echo $_SESSION["UserName"]; ?>
					<?php
                    if (!$_SESSION["UserName"]==null){
                        echo "<a href='".URL_ROOT."index.php?requete=Logout'>Se déconnecter</a>";
                    }
                    else{
                         echo "<a href='".URL_ROOT."index.php?requete=Login'>Se connecter</a>";
                    }
                    ?>
				</ul>
			</nav>
		</header>
		<main>
			