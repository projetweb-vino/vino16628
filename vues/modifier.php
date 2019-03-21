<div class="container contact-form">
  <!-- Le formulaire de modification -->
  
  <form method="POST">
    <div class="row">
      <div class="form-group col-md-6">
        <label for="nom">Nom de la Bouteille :  </label>
        <input type="text" class="form-control"  name="nom" id="nom" value = "<?php echo $data['nom']?>" >
          <!-- Afficher un message d'erreur s'il y'a lieu -->
          <?php  if(isset($message['erreur_nom'])) { ?>
            <p class="alert alert-danger"><?php echo $message['erreur_nom']?></p>
          <?php 
          } 
          ?>
      </div>
      <div class="form-group col-md-6">
        <label for="date_achat">Date d'achat :  </label>
        <input type="date" class="form-control"  name="date_achat" id="date_achat" value = "<?php echo $data['date_achat']?>" >
          <!-- Afficher un message d'erreur s'il y'a lieu -->
          <?php  if(isset($message['erreur_date_achat'])) { ?>
            <p class="alert alert-danger"><?php echo $message['erreur_date_achat']?></p>
          <?php 
          } 
          ?>
      </div>
      <div class="form-group col-md-6">
        <label for="garde_jusqua">Garder jusqu'à :  </label>
        <input type="date" class="form-control"  name="garde_jusqua" id="garde_jusqua" value = "<?php echo $data['garde_jusqua']?>">
        <!-- Afficher un message d'erreur s'il y'a lieu -->
          <?php  if(isset($message['erreur_garde_jusqua'])) { ?>
            <p class="alert alert-danger"><?php echo $message['erreur_garde_jusqua']?></p>
          <?php 
          } 
          ?>
      </div>
      <div class="form-group col-md-6">
        <label for="notes">Notes :  </label>
        <input type="text" class="form-control"  name="notes" id="notes" value = "<?php echo $data['notes']?>" >
      </div>
      <div class="form-group col-md-6">
        <label for="prix_saq">Prix :  </label>
        <input type="text" class="form-control" id="prix_saq" name="prix_saq" value = "<?php echo $data['prix_saq']?>" >
        <!-- Afficher un message d'erreur s'il y'a lieu -->
          <?php  if(isset($message['erreur_prix'])) { ?>
            <p class="alert alert-danger"><?php echo $message['erreur_prix']?></p>
          <?php 
          } 
          ?>
      </div>
      <div class="form-group col-md-6">
        <label for="quantite">Quantité :  </label>
        <input type="number" class="form-control"   name="quantite" id="quantite" value = "<?php echo $data['quantite']?>">
        <!-- Afficher un message d'erreur s'il y'a lieu -->
          <?php  if(isset($message['erreur_quantite'])) { ?>
            <p class="alert alert-danger"><?php echo $message['erreur_quantite']?></p>
          <?php 
          } 
          ?>
      </div>
      <div class="form-group col-md-6">
        <label for="pays">Pays :  </label>
        <input type="text" class="form-control"  name="pays" id="pays" value = "<?php echo $data['pays']?>">
        <!-- Afficher un message d'erreur s'il y'a lieu -->
          <?php  if(isset($message['erreur_pays'])) { ?>
            <p class="alert alert-danger"><?php echo $message['erreur_pays']?></p>
          <?php 
          } 
          ?>
      </div>
      <div class="form-group col-md-6">
        <label for="description">Description :  </label>
        <input type="text" class="form-control" id="description"  name="description" value = "<?php echo $data['description']?>">
      </div>
      <div class="form-group col-md-6">
        <label for="millesime">Millesime :  </label>
        <input type="text" class="form-control" id="millesime"  name="millesime" value = "<?php echo $data['millesime']?>" >
        <!-- Afficher un message d'erreur s'il y'a lieu -->
          <?php  if(isset($message['erreur_millesime'])) { ?>
            <p class="alert alert-danger"><?php echo $message['erreur_millesime']?></p>
          <?php 
          } 
          ?>
      </div>
      <div class="form-group col-md-6">
        <label for="format">Format :  </label>
        <input type="text" class="form-control"  name="format" id="format" value = "<?php echo $data['format']?>" >
        <!-- Afficher un message d'erreur s'il y'a lieu -->
          <?php  if(isset($message['erreur_format'])) { ?>
            <p class="alert alert-danger"><?php echo $message['erreur_format']?></p>
          <?php 
          } 
          ?>
      </div>
      <div class="form-group col-md-6">
        <label for="type">Types :  </label>
          <select class="form-control" id="type" name="type">
          <?php foreach ($data['types'] as $key => $type) { ?>
            <option value="<?php echo $type['id'] ?>"><?php echo $type['type'] ?></option>
          <?php } ?>
        </select>
      </div>
    </div>
    <input type="submit"  class="btn-success" value="Enregistrer">
    <input type="hidden" name="id" value="<?php echo $data["id_bouteille_cellier"]?>">
    <input type="hidden" name="requete" value="sauvegarder">
  </form>
</div>