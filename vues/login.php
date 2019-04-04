<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Login</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
   
    <!-- CDN Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Notre style -->
    <link rel="stylesheet" href="css/style.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
   	
  </head>

  <body>
  	<?php
		if(!isset($_SESSION["UserID"]))
		{
	?>
    <div class="container tm-mt-big tm-mb-big cont-login">
	
      <div class="row">
        <div class="col-12 mx-auto tm-login-col">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12 text-center">
                <h2 class="tm-block-title mb-4 text-dark">Bienvenu</h2>
                <?php 
                // On affiche un message d'erreur si le nom d'utilisateur et mot de passe sont invalides
                if(isset($messageErreur)){
                ?>
                <div class="alert alert-danger" role="alert">
                  <?php 
                    echo $messageErreur;
                  ?>
                </div>
                <?php 
                }
                ?>
              </div>
              
              
            </div>
            <div class="row mt-2">
              <div class="col-12">
                <form  method="post" class="tm-login-form" action="<?php echo URL_ROOT; ?>index.php">
                  <div class="form-group">
                    <label for="username">Nom d'usager</label>
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1"><i class="far fa-user"></i></span>
                   
                    <input
                      name="username"
                      type="text"
                      class="form-control validate"
                      id="username"
                      value=""
                      required
                    />
                     </div>
                  </div>
                  <div class="form-group mt-3">
                    <label for="password">Mot de passe</label>
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                    <input
                      name="password"
                      type="password"
                      class="form-control validate"
                      id="password"
                      value=""
                      required
                    />
                    </div>
                  </div>
                  <div class="form-group mt-4">
                    <button
                      type="submit"
                      class="btn btn-primary btn-block text-uppercase"
                    >
                      Se connecter
                    </button>
                  </div>
                  <input type="hidden" name="requete" value="Login">
                  
                </form>
                
                <a class="mt-5 btn btn-primary btn-block text-uppercase" href='<?php echo URL_ROOT; ?>index.php?requete=Enregistrer'>S'enregistrer</a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <footer class="tm-footer bg-dark row tm-mt-small">
      <div class="col-12 font-weight-light">
        <p class="text-center text-white mb-0 px-4 small">
          Copyright &copy; <b>2019</b> Tous droits réservés. 
          
          Réalisé par : <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link">Foudil Benzaid, Okba Benaissa, Galina Prima, Jordan Williams</a>
        </p>
      </div>
    </footer>
    <?php
		}
		else
		{
			echo "<p>Vous êtes déjà connecté sous le nom " . $_SESSION["UserName"] . "</p>";
			echo "<a href='".URL_ROOT."index.php?requete=Logout'>Se déconnecter</a>";
		}
		
	?>	
  </body>
</html>
