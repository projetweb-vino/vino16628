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
      <div class="col-lg-4 mx-auto">
        <?php
        if(isset($_SESSION["UserID"]))
        {
         
      ?>
    
        <form method="POST" class="form-signin" action="<?php echo URL_ROOT; ?>index.php">
        <img class="mb-6" src="images/logo.png" alt="" width="72">
        <h1 class="h3 mb-3 font-weight-normal">Changer le mot de passe </h1>
        
        <label for="inputPassword" >Mot de passe actuel</label>
        <input type="password" id="inputPassword" name="password" class="form-control"  required>
        <!-- Afficher un message d'erreur s'il y'a lieu -->
        <?php  if(isset($erreur['erreur_invalide'])) { ?>
          <p class="alert alert-danger"><?php echo $erreur['erreur_invalide']?></p>
        <?php 
        } 
        ?>

        <label for="inputPassword" >Nouveau mot de passe</label>
        <input type="password" id="inputPassword" name="passwordNouveau" class="form-control"  required>
        <!-- Afficher un message d'erreur s'il y'a lieu -->
        <?php  if(isset($erreur['erreur_longueur'])) { ?>
          <p class="alert alert-danger"><?php echo $erreur['erreur_longueur']?></p>
        <?php 
        } 
        ?>

        <label for="inputPassword" >Comfirmer le nouveau mot de passe</label>
        <input type="password" id="inputPassword" name="passwordRepeat" class="form-control"  required>
        <!-- Afficher un message d'erreur s'il y'a lieu -->
        <?php  if(isset($erreur['erreur_identique'])) { ?>
          <p class="alert alert-danger"><?php echo $erreur['erreur_identique']?></p>
        <?php 
        } 
        ?>
      
      <input type="submit"  value="Modifier le mot de passe" class="btn btn-primary" />
      <!-- <input type="button"  value="Annuler" class="btn btn-primary" id="annuler" /> -->
      <a class="btn btn-primary" href="index.php?requete=CellierParUsager">Annuler</a>

      <input type="hidden" name="requete" value="ChangerMotDePass">
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
