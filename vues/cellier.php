<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-danger border-right col-md-3" id="sidebar-wrapper">
      <div class="sidebar-heading">Mes celliers :</div>
      <div class="list-group list-group-flush">
        <!-- Parcourir la liste des cellier en récupérant le nom et l'id du cellier -->
        <?php foreach ($dat['cellier'] as $key => $cellier) { ?>
            <div class="options btn-group" data-id="<?php echo $cellier['id'] ?>">
                <button class='btnCellier btn btn-sm btn-outline-light'><?php echo $cellier['nom'] ?></button>
            </div>
        
        <?php } ?>
        
      </div>
    </div>
    <!-- /#sidebar-wrapper -->
    <div id="page-content-wrapper">
        <div class="album py-5 ">
            <div class="cellier container">
                <div class="row">
                <?php
                    // Tester si le cellier n'est pas vide
                    if (count($data) !=0) {
                    
                    // Parcourir le tableau data
                    foreach ($data as $cle => $bouteille) {
                     
                ?>
                        <div class="col-md-4 float-left">
                            <div class="card shadow-sm">
                                <div class="bouteille" data-quantite="">
                                    <div class="img">
                                        
                                        <img src="https:<?php echo $bouteille['image'] ?>">
                                    </div>
                                    <ul class="list-unstyled mt-3 mb-4">
                                        <li class="nom text-danger font-weight-bold"><?php echo $bouteille['nom'] ?></li>
                                        <div class="description text-left card-body">
                                            
                                            <!-- Ajouter l'attribut id en lui assignant l'id de la bouteille -->
                                            <li><small class="quantite text-muted" id="<?php echo 'item'.$bouteille['id_bouteille_cellier'] ?>">Quantité : <?php echo $bouteille['quantite'] ?></small></li>
                                            <li><small class="pays text-muted">Pays : <?php echo $bouteille['pays'] ?></small></li>
                                            <li><small class="type text-muted">Type : <?php echo $bouteille['type'] ?></small></li>
                                            <li><small class="millesime text-muted">Millesime : <?php echo $bouteille['millesime'] ?></small></li>
                                            <li><small><a href="<?php echo $bouteille['url_saq'] ?>">Voir SAQ</a></small></li>
                                            
                                        </div>
                                    </ul>
                                </div>
                                <!-- Footer du card -->
                                <div class="card-footer">
                                                                          
                                    <div class="d-flex">
                                        <div class="options btn-group" data-id="<?php echo $bouteille['id_bouteille_cellier'] ?>">
                                          
                                            <button class="btnModifier btn btn-sm btn-outline-danger">Modifier</button>
                                            <button class='btnAjouter btn btn-sm btn-outline-danger'>Ajouter</button>
                                            <button class='btnBoire btn btn-sm btn-outline-danger'>Boire</button>
                                        </div>
                                    
                                    </div>
                                        
                                </div>
                            </div>

                        </div>
                       
                    <?php
                    } //Fin du foreach
                }
                // Sinon on affiche un message
                else{
                    echo "Votre Cellier est vide !";
                }

                ?>  
                </div>
            </div>
        </div>
    </div>
</div>



