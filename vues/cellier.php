<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v3.2"></script>
<div class="container-fluid">
<div class="row">
    <!-- Sidebar -->
    <div class="col-md-3 col-sm-4 sidebar1 bg-dark">
        <br>
        <div class="left-navigation"> 
            <button class="collapsible bg-dark" ><i class="fas fa-wine-bottle"></i> Mes celliers</button>
            <div class="content">
                <br>
                <!-- Formulaire d'ajout d'un cellier -->
                <form method="GET">
                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <input type="text" name="nomCellier" class="form-control" placeholder="Nom du cellier" required>
                            <input type="hidden" name="requete" value="ajouterCellier">
                        </div>
                        <div class="form-group col-md-2">
                            <button type="submit" class="btn btn-outline-danger" title="Ajouter un cellier"><i class="fas fa-plus"></i></button>
                        </div>

                        <br>
                        <?php 
                        if(isset($messageErreur))
                            echo "<p>$messageErreur</p>";
                        ?>
                        
                    </div>
                </form>

                <ul class="list-group list-group-flush">

                <span  class="bg-dark text-light">Liste des celliers :</span>

            <?php foreach ($dat['cellier'] as $key => $cellier) { 
                $cid =$cellier['id'];
            ?>

                <li class="list-group-item"><a class="lienCellier" data-id='<?php echo $cellier['id'] ?>' id="<?php echo $cellier['id'] ?>" href="<?php echo '?requete=bouteilleParCellier&id='.$cid.'#cellier' ?>"><?php echo $cellier['nom'] ?></a></li>
            <?php } ?>
            </ul>
            </div>
            <?php 
            // L'importation est reservée à l'Administrateur
            if ($_SESSION['admin'] =='oui') {
                
            ?>
            <button class="collapsible bg-dark"><i class="fas fa-file-import"></i> Importation</button>
            <div class="content ">
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
                        <button id="btnImport" class="btn btn-outline-danger">Importer</button>
                    </div>
                </div>
             
            </div>
            <?php 
            }
            ?>
            <button class="collapsible bg-dark"><i class="fas fa-sort-amount-up"></i> Triage</button>
            <div class="content ">
                <br>
                <form method="post" novalidate="novalidate">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <select class="form-control search-slt" id="exampleFormControlSelect1" name="filter[filtre]">
                                <option value = "nom">nom </option>
                                <option value = "pays">pays </option>
                                <option value = "millesime">Millesime </option>
                                <option value = "quantite">Quantite </option>
                                <option value = "prix_saq">Prix </option>
                                <option value = "date_achat">Date d'achat </option>
                                <option value = "type">Type </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="option form-group col-md-2">
                            <input type="submit"  class="btn btn-danger wrn-btn" value="Appliquer">
                            <input type="hidden" name="requete" value="bouteilleParCellier">
                            <input type="hidden" value="<?php echo $id; ?>" name="id" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /#sidebar-wrapper -->
    <div class="col-md-9 main-content" id="cellier">
        
        <h1 class="border border-secondary bg-dark text-light"><?php 
        if (isset($dat['nomCellier'])) {
            # code...
        
        echo $dat['nomCellier']['nomCellier'] ;
        }
        ?></h1>
        <!-- <p id="monCellier"><?php echo $dat['nomCellier']['nomCellier'] ?></p> -->
         <form style="width:100%" class="form-inline">
                <input type="hidden" value="bouteilleParCellier" name="requete" />
                <input type="hidden" value="<?php echo $id; ?>" name="id" />
                <div class="form-group">
                   <label>Year</label> 
                   <select name="filter[year]" class="form-control"><option value="">Any</option>
                   <?php for($i = date('Y'); $i >= 1930; $i--) echo '<option '.(isset($filter['year']) && $filter['year'] == $i ? 'selected' : '').' value="'.$i.'">'.$i.'</option>'; ?>
                    </select>
                </div>  
                <div class="form-group">
                    <label>Nom</label> 
                    <input name="filter[name]" class="form-control" type="text" value="<?php echo isset($filter['name']) ? $filter['name'] : ''; ?>">
                </div> 
                <div class="form-group">
                    <label>Qty</label> 
                    <input name="filter[qty-from]" class="form-control" type="number" min="0" value="<?php echo isset($filter['qty-from']) ? $filter['qty-from'] : '0'; ?>">
                    -
                    <input name="filter[qty-till]" class="form-control" type="number" min="0" value="<?php echo isset($filter['qty-till']) ? $filter['qty-till'] : '100'; ?>">
                </div> 
                <div class="form-group">
                    <label>Type</label> 
                    <select name="filter[type]" class="form-control">
                        <option value="">Any</option>
                        <option value="1" <?php echo isset($filter['type']) && $filter['type'] == 1 ? 'selected' : ''; ?>>Red</option>
                        <option value="2" <?php echo isset($filter['type']) && $filter['type'] == 2 ? 'selected' : ''; ?>>White</option>   
                    </select>
                </div> 
                <div class="form-group">
                    <label>Pays</label> 
                    <select name="filter[country]" class="form-control"><option value="">Any</option>
                    <?php foreach($pays as $c) echo '<option '.(isset($filter['country']) && $filter['country'] == $c ? 'selected' : '').' value="'.$c.'">'.$c.'</option>'; ?>
                    </select>
                </div> 
                <input type="submit" value="Filter" class="btn btn-primary">
            </form>
            <form method="post" novalidate="novalidate">
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-12 float-lg-right p-0">
                                <span class="label label-success">Tri par</span>
                            </div>    
                            <div class="col-lg-3 col-md-3 col-sm-12 float-lg-right p-0">
                                <select class="form-control search-slt" id="exampleFormControlSelect1" name="filter[filtre]">
                                    <option value = "nom">nom </option>
                                    <option value = "pays">pays </option>
                                    <option value = "millesime">Millesime </option>
                                    <option value = "quantite">Quantite </option>
                                    <option value = "prix_saq">Prix </option>
                                    <option value = "date_achat">Date d'achat </option>
                                    <option value = "type">Type </option>
                                </select>
                            </div>
                            <div class="col-lg-2 col-md-2 float-lg-right col-sm-12 p-0">
                                <input type="submit"  class="btn btn-danger wrn-btn" value="Appliquer">
                                <input type="hidden" name="requete" value="bouteilleParCellier">
                                <input type="hidden" value="<?php echo $id; ?>" name="id" />
                            </div>
                        </div>
                    </div>
                </div>
            </form>
                <?php
                    
                    if (!empty($data)) {
                    
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
                                            <button class='btnRetirer btn btn-sm btn-outline-danger' title="Retirer cette bouteille"><i class="fas fa-trash-alt"></i></button>
    
                                        </div>
    
                                    </div>
                                            
                                        </div>
                                    </ul>
                                </div>
                                <!-- Footer du card -->
                                <div class="card-footer">
                                   
                                    <!-- Bouton Facebook -->
                                    <div class="icon-bar" data-href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" data-layout="button" data-size="small" data-mobile-iframe="true"><a target="_blank" href="<?php echo 'https://www.facebook.com/sharer/sharer.php?u='.$bouteille['url_saq'] ?>" class="fb-xfbml-parse-ignore facebook"><i class="fab fa-facebook-f"></i></a></div>
                                    
                                    <!-- Bouton Twitter -->
                                    <div class="icon-bar"  data-layout="button" data-size="small">
                                    <a target="_blank" href="<?php echo 'https://twitter.com/share?ref_src='.$bouteille['url_saq'] ?>" class="fb-xfbml-parse-ignore twitter" data-show-count="false"><i class="fab fa-twitter"></i></a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script></div>
                                    
                                    <!-- Bouton LinkedIn -->
                                    <div class="icon-bar"  data-layout="button" data-size="small">
                                        <a class="fb-xfbml-parse-ignore linkedin" href="<?php echo 'https://www.linkedin.com/shareArticle?mini=true&summary=saq&title=f1&url='.$bouteille['url_saq'] ?>" onclick="javascript:window.open(this.href,
                                          '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fab fa-linkedin-in"></i></a>
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



