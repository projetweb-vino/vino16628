<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v3.2"></script>
<div class="container-fluid">
<div class="row">
    <!-- Sidebar -->
    <div class="col-md-3 col-sm-4 sidebar1 bg-danger">
        <br>
        <div class="left-navigation">
            <button class="collapsible">Mes celliers</button>
            <div class="content">
                <ul class="list-group list-group-flush">

            <?php foreach ($dat['cellier'] as $key => $cellier) { 
                $id =$cellier['id'];
            ?>
                <li class="list-group-item"><a id="<?php echo $cellier['id'] ?>" href="<?php echo '?requete=bouteilleParCellier&id='.$id.'#cellier' ?>"><?php echo $cellier['nom'] ?></a></li>
            <?php } ?>
            </ul>
            </div>
            <?php 
            // L'importation est reservée à l'Administrateur
            if ($_SESSION['admin'] =='oui') {
                
            ?>
            <button class="collapsible">Importation</button>
            <div class="content">
                <br>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="number" name="nombre" id="debut" class="form-control"  placeholder="Début">
                        
                    </div>
                    <div class="form-group col-md-6">
                        <input type="number" name="debut" id="nombre" class="form-control"  placeholder="Nombre">
                    </div>
                                  
                </div>
                <div class="form-row">
                    <div class="option form-group col-md-2">
                        <button id="btnImport" class="btn btn-danger">Importer</button>
                    </div>
                </div>
             
            </div>
            <?php 
            }
            ?>
   
        </div>
    </div>
    <!-- /#sidebar-wrapper -->
    <div class="col-md-9 main-content" id="cellier">
                <?php
                    // Tester si le cellier n'est pas vide
                    if (count($data) !=0) {
                    
                    // Parcourir le tableau data
                    foreach ($data as $cle => $bouteille) {
                 
                ?>
                        <div class="col-md-4 float-left ">
                            <div class="card shadow-sm">
                                <div class="bouteille" data-quantite="" >
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

                                             <div class="d-flex">
                                        <div class="options btn-group" data-id="<?php echo $bouteille['id_bouteille_cellier'] ?>">
                                          
                                            <button class="btnModifier btn btn-sm btn-outline-danger">Modifier</button>
                                            <button class='btnAjouter btn btn-sm btn-outline-danger'>Ajouter</button>
                                            <button class='btnBoire btn btn-sm btn-outline-danger'>Boire</button>

                                        </div>
                                    
                                    </div>
                                            
                                        </div>
                                    </ul>
                                </div>
                                <!-- Footer du card -->
                                <div class="card-footer">
                                   
                                    <div class="icon-bar" data-href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" data-layout="button" data-size="small" data-mobile-iframe="true"><a target="_blank" href="<?php echo 'https://www.facebook.com/sharer/sharer.php?u='.$bouteille['url_saq'] ?>" class="fb-xfbml-parse-ignore facebook"><i class="fab fa-facebook-f"></i></a></div>
                                   
                                    <div class="icon-bar"  data-layout="button" data-size="small">
                                    <a target="_blank" href="<?php echo 'https://twitter.com/share?ref_src='.$bouteille['url_saq'] ?>" class="fb-xfbml-parse-ignore twitter" data-show-count="false"><i class="fab fa-twitter"></i></a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script></div>

                                  <div class="icon-bar"  data-layout="button" data-size="small">
                                  <a class="fb-xfbml-parse-ignore google" href="<?php echo 'https://plus.google.com/share?url='.$bouteille['url_saq'] ?>" onclick="javascript:window.open(this.href,
                                  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fab fa-google-plus-g"></i></a>

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



