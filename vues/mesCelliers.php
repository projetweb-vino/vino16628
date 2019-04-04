<div class="container">
  <div class="row">
      <div class="col">
          <p class="text-dark mt-lg-5 mt-sm-1 mb-sm-1 mb-lg-5">Mes <b>celliers</b></p>
      </div>
  </div>
  <!-- row -->
  <div class="row tm-content-row ">
    <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col mx-auto">
      <div class="tm-bg-primary-dark tm-block tm-block-products">
        <!-- Formulaire d'ajout d'un nouveau cellier -->
        <form method="POST">
          <div class="row tm-content-row ">
            <div class="form-group col-lg-8">
              <label for="nomCellier">Nom</label>
              <input
              id="nomCellier"
              name="nomCellier"
              type="text"
              class="form-control validate"
              value = ""
              required
              />
              <input type="hidden" name="requete" value="ajouterCellier">

              <?php 
              // Afficher un message si le cellier portant le même nom existe déjà
              if(isset($messageErreur))
                echo "<p>$messageErreur</p>";
              ?>
              
            </div>
            <div class="form-group col-lg-4">
              <label class="tm-hide-sm">&nbsp;</label>
              <!-- Bouton Ajouter -->
              <button type="submit" class="btn btn-primary btn-block text-uppercase mb-3" title="Ajouter un cellier"><i class="fas fa-plus"></i> Ajouter</button>

            </div>
          </div>

         

        </form>
        <!-- Fin du formulaire d'ajout -->

        <?php 

        // Si les datas sont vides
        if ($dat !=null) {
      
        ?>
        <div class="tm-product-table-container">
          <table class="table table-hover tm-table-small tm-product-table">
            <thead>
              <tr>
                <th scope="col">&nbsp;</th>
                <th scope="col">Nom du cellier</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col">&nbsp;</th>
              </tr>
            </thead>
            <tbody>
            <?php
            // Parcourir le tableau data
            foreach ($dat as $cle => $cellier) {
            ?>
              <tr>
                <th scope="row"><input type="checkbox" /></th>
                <td class="tm-product-name"><a class="lienCellier" data-id='<?php echo $cellier['id'] ?>' id="<?php echo $cellier['id'] ?>" href="<?php echo '?requete=bouteilleParCellier&id='.$cellier['id'].'#cellier' ?>"><?php echo $cellier['nom'] ?></a></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                  <a href="#" class="tm-product-delete-link">
                    <i class="far fa-trash-alt tm-product-delete-icon"></i>
                  </a>
                </td>
              </tr>
            <?php
            } //Fin du foreach
         
            ?> 
            </tbody>
          </table>
        </div>
      <?php 
      }
      else{
     
      ?>
      <div class="alert alert-info" role="alert">
        Vous n'avez pas de cellier pour le moment !
      </div>
      <?php 
      }

      ?>
      <!-- table container -->
    </div>
  </div>
</div>
</div>