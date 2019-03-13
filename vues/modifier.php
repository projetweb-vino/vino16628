<div class="container contact-form">

<form method="POST">
  <div class="row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nom de la Bouteille :  </label>
      <input type="text" class="form-control"  name="nom" value = "<?php echo $data['nom']?>" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Date d'achat :  </label>
      <input type="date" class="form-control"  name="date_achat" value = "<?php echo $data['date_achat']?>" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Garder jusqu'à :  </label>
      <input type="text" class="form-control"  name="garde_jusqua" value = "<?php echo $data['garde_jusqua']?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Notes :  </label>
      <input type="text" class="form-control"  name="notes" value = "<?php echo $data['notes']?>" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Prix :  </label>
      <input type="text" class="form-control"  name="prix_saq" value = "<?php echo $data['prix_saq']?>" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Quantité :  </label>
      <input type="number" class="form-control"  name="quantite" value = "<?php echo $data['quantite']?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Pays :  </label>
      <input type="text" class="form-control"  name="pays" value = "<?php echo $data['pays']?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Description :  </label>
      <input type="text" class="form-control"  name="description" value = "<?php echo $data['description']?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Millesime :  </label>
      <input type="text" class="form-control"  name="millesime" value = "<?php echo $data['millesime']?>" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Format :  </label>
      <input type="text" class="form-control"  name="format" value = "<?php echo $data['format']?>" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Types :  </label>
        <select class="form-control" name="type">
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