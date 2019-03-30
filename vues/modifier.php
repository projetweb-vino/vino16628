<div class="container tm-mt-big tm-mb-big">
  <div class="row">
    <div class="tm-block-col tm-col-account-settings mx-auto">
      <div class="tm-bg-primary-dark tm-block tm-block-settings">
        <h2 class="tm-block-title text-dark">Modifier</h2>

        <!-- Formulaire de modification -->
        <form method="POST" class="tm-signup-form row">

          <!-- Le nom -->
          <div class="form-group col-lg-6">
            <label for="nom">Nom</label>
            <input
              value = "<?php echo $data['nom']?>" 
              id="nom"
              name="nom"
              type="text"
              class="form-control validate"
            />
            <!-- Afficher un message d'erreur s'il y'a lieu -->
            <?php  if(isset($message['erreur_nom'])) { ?>
              <p class="alert alert-danger"><?php echo $message['erreur_nom']?></p>
            <?php 
            } 
            ?>
          </div>

          <!-- Date d'achat -->
          <div class="form-group col-lg-6">
            <label for="date_achat">Date d'achat</label>
            <input
              id="date_achat"
              name="date_achat"
              type="date"
              class="form-control validate"
              value = "<?php echo $data['date_achat']?>"
            />
             <!-- Afficher un message d'erreur s'il y'a lieu -->
            <?php  if(isset($message['erreur_date_achat'])) { ?>
              <p class="alert alert-danger"><?php echo $message['erreur_date_achat']?></p>
            <?php 
            } 
            ?>
          </div>

          <!-- Description -->
          <div class="form-group col-lg-12">
            <label for="description">Description</label>
            <input
              id="description"
              name="description"
              type="text"
              class="form-control validate"
              value = "<?php echo $data['description']?>"
            />
           
          </div>

          <!-- Garder jusqu'à -->
          <div class="form-group col-lg-6">
            <label for="garde_jusqua">Garder jusqu'à</label>
            <input
              id="garde_jusqua"
              name="garde_jusqua"
              type="date"
              class="form-control validate"
              value = "<?php echo $data['garde_jusqua']?>"
            />
           <!-- Afficher un message d'erreur s'il y'a lieu -->
            <?php  if(isset($message['erreur_garde_jusqua'])) { ?>
              <p class="alert alert-danger"><?php echo $message['erreur_garde_jusqua']?></p>
            <?php 
            } 
            ?>
          </div>

          <!-- Notes -->
          <div class="form-group col-lg-6">
            <label for="notes">Notes</label>
            <input
              id="notes"
              name="notes"
              type="text"
              class="form-control validate"
              value = "<?php echo $data['notes']?>"
            />
            
          </div>

          <!-- Prix -->
          <div class="form-group col-lg-6">
            <label for="prix_saq">Prix</label>
            <input
              id="prix_saq"
              name="prix_saq"
              type="text"
              class="form-control validate"
              value = "<?php echo $data['prix_saq']?>"
            />
             <!-- Afficher un message d'erreur s'il y'a lieu -->
            <?php  if(isset($message['erreur_prix'])) { ?>
              <p class="alert alert-danger"><?php echo $message['erreur_prix']?></p>
            <?php 
            } 
            ?>
          </div>

          <!-- Quantité -->
          <div class="form-group col-lg-6">
            <label for="quantite">Quantité</label>
            <input
              id="quantite"
              name="quantite"
              type="text"
              class="form-control validate"
              value = "<?php echo $data['quantite']?>"
            />
            <!-- Afficher un message d'erreur s'il y'a lieu -->
            <?php  if(isset($message['erreur_quantite'])) { ?>
              <p class="alert alert-danger"><?php echo $message['erreur_quantite']?></p>
            <?php 
            } 
            ?>
          </div>

          <!-- Pays -->
          <div class="form-group col-lg-6">
            <label for="pays">Pays</label>
            <input
              id="pays"
              name="pays"
              type="text"
              class="form-control validate"
              value = "<?php echo $data['pays']?>"
            />
            <!-- Afficher un message d'erreur s'il y'a lieu -->
            <?php  if(isset($message['erreur_pays'])) { ?>
              <p class="alert alert-danger"><?php echo $message['erreur_pays']?></p>
            <?php 
            } 
            ?>
            
          </div>

          <!-- Millesime -->
          <div class="form-group col-lg-6">
            <label for="millesime">Millesime</label>
            <input
              id="millesime"
              name="millesime"
              type="text"
              class="form-control validate"
              value = "<?php echo $data['millesime']?>"
            />
           <!-- Afficher un message d'erreur s'il y'a lieu -->
            <?php  if(isset($message['erreur_millesime'])) { ?>
              <p class="alert alert-danger"><?php echo $message['erreur_millesime']?></p>
            <?php 
            } 
            ?>
            
          </div>

          <!-- Format -->
          <div class="form-group col-lg-6">
            <label for="format">Format</label>
            <input
              id="format"
              name="format"
              type="text"
              class="form-control validate"
              value = "<?php echo $data['format']?>"
            />
           <!-- Afficher un message d'erreur s'il y'a lieu -->
            <?php  if(isset($message['erreur_format'])) { ?>
              <p class="alert alert-danger"><?php echo $message['erreur_format']?></p>
            <?php 
            } 
            ?>
            
          </div>

          <!-- SELECT Types -->
          <div class="form-group col-lg-6">
            <label for="type">Types</label>
            <select class="form-control custom-select" id="type" name="type">
            <?php foreach ($data['types'] as $key => $type) { ?>
              <option value="<?php echo $type['id'] ?>"><?php echo $type['type'] ?></option>
            <?php } ?>
            </select>
            
          </div>

          <!-- Bouton sauvegarder -->
          <div class="form-group col-lg-6">
            <label class="tm-hide-sm">&nbsp;</label>
            <button
              type="submit"
              class="btn btn-primary btn-block text-uppercase"
            >
              Sauvegarder
            </button>
            <input type="hidden" name="requete" value="sauvegarder">
          </div>
          
        </form>
        <!-- Fin du formulaire de modification -->
       
      </div>
    </div>
  </div>
</div>