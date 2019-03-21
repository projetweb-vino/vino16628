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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		
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

				  	
					<ul class="nav">
						<li class="nav-item"><a class="nav-link active" href="?requete=CellierParUsager">Mon cellier</a></li>
						<li class="nav-item"><a class="nav-link" href="?requete=ajouterNouvelleBouteilleCellier">Ajouter une bouteille au cellier</a></li>
					

					</ul>
					
					
					<div class="dropdown">
						<!-- <div class="float-left"> -->
							<a id="stats" href="#"><i class="fa fa-chart-bar" title="Statistiques"></i></a>
						<!-- </div> -->
						<button id="btnDown" class="dropbtn"><a  href="#"  >

							<img alt="" class="rounded-circle" src="images/user.png" width="30"> 
							<?php if (isset($_SESSION ['nom']) && isset($_SESSION ['prenom'])):
							 ?>
							<span ><?php 	echo $_SESSION ['nom']. ' ' . $_SESSION ['prenom']	?> <i class="fa fa-caret-down"></i></span> 
							<?php endif ?>
							</a>
						</button>
						
						<div id="myDropdown" class="dropdown-content text-left">
							<a class="dropdown-item" href="#"><i class="fa fa-fw fa-user"></i>Profil</a>
						    <a class="dropdown-item" href='index.php?requete=ChangerMotDePass'><i class="fa fa-fw fa-cog"></i>Changer le mot de passe</a>
						    <a class="dropdown-item" href='index.php?requete=Logout'><i class="fa fa-fw fa-power-off"></i>Se déconnecter</a>
						</div>
					</div>

				</nav>

			</div>
						
			<img id="cellier" src="images/cellier3.jpg" alt="" width="100%">

		</header>
		<main role="main">
			