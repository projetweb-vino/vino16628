<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>S'enregistrer</title>
    <!-- Font Google  -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
     <!-- FontAwesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CDN Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Notre style -->
    <link rel="stylesheet" href="css/style.css">
   
  </head>

  <body>

      <?php
        // Si l'usager est authentifié
        if(!isset($_SESSION["UserID"]))
        {
      ?>
      <div class="container tm-mt-big tm-mb-big">
        <div class="row">
          <div class="tm-block-col tm-col-account-settings mx-auto">
            <div class="tm-bg-primary-dark tm-block tm-block-settings">
              <h2 class="tm-block-title text-dark">S'enregistrer</h2>
              <form action="" class="tm-signup-form row">

                <!-- Le nom -->
                <div class="form-group col-lg-6">
                  <label for="name">Nom</label>
                  <input
                    id="name"
                    name="nom"
                    type="text"
                    class="form-control validate"
                  />
                   <!-- Afficher un message d'erreur s'il y'a lieu -->
                  <?php  if(isset($message['erreur_nom'])) { ?>
                    <small class="text-warning"><?php echo $message['erreur_nom']?></small>
                  <?php 
                  } 
                  ?>
                </div>

                <!-- Le prénom -->
                <div class="form-group col-lg-6">
                  <label for="email">Prénom</label>
                  <input
                    id="email"
                    name="prenom"
                    type="text"
                    class="form-control validate"
                  />
                   <!-- Afficher un message d'erreur s'il y'a lieu -->
                  <?php  if(isset($message['erreur_prenom'])) { ?>
                    <small class="text-warning"><?php echo $message['erreur_prenom']?></small>
                  <?php 
                  } 
                  ?>
                </div>

                <!-- Nom d'utilisateur -->
                <div class="form-group col-lg-12">
                  <label for="password">Nom d'utilisateur</label>
                  <input
                    id="password"
                    name="username"
                    type="text"
                    class="form-control validate"
                  />
                  <!-- Afficher un message d'erreur s'il y'a lieu -->
                  <?php  if(isset($message['erreur_nomUsager'])) { ?>
                     <small class="text-warning"><?php echo $message['erreur_nomUsager']?></small>
                  <?php 
                  } 
                  ?>
                </div>

                <!-- Mot de passe -->
                <div class="form-group col-lg-6">
                  <label for="password2">Mot de passe</label>
                  <input
                    id="password2"
                    name="password"
                    type="password"
                    class="form-control validate"
                  />
                  <!-- Afficher un message d'erreur s'il y'a lieu -->
                  <?php  if(isset($message['erreur_motDePasse'])) { ?>
                    <small class="text-warning"><?php echo $message['erreur_motDePasse']?></small>
                  <?php 
                  } 
                  ?>
                </div>

                <!-- Confirmer le mot de passe -->
                <div class="form-group col-lg-6">
                  <label for="phone">Confirmer le mot de passe</label>
                  <input
                    id="phone"
                    name="passwordRepeat"
                    type="password"
                    class="form-control validate"
                  />
                  <!-- Afficher un message d'erreur s'il y'a lieu -->
                  <?php  if(isset($message['erreur_motDePasseConfirm'])) { ?>
                    <small class="text-warning"><?php echo $message['erreur_motDePasseConfirm']?></small>
                  <?php 
                  } 
                  ?>
                </div>

                <!-- Bouton s'enregistrer -->
                <div class="form-group col-lg-6">
                  <label class="tm-hide-sm">&nbsp;</label>
                  <button
                    type="submit"
                    class="btn btn-primary btn-block text-uppercase"
                  >
                    S'enregistrer
                  </button>
                  <input type="hidden" name="requete" value="Enregistrer">
                </div>
                
              </form>

              <!-- Le bouton se connecter -->
              <a class="btn btn-primary btn-block text-uppercase" href="index.php?requete=Login" class="btn btn-success btn-block btn-lg">Se connecter</a>
            </div>
          </div>
        </div>
      </div>
      <?php
        }
        else
        {
          echo "<p>Vous êtes déjà connecté sous le nom " . $_SESSION["UserName"] . "</p>";
          echo "<a href='index.php?requete=Logout'>Se déconnecter</a>";
        }
        ?>  
      <footer class="tm-footer row tm-mt-small">
        <div class="col-12 font-weight-light">
          <p class="text-center text-white mb-0 px-4 small">
            Copyright &copy; <b>2018</b> All rights reserved. 
            
            Design: <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link">Template Mo</a>
          </p>
        </div>
      </footer>
    </body>
</html>
