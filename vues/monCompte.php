
      <div class="container mt-5 moncfooter">
        
        <!-- row -->
        <div class="row tm-content-row">
          
          <div class="tm-block-col tm-col-account-settings mx-auto">
            <?php
            // Si l'usager est authentifié
            if(isset($_SESSION["UserID"]))
            {

            ?>
            <div class="tm-bg-primary-dark tm-block tm-block-settings ">
              <h2 class="tm-block-title text-dark">Modifier votre compte</h2>

              <!-- Formulaire -->
              <form  class="tm-signup-form row" method="POST">

                <!-- Nom -->
                <div class="form-group col-lg-6">
                  <label for="name">Nom</label>
                  <input
                    id="name"
                    name="nom"
                    type="text"
                    class="form-control validate"
                    value="<?php 
                    if(isset($data['nom'])){
                      echo $data['nom'];
                    } ?>"
                  />
                   <!-- Afficher un message d'erreur s'il y'a lieu -->
                  <?php  if(isset($message['erreur_nom'])) { ?>
                    <small class="text-warning"><?php echo $message['erreur_nom']?></small>
                  <?php 
                  } 
                  ?>
                </div>

                <!-- Prénom -->
                <div class="form-group col-lg-6">
                  <label for="prenom">Prénom</label>
                  <input
                    id="prenom"
                    name="prenom"
                    type="text"
                    class="form-control validate"
                    value="<?php 
                    if(isset($data['prenom'])){
                      echo $data['prenom'];
                    } ?>"
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
                  <label for="username">Nom d'utilisateur</label>
                  <input
                    id="username"
                    name="username"
                    type="text"
                    class="form-control validate"
                    value="<?php 
                    if(isset($data['username'])){
                      echo $data['username'];
                    } ?>"
                  />
                  <!-- Afficher un message d'erreur s'il y'a lieu -->
                  <?php  if(isset($message['erreur_nomUsager'])) { ?>
                     <small class="text-warning"><?php echo $message['erreur_nomUsager']?></small>
                  <?php 
                  } 
                  ?>
                </div>

                <!-- Mot de passe actuel -->
                <div class="form-group col-lg-12">
                  <label for="password">Mot de passe actuel</label>
                  <input
                    id="password"
                    name="password"
                    type="text"
                    class="form-control validate"
                  />
                  <!-- Afficher un message d'erreur s'il y'a lieu -->
                  <?php  if(isset($message['erreur_invalide'])) { ?>
                    <p class="alert alert-danger"><?php echo $message['erreur_invalide']?></p>
                  <?php 
                  } 
                  ?>
                </div>

                <!-- Le nouveau mot de passe -->
                <div class="form-group col-lg-6">
                  <label for="passwordNouveau">Nouveau mot de passe</label>
                  <input
                    id="passwordNouveau"
                    name="passwordNouveau"
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
                
                <!-- Confirmer le nouveau mot de passe -->
                <div class="form-group col-lg-6">
                  <label for="passwordRepeat">Comfirmer le nouveau mot de passe</label>
                  <input
                    id="passwordRepeat"
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

                <!-- Bouton sauvegarder -->
                <div class="form-group col-lg-6">
                  <label class="tm-hide-sm">&nbsp;</label>
                  <button
                    type="submit"
                    class="btn btn-success btn-block text-uppercase"
                  >
                    Sauvegarder
                  </button>
                  
                  <input type="hidden" name="requete" value="ChangerMotDePass">
                </div>

                <!-- Bouton annuler -->
                <div class="form-group col-lg-6">
                  <label class="tm-hide-sm">&nbsp;</label>
                  <a class="btn btn-primary btn-block text-uppercase" href="index.php?requete=CellierParUsager">Annuler</a>
                </div>
              </form>
              <!-- Fin du formulaire -->
            </div>
            <?php
            }
            else
            {
              echo "<p>Vous n'avez pas l'autorisation pour effectuer cette action!</p>";
            }
            ?>  
          </div>
        </div>
      </div>
      
      <script type="text/javascript">
        //Au chargement de la page : on active le menu 'Mon compte' et on désactive les autres
        window.addEventListener('load', function() {
          document.getElementById("monCompte").classList.add("active");
          document.getElementById("celliers").classList.remove("active");
        });
      </script>
     