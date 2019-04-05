
<div class="container">
  <div class="row">
      <div class="col">
          <p class="text-dark mt-5 mb-5"><b>Statistiques</b></p>
      </div>
  </div>

  <div class="row tm-content-row">
          
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 tm-block-col">
      <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
        <div class="row">

          <!-- Le nombre d'usagers -->
          <div class="col-md-4">
            <div class="card mb-2">
              <div class="row no-gutters">
                <div class="col-md-4">
                  <i class="fa fa-users fa-5x"></i>
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h1 class="card-title">
                      <?php 
                        if(isset($nombreUsagers))
                          echo $nombreUsagers['nombreUsagers'];
                      ?>
                    </h1>
                    <p class="card-text">Usagers </p>
                   </div>
                </div>
              </div>
            </div>
          </div>
        
          <!-- Le nombre de celliers -->
          <div class="col-md-4">
            <div class="card mb-2">
              <div class="row no-gutters">
                <div class="col-md-4">
                 <img src="images/winery_noir.png">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h1 class="card-title">
                       <?php 
                        if(isset($nombreCelliers))
                          echo $nombreCelliers['nombreCelliers'];
                      ?>
                    </h1>
                    <p class="card-text">Celliers </p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Valeur total des bouteilles -->
          <div class="col-md-4">
            <div class="card mb-2">
              <div class="row no-gutters">
                <div class="col-md-4">
                 <i class="fas fa-dollar-sign fa-5x"></i>
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h1 class="card-title">
                       <?php 
                        if(isset($valeurBouteilleTous))
                          // Appliquer un format de chiffre à deux décimales après la virgule
                          echo number_format($valeurBouteilleTous['valeurBouteilleTous'], 2, '.', '') . '$';
                        ?>
                    </h1>
                    <p class="card-text">Valeur des bouteilles </p>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Nombre de nouvels usagers -->
          <div class="col-md-4">
            <div class="card mb-2">
              <div class="row no-gutters">
                <div class="col-md-4">
                 <i class="fas fa-user-clock fa-5x"></i>
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h1 class="card-title">
                       <?php 
                        // On ouvre le fichier texte en mode écriture
                        $monfichier = fopen('compteur.txt', 'r+');
   
                        $nombreNouvelUsager = fgets($monfichier); // On lit la première ligne (nombre de nouvels usagers)
                        echo  $nombreNouvelUsager;
                       
                        fclose($monfichier);
                      ?>
                    </h1>
                    <p class="card-text">Nouvels usagers </p>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div> <!--fin du row-->

    <!-- Le nombre de celliers par usagers -->
        <div class="row tm-content-row">
          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
              <h2 class="tm-block-title text-dark">Choisir une date</h2>
              <select class="form-control custom-select" id="date" name="date">
              <?php
               foreach ($dates as $key => $date) { ?>
                <option value="<?php echo $date['id'] ?>"><?php echo $date['date'] ?></option>
              <?php } ?>
              </select>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Nombre de bouteilles bu</th>
                    <th scope="col">Nombre de bouteilles ajoutées</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td scope="row" id="nombreBu"></td>
                    <td scope="row" id="nombreAjoute"></td>
                  </tr>
                </tbody>
              </table>
            </div> <!--Fin du tableau-->
          </div>
        </div>
      
  <!-- Le nombre de celliers par usagers -->
  <div class="row tm-content-row">
    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
      <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
        <h2 class="tm-block-title text-dark">Le nombre de celliers par usagers</h2>
        <table class="table table-striped tm-notification-items">
          <thead>
            <tr>
              <th scope="col">Nom et Prénom</th>
              <th scope="col">Nombre de celliers</th>
            </tr>
          </thead>

          <tbody>
            
              <?php 
              // Parcourir le tableau data
              foreach ($nombreCelliersParUsagers as $cle => $cellier) {
              ?>
                <tr>
                <th scope="row">
              <?php 
                  echo $cellier['nom']. ' '. $cellier['nom'];
              ?>
                </th>
                <td scope="row">
              <?php 
                  echo $cellier['nombreCelliersParUsager'];
              ?>
                </td>
                </tr>
              <?php 
              }
              ?>
            
          </tbody>
        </table>
      </div> <!--Fin du tableau-->
    </div>

     <!-- Le nombre de bouteilles par cellier et leur valeur -->
    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
      <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
        <h2 class="tm-block-title text-dark">Le nombre de bouteilles par cellier et leurs valeurs</h2>
        <div class="row">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Nom du cellier</th>
                <th scope="col">Nombre de bouteilles</th>
                <th scope="col">Valeur</th>
              </tr>
            </thead>

            <tbody>
              
                <?php 
                // Parcourir le tableau data
                foreach ($nombreBouteillesParCellier as $cle => $bouteilles) {
                  ?>
                  <tr>
                  <th scope="row">
                    <?php 
                      echo $bouteilles['nom'];
                    ?>
                  </th>
                  <td scope="row">
                    <?php 
                      echo $bouteilles['nombreBouteillesParCellier'];
                    ?>
                  </td>
                  <td scope="row">
                    <?php 
                      if ($bouteilles['valeurBouteillesParCellier']==null) {
                        echo "0 $";
                      }else{
                        // Appliquer un format de chiffre à deux décimales après la virgule
                        echo number_format($bouteilles['valeurBouteillesParCellier'], 2, '.', '') . '$';
                      }
                    ?>
                  </td>
                  </tr>
                  <?php 
                }
                  ?>
              
            </tbody>
          </table>
        </div> <!--Fin du tableau-->
      </div>
    </div>

 
  </div>
  
  <!-- Le nombre de bouteilles par usager et leur valeur -->
  <div class="row tm-content-row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 tm-block-col">
      <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
      
        <h2 class="tm-block-title text-dark">Le nombre de bouteilles par usager et leurs valeurs</h2>
        <div class="row">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Nom et prénom</th>
                <th scope="col">Nombre de bouteilles</th>
                <th scope="col">Valeur</th>

              </tr>
            </thead>

            <tbody>
              
                <?php 
                // Parcourir le tableau data
                foreach ($nombreBouteillesParUsager as $cle => $bouteilles) {
                  ?>
                  <tr>
                  <th scope="row">
                    <?php 
                      echo $bouteilles['nom'].' '.$bouteilles['prenom'];
                    ?>
                  </th>
                  <td scope="row">
                    <?php 
                      echo $bouteilles['nombreBouteillesParUsager'];
                    ?>
                  </td>
                  <td scope="row">
                    <?php 
                      if ($bouteilles['valeurBouteillesParUsager']==null) {
                        echo "0 $";
                      }else{
                        // Appliquer un format de chiffre à deux décimales après la virgule
                        echo number_format($bouteilles['valeurBouteillesParUsager'], 2, '.', '') . '$';
                       
                      }
                    ?>
                  </td>
                  </tr>
                  <?php 
                }
                  ?>
              
            </tbody>
          </table>
        </div> <!--Fin du tableau-->
      </div>
    </div>
  </div>
  
         
  </div>


  <script type="text/javascript">
    //Au chargement de la page : on active le menu 'Statistiques' et on désactive les autres
    window.addEventListener('load', function() {
      document.getElementById("statistiques").classList.add("active");
      document.getElementById("monCompte").classList.remove("active");
      document.getElementById("celliers").classList.remove("active");
    });
  </script>






