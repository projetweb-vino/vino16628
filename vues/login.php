<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sign-in/">

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
  	<div class="container">
  		<div class="col-lg-4 mx-auto">
  			<?php
				if(!isset($_SESSION["UserID"]))
				{
			?>
		
		    <form method="POST" class="form-signin" action="<?php echo URL_ROOT; ?>index.php">
			  <img class="mb-4" src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
			  <h1 class="h3 mb-3 font-weight-normal">Connexion</h1>
			  <label for="inputEmail" class="sr-only">Nom usager</label>
			  <input type="text" id="inputEmail" name="username" class="form-control" placeholder="Nom usager" required autofocus>
			  <label for="inputPassword" class="sr-only">Mot de passe</label>
			  <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Mot de passe" required>
			  <div class="checkbox mb-3">
			    <label>
			      <input type="checkbox" value="remember-me">Se souvenir de moi
			    </label>
			  </div>
			  <button class="btn btn-lg btn-outline-danger" type="submit" value="Login">Se connecter</button>
			  <input type="hidden" name="requete" value="Login">
			  <p class="mt-5 mb-3 text-muted">&copy; 2019-2020</p>
			</form>
			<a href='<?php echo URL_ROOT; ?>index.php?requete=Enregistrer'>Enregistrer</a>
		<?php
				}
				else
				{
					echo "<p>Vous êtes déjà connecté sous le nom " . $_SESSION["UserName"] . "</p>";
					echo "<a href='".URL_ROOT."index.php?requete=Logout'>Se déconnecter</a>";
				}
			if(isset($messageErreur))
				echo "<p>$messageErreur</p>";
		?>	
		</div>
	</div>
</body>
</html>

<!-- <html>
	<head>
		<meta charset="UTF-8">
		<title>Login sur la base</title>
	</head>
	<body class="main">
		<div class="all">
			<h1>Bienvenu dans notre site!</h1>
			<h2>Entrez votre nom d’usager et mot de passe </h2>
			<?php
				if(!isset($_SESSION["UserID"]))
				{
			?>
			<form method="POST" action="<?php echo URL_ROOT; ?>index.php">
				Nom d'usager : <input type="text" name="username"/><br>
				Mot de passe : <input type="password" name="password"/><br>
				<input type="submit"  value="Login"/>
				<input type="hidden" name="requete" value="Login">
			</form>
			<a href='<?php echo URL_ROOT; ?>index.php?requete=Enregistrer'>Enregistrer</a>
		<?php
				}
				else
				{
					echo "<p>Vous êtes déjà connecté sous le nom " . $_SESSION["UserName"] . "</p>";
					echo "<a href='".URL_ROOT."index.php?requete=Logout'>Se déconnecter</a>";
				}
			if(isset($messageErreur))
				echo "<p>$messageErreur</p>";
		?>	
	</div>
	</body>
</html> -->