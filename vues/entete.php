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
						<li class="nav-item"><a class="nav-link text-white" href="?requete=CellierParUsager">Mes celliers</a></li>
					</ul>
					
					
					<div class="dropdown">
						
						<a id="stats" href="#"></a>
						
						<button id="btnDown" class="dropbtn">

							<img alt="" class="rounded-circle" src="images/user.png" width="30"> 
							<?php if (isset($_SESSION ['nom']) && isset($_SESSION ['prenom'])):
							 ?>
							<span class="dropbtn" ><?php 	echo $_SESSION ['nom']. ' ' . $_SESSION ['prenom']	?> <i class="fa fa-caret-down"></i></span> 
							<?php endif ?>
							
						</button>
						
						<div id="myDropdown" class="dropdown-content text-left">
						
						    <div class="container contact-form">
						    	<div class="form-group col-md-12">
								  
		                            <div class="navbar-login ">
		                                <div class="row">
		                                    <div class="col-lg-4">
		                                        <p class="text-center">
		                                            <span class="glyphicon glyphicon-user icon-size"><img alt="" class="rounded-circle deuxieme" src="images/user.png" width="80"></span>
		                                        </p>
		                                    </div>
		                                    <div class="col-lg-8">
		                                    	<br>
		                                        <p class="text-left">
		                                     
												<?php if (isset($_SESSION ['nom']) && isset($_SESSION ['prenom'])):
												 ?>
												<strong><?php 	echo $_SESSION ['nom']. ' ' . $_SESSION ['prenom']	?></i></strong> 
												<?php endif ?>

		                                        <!-- Mahesh</strong> -->
		                                        </p>
		                                        <p class="text-left small">
		                                        	<?php if (isset($_SESSION['admin'])){
		                                        		if ($_SESSION['admin'] == 'oui') {
		                                        	
		                                        			echo('Administrateur');
		                                        		}
		                                        		else{
		                                        			echo('Usager');

		                                        		}
		                                        	}
												 	?>
												</p>
		                                        <p class="text-left">
		                                            <a href='index.php?requete=Logout' class="btn btn-primary btn-block btn-sm"><i class="fa fa-fw fa-power-off"></i> Déconnecter</a>
		                                        </p>
		                                    </div>
		                                </div>
		                            </div>
		                          	<hr>
		                            <div class="navbar-login navbar-login-session">
		                                <div class="row">
		                                    <div class="col-lg-12">
		                                   
		                                        <a href='index.php?requete=ChangerMotDePass' class="btn btn-danger"><i class="fa fa-fw fa-cog"></i> Changer le mot de passe</a>
		                                        
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
							</div>
						</div>
					</div>

				</nav>

			</div>
						
			<img id="cellier" src="images/cellier3.jpg" alt="" width="100%">

		</header>
		<main role="main">
			