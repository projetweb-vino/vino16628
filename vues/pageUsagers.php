
  	<div class="container">
      <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 tm-block-col">
      		<div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
      			<h2 class="tm-block-title text-dark">Liste des usagers</h2>
            <table class="table table-hover tm-table-small tm-product-table">
              <thead>
              <tr>
                <th scope="col">Nom d'utilisateur</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <!-- <th scope="col">Sellier de l'usager</th> -->
                <th scope="col">Supprimer l'usager</th>
              </tr>
              </thead>
              <tbody>
              <?php foreach ($data as $i => $usager) { ?>
                <tr>
                  <td><?php echo $usager['username']; ?></td>
                  <td><?php echo $usager['nom']; ?></td>
                  <td><?php echo $usager['prenom']; ?></td>
                  <!-- <td><?php echo $usager['cnom']; ?></td> -->
                  <td>
                    <button data-id="<?php echo $usager['id']; ?>" class="btnSupprimerUsager far fa-trash-alt tm-product-delete-icon tm-product-delete-link"></button>
                      
                  </td>
                </tr> 
              <?php } ?>
            </tbody>
              
            </table>
          </div>
        </div>
      </div>
    </div>  

    <script type="text/javascript">
      //Au chargement de la page : on active le menu 'Paramètres' et on désactive les autres
      window.addEventListener('load', function() {
        document.getElementById("parametres").classList.add("active");
        document.getElementById("monCompte").classList.remove("active");
        document.getElementById("celliers").classList.remove("active");
        document.getElementById("statistiques").classList.remove("active");
      });
    </script>
  