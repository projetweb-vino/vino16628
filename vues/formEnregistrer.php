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

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <div class="container">
      <div class="col-lg-6 mx-auto">
        <?php
        if(!isset($_SESSION["UserID"]))
        {
      ?>
    
       
    <form role="form" method="POST" class="form-signin" action="<?php echo URL_ROOT; ?>index.php" >
      <h2>S'enregistrer</h2>
      <hr class="colorgraph">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <input type="text" name="nom" id="nom" class="form-control input-lg" placeholder="Nom" tabindex="1" required>
            <!-- Afficher un message d'erreur s'il y'a lieu -->
            <?php  if(isset($message['erreur_nom'])) { ?>
              <small class="text-danger"><?php echo $message['erreur_nom']?></small>
            <?php 
            } 
            ?>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <input type="text" name="prenom" id="prenom" class="form-control input-lg" placeholder="Prénom" tabindex="2" required>
             <!-- Afficher un message d'erreur s'il y'a lieu -->
            <?php  if(isset($message['erreur_prenom'])) { ?>
              <small class="text-danger"><?php echo $message['erreur_prenom']?></small>
            <?php 
            } 
            ?>
          </div>
        </div>
      </div>
      <div class="form-group">
        <input type="text" name="username" id="username" class="form-control input-lg" placeholder="Nom d'utilisateur" tabindex="3" required>
         <!-- Afficher un message d'erreur s'il y'a lieu -->
            <?php  if(isset($message['erreur_nomUsager'])) { ?>
               <small class="text-danger"><?php echo $message['erreur_nomUsager']?></small>
            <?php 
            } 
            ?>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Mot de passe" tabindex="5" required>
            <!-- Afficher un message d'erreur s'il y'a lieu -->
            <?php  if(isset($message['erreur_motDePasse'])) { ?>
              <small class="text-danger"><?php echo $message['erreur_motDePasse']?></small>
            <?php 
            } 
            ?>
            
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <input type="password" name="passwordRepeat" id="passwordRepeat" class="form-control input-lg" placeholder="Confirmer le mot de passe" tabindex="6" required>
             <!-- Afficher un message d'erreur s'il y'a lieu -->
            <?php  if(isset($message['erreur_motDePasseConfirm'])) { ?>
              <small class="text-danger"><?php echo $message['erreur_motDePasseConfirm']?></small>
            <?php 
            } 
            ?>
          </div>

        </div>
        
          
      </div>
            
      <hr class="colorgraph">
      <div class="row">
        <div class="col-xs-12 col-md-6"><input type="submit" value="S'enregistrer" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
        <input type="hidden" name="requete" value="Enregistrer">
        <div class="col-xs-12 col-md-6"><a href="index.php?requete=Login" class="btn btn-success btn-block btn-lg">Se connecter</a></div>
      </div>
    </form>
      <?php
        }
        else
        {
          echo "<p>Vous êtes déjà connecté sous le nom " . $_SESSION["UserName"] . "</p>";
          echo "<a href='index.php?requete=Logout'>Se déconnecter</a>";
        }
        ?>  
        <p class="mt-5 mb-3 text-muted">&copy; 2019-2020</p>
        </div>
    </div>  
  </body>
</html>
