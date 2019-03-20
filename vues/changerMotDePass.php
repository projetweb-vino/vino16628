<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Enregistrer</title>
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
				if(isset($_SESSION["UserID"]))
				{
          echo $error;
			?>
		
		    <form method="POST" class="form-signin" action="<?php echo URL_ROOT; ?>index.php">
			  <img class="mb-4" src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
			  <h1 class="h3 mb-3 font-weight-normal">ChangerMotDePass </h1>
			  
			  <label for="inputPassword" class="sr-only">Mot de passe</label>
			  <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Mot de passe" required>

        <label for="inputPassword" class="sr-only">Nouveau mot de passe</label>
        <input type="password" id="inputPassword" name="passwordNouveau" class="form-control" placeholder="Mot de passe" required>

        <label for="inputPassword" class="sr-only">Entrer encore mot de passe</label>
        <input type="password" id="inputPassword" name="passwordRepeat" class="form-control" placeholder="Entrer encore mot de passe" required>

			 <!--  <div class="checkbox mb-3">
			    <label>
			      <input type="checkbox" value="remember-me">Se souvenir de moi
			    </label>
			  </div> -->
			
			<input type="submit"  value="Enregistrer"/>
			<input type="hidden" name="requete" value="ChangerMotDePass">
      </form>
			<?php
				}
				else
				{
					echo "<p>Vous êtes déjà connecté sous le nom " . $_SESSION["UserName"] . "</p>";
					echo "<a href='index.php?requete=Logout'>Se déconnecter</a>";
				}
			if(isset($messageErreur))
				echo "<p>$messageErreur</p>";
		    ?>	
		    <p class="mt-5 mb-3 text-muted">&copy; 2019-2020</p>
        </div>
    </div>  
  </body>
</html>
