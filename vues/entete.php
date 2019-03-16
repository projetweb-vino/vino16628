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
	<body class="text-center">
		<header class="container-fluid">
			<div class="pos-f-t">
			  <div class="collapse" id="navbarToggleExternalContent">
			    <div class="bg-dark p-4">
			      <h5 class="text-white h4">Collapsed content</h5>
			      <span class="text-muted">Toggleable via the navbar brand.</span>
			    </div>
			  </div>
			  <nav class="navbar navbar-dark bg-dark">
			    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
			      <span class="navbar-toggler-icon"></span>
			    </button>
			  </nav>
			</div>
			<br><br>
			<!-- Grand logo -->
			<img class="mb-6" src="images/logo_grand.png" alt="logo" width="100">
			<nav >
				<ul class="nav">
					<li class="nav-item"><a class="nav-link active" href="?requete=CellierParUsager">Mon cellier</a></li>
					<li class="nav-item"><a class="nav-link" href="?requete=ajouterNouvelleBouteilleCellier">Ajouter une bouteille au cellier</a></li>
				</ul>
			</nav>
			<img class="mb-6 pt-4" src="images/cellier.jpg" alt="" width="100%">

		</header>
		<main role="main">
			