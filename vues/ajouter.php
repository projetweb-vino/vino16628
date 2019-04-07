<div class="ajouter container-fluid">
    <div class="tabscss">
    <div class="tab-2">
        <label for="tab2-1">Ajouter une bouteille non listée</label>
        <?php
        // condition pour selectioner le formulaire il affiche listées si en travail avec sinon l'autre formulaire non listées
        if (!isset($champs['id_formulaire'])||(isset($champs['id_formulaire'])&& isset($champs['id_formulaire'])== 1)){ ?>
            <input id="tab2-1" name="tabs-two" type="radio" checked="checked">
        <?php }else{?>
            <input id="tab2-1" name="tabs-two" type="radio" >
        <?php }?>
         <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="row justify-content-center">
                            <div class="imageupload form-group col-md-3 wrap-input100 validate26 validate-input">
                                <span class="label-input100">images</span>
                                <input  type="file" class ="inputvalue" id="image_uploads" name="image_ch" accept=".jpg, .jpeg, .png" multiple>
                                <span class="focus-input100"></span>
                                <!-- Afficher un message d'erreur s'il y'a lieu -->
                                <?php  if(isset($message['erreur_image'])) { ?>
                                    <small class="text-warning invali"><?php echo $message['erreur_image']?></small>
                                <?php 
                                    } 
                                ?>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-4 imagesuprimer" >
                                <div id="imagecharger">
                                     <?php 
                                    // On affiche un message d'erreur si la bouteille existe déja
                                    if(isset($message['vide1'])){
                                    ?>
                                    <div class="alert alert-danger" role="alert">
                                      <?php 
                                        echo $message['vide1'];
                                      ?>
                                    </div>
                                    <?php 
                                    }
                                    ?> 
                                </div>
                            </div>
                        </div><br>       
                    
                        <div class="form-row justify-content-center">
                            <div class=" form-group col-md-3 wrap-input100 validate-input ">
                                <span class="label-input100 selec">Celliers :</span>
                                <select class="input100 sele" name="bouteille[cellier_id]">
                                <?php foreach ($data as $key => $cellier) { ?>
                                    <option value="<?php echo $cellier['id'] ?>"><?php echo $cellier['nom'];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                             <div id="nomchamp1" class=" form-group col-md-3 wrap-input100 validate1 validate-input" data-validate="Nom est invalide" >
                                <span class="label-input100">Nom</span>
                                <!-- apres la validation il retourne les valeurs envoyés   -->
                                <?php  if(isset($champs['nom'], $champs['id_formulaire']) && $champs['id_formulaire'] == 1) {?>
                                    <input class="input100" type="text" name="bouteille[nom]" id="nom1" value = "<?php echo $champs['nom']?>">
                                <?php 
                                    }else{
                                ?>
                                    <input class="input100" type="text" name="bouteille[nom]" id="nom1" >
                                <?php         
                                    } 
                                ?>
                                <span class="focus-input100" id="nomchamp"></span>
                                <!-- Afficher un message d'erreur s'il y'a lieu -->
                                <?php  if(isset($message['erreur_nom'])) { ?>
                                    <small class="text-warning invali"><?php echo $message['erreur_nom']?></small>
                                <?php 
                                    } 
                                ?>
                            </div>
                           <div class=" form-group col-md-3 wrap-input100 validate-input">
                                <span class="label-input100">Type</span>
                                <select class="input100 sele" name="bouteille[type_id]">
                                <?php foreach ($datas as $key => $type) { ?>
                                    <option value="<?php echo $type['id'] ?>"><?php echo $type['type'] ?></option>
                                    <?php } ?>
                                </select>
                            </div> 
                        </div>         
                        <div class="form-row justify-content-center">
                            <div class=" form-group col-md-3 wrap-input100 validate2 validate-input" data-validate="Millesime est invalide">
                                <span class="label-input100">Millesime</span>
                                 <!-- apres la validation il retourne les valeurs envoyés   -->
                                <?php  if(isset($champs['millesime'], $champs['id_formulaire']) && $champs['id_formulaire'] == 1) {?>
                                    <input class="input100" type="text" name="bouteille[millesime]" id="millesime1" value = "<?php echo $champs['millesime']?>">
                                <?php 
                                    }else{
                                ?>
                                    <input class="input100" type="text" name="bouteille[millesime]" id="millesime1" >
                                <?php         
                                    } 
                                ?>
                                <span class="focus-input100"></span>
                                <!-- Afficher un message d'erreur s'il y'a lieu -->
                                <?php  if(isset($message['erreur_millesime'])) { ?>
                                    <small class="text-warning invali"><?php echo $message['erreur_millesime']?></small>
                                <?php 
                                    } 
                                ?>
                            </div>    
                            <div class=" form-group col-md-3 wrap-input100 validate3 validate-input " data-validate="Quantiteest invalide">
                                <span class="label-input100">Quantité</span>
                                 <!-- apres la validation il retourne les valeurs envoyés   -->
                                <?php  if(isset($champs['quantite'], $champs['id_formulaire']) && $champs['id_formulaire'] == 1) {?>
                                    <input class="input100" type="text" name="bouteille[quantite]" id="quantite1" value = "<?php echo $champs['quantite']?>">
                                <?php 
                                    }else{
                                ?>
                                    <input class="input100" type="text" name="bouteille[quantite]" id="quantite1" >
                                <?php         
                                    } 
                                ?>
                                <span class="focus-input100"></span>
                                <!-- Afficher un message d'erreur s'il y'a lieu -->
                                <?php  if(isset($message['erreur_quantite'])) { ?>
                                    <small class="text-warning invali"><?php echo $message['erreur_quantite']?></small>
                                <?php 
                                    } 
                                ?>
                            </div>
                            <div class=" form-group col-md-3 wrap-input100 validate4 validate-input" data-validate="Pays est invalide">
                                <span class="label-input100">Pays</span>
                                 <!-- apres la validation il retourne les valeurs envoyés   -->
                                <?php  if(isset($champs['pays'], $champs['id_formulaire']) && $champs['id_formulaire'] == 1) {?>
                                    <input class="input100" type="text" name="bouteille[pays]" id="pays1" value = "<?php echo $champs['pays']?>">
                                <?php 
                                    }else{
                                ?>
                                    <input class="input100" type="text" name="bouteille[pays]" id="pays1">
                                <?php         
                                    } 
                                ?>
                                <span class="focus-input100"></span>
                                <!-- Afficher un message d'erreur s'il y'a lieu -->
                                <?php  if(isset($message['erreur_pays'])) { ?>
                                    <small class="text-warning invali"><?php echo $message['erreur_pays']?></small>
                                <?php 
                                    } 
                                ?>
                            </div>
                        </div>
                         <div class="form-row justify-content-center">
                            <div class=" form-group col-md-3 wrap-input100 validate5 validate-input" data-validate="Prix est invalide">
                                <span class="label-input100">Prix</span>
                                 <!-- apres la validation il retourne les valeurs envoyés   -->
                                <?php  if(isset($champs['prix'], $champs['id_formulaire']) && $champs['id_formulaire'] == 1) {?>
                                    <input class="input100" type="text" name="bouteille[prix_saq]" id="prix1" value = "<?php echo $champs['prix']?>">
                                <?php 
                                    }else{
                                ?>
                                    <input class="input100" type="text" name="bouteille[prix_saq]" id="prix1">
                                <?php         
                                    } 
                                ?>
                                <span class="focus-input100"></span>
                                <!-- Afficher un message d'erreur s'il y'a lieu -->
                                <?php  if(isset($message['erreur_prix'])) { ?>
                                    <small class="text-warning invali"><?php echo $message['erreur_prix']?></small>
                                <?php 
                                    } 
                                ?>
                            </div>
                            <div class=" form-group col-md-3 wrap-input100 validate6 validate-input" data-validate="Notes est invalide">
                                <span class="label-input100">Notes</span>
                                 <!-- apres la validation il retourne les valeurs envoyés   -->
                                <?php  if(isset($champs['notes'], $champs['id_formulaire']) && $champs['id_formulaire'] == 1) {?>
                                    <input class="input100" type="text" name="bouteille[notes]" id="notes1" value = "<?php echo $champs['notes']?>">
                                <?php 
                                    }else{
                                ?>
                                    <input class="input100" type="text" name="bouteille[notes]" id="notes1">
                                <?php         
                                    } 
                                ?>
                                <span class="focus-input100"></span>
                                <!-- Afficher un message d'erreur s'il y'a lieu -->
                                <?php  if(isset($message['erreur_notes'])) { ?>
                                    <small class="text-warning invali"><?php echo $message['erreur_notes']?></small>
                                <?php 
                                    } 
                                ?>
                            </div>
                            <div class=" form-group col-md-3 wrap-input100 validate7 validate-input" data-validate="Format est invalide">
                                <span class="label-input100">Format</span>
                                 <!-- apres la validation il retourne les valeurs envoyés   -->
                                <?php  if(isset($champs['format'], $champs['id_formulaire']) && $champs['id_formulaire'] == 1) {?>
                                    <input class="input100" type="text" name="bouteille[format]" id="format1" value = "<?php echo $champs['format']?>">
                                <?php 
                                    }else{
                                ?>
                                    <input class="input100" type="text" name="bouteille[format]" id="format1">
                                <?php         
                                    } 
                                ?>
                                <span class="focus-input100"></span>
                                <!-- Afficher un message d'erreur s'il y'a lieu -->
                                <?php  if(isset($message['erreur_format'])) { ?>
                                    <small class="text-warning invali"><?php echo $message['erreur_format']?></small>
                                <?php 
                                    } 
                                ?>
                            </div>
                        </div>
                        <div class="form-row justify-content-center">
                            <div class=" form-group col-md-3 wrap-input100 validate8 validate-input">
                                <span class="label-input100">Date d'achat</span>
                                 <!-- apres la validation il retourne les valeurs envoyés   -->
                                <?php  if(isset($champs['date_achat'], $champs['id_formulaire']) && $champs['id_formulaire'] == 1) {?>
                                    <input class="input100 sele" type="date" name="bouteille[date_achat]" id="date_achat1" value = "<?php echo $champs['date_achat']?>">
                                <?php 
                                    }else{
                                ?>
                                    <input class="input100 sele" type="date" name="bouteille[date_achat]" id="date_achat1">
                                <?php         
                                    } 
                                ?>
                                <span class="focus-input100"></span>
                                <!-- Afficher un message d'erreur s'il y'a lieu -->
                                <?php  if(isset($message['erreur_date_achat'])) { ?>
                                    <small class="text-warning invali"><?php echo $message['erreur_date_achat']?></small>
                                <?php 
                                    } 
                                ?>
                            </div>
                            <div class=" form-group col-md-3 wrap-input100 validate9 validate-input">
                                <!-- apres la validation il retourne les valeurs envoyés   -->
                                <span class="label-input100">Garder jusqu'à</span>
                                <?php  if(isset($champs['garde_jusqua'], $champs['id_formulaire']) && $champs['id_formulaire'] == 1) {?>
                                    <input class="input100 sele" type="date" name="bouteille[garde_jusqua]" id="garde_jusqua1" value = "<?php echo $champs['garde_jusqua']?>">
                                <?php 
                                    }else{
                                ?>
                                    <input class="input100 sele" type="date" name="bouteille[garde_jusqua]" id="garde_jusqua1">
                                <?php         
                                    } 
                                ?>
                                <span class="focus-input100"></span>
                                <!-- Afficher un message d'erreur s'il y'a lieu -->
                                <?php  if(isset($message['erreur_garde_jusqua'])) { ?>
                                    <small class="text-warning invali"><?php echo $message['erreur_garde_jusqua']?></small>
                                <?php 
                                    } 
                                ?>
                                </div>                
                            
                          </div>
                         <div class="form-row justify-content-center">
                             <div class=" form-group col-md-9 wrap-input100 validate10 validate-input">
                                <!-- apres la validation il retourne les valeurs envoyés   -->
                                <span class="label-input100">Description</span>
                                <?php  if(isset($champs['description'], $champs['id_formulaire']) && $champs['id_formulaire'] == 1) {?>
                                    <input class="input100 sele" type="text" name="bouteille[description]" id="description1" value = "<?php echo $champs['description']?>">
                                <?php 
                                    }else{
                                ?>
                                    <input class="input100 sele" type="text" name="bouteille[description]" id="description1">
                                <?php         
                                    } 
                                ?>
                                <span class="focus-input100"></span>
                                <!-- Afficher un message d'erreur s'il y'a lieu -->
                                <?php  if(isset($message['erreur_description'])) { ?>
                                    <small class="text-warning invali"><?php echo $message['erreur_description']?></small>
                                <?php 
                                    } 
                                ?>
                            </div>
                        </div>    
                        <div class="form-row justify-content-center">
                            <div class="form-group col-md-3">
                                <input type="hidden" class="form-control" id="code_saq1" name="bouteille[code_saq]">
                            </div>
                            <div class="form-group col-md-3">
                                <input type="hidden" class="form-control" id="url_saq1"  name="bouteille[url_saq]">
                            </div>

                            <div class="form-group col-md-3">
                                <input type="hidden" class="form-control" id="url_img1"  name="bouteille[url_img]">
                            </div>
                        </div>
                        <div class="form-row justify-content-center">
                            <div class="form-row ajou col-md-4">
                                <input type="hidden" name="requete" value="ajouterBouteilleNonListe">
                                <input type="hidden" name="bouteille[id_formulaire]" value="1">
                                <button type="submit"  class=" btn btn-primary ajouform">Ajouter</button>
                            </div>
                        </div>    
                    </form>
                </div>
                 
            </div>
        </div>    
    </div>
 <div class="tab-2">
    <label for="tab2-2">Ajouter une bouteille listée</label>
        <?php 
        if (isset($champs['id_formulaire']) && $champs['id_formulaire'] == 2) { ?>
            <input id="tab2-2" name="tabs-two" type="radio" checked="checked">
        <?php }else{?>
            <input id="tab2-2" name="tabs-two" type="radio">
        <?php }?>
    
    <div class="container-fluid">
                 
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <!-- Recherche-->
                    <div class="form-row justify-content-center">
                        <div class=" form-group col-md-4 ">
                             <label class="icon_form"><i class="fas fa-search"></i></label>
                             <input type="text" name="recherche" class="recherchesaq input100" placeholder="Rechercher une Bouteille" autocomplete="off">
                             <span class="focus-input100" id="reche"></span>
                        </div>
                    </div>    
                    <div class="form-row justify-content-center">
                        <div class=" form-group col-md-4">
                            <ul class="listeBouteilles"></ul>
                        </div>    
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="col-md-4 imagesuprimer" >
                        <div id="imagelistee">
                            <img  height="204px" width="200px" >
                            <?php 
                            // On affiche un message d'erreur si la bouteille existe déja
                            if(isset($message['vide2'])){
                            ?>
                            <div class="alert alert-danger" role="alert">
                              <?php 
                                echo $message['vide2'];
                              ?>
                            </div>
                            <?php 
                            }
                            ?> 
                        </div>
                    </div>    
                </div></br>    
                    <form method="GET">
                        <div class="form-row justify-content-center">
                            <div class=" form-group col-md-3 wrap-input100 validate-input ">
                                <span class="label-input100 selec">Celliers :</span>
                                <select class="input100 sele" name="bouteille[cellier_id]">
                                <?php foreach ($data as $key => $cellier) { ?>
                                    <option value="<?php echo $cellier['id'] ?>"><?php echo $cellier['nom'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                             <div id="nomchamp1" class=" form-group col-md-3 wrap-input100 validate13 validate-input" data-validate="Nom est invalide" >
                                <!-- apres la validation il retourne les valeurs envoyés   -->
                                <span class="label-input100">Nom</span>
                                <?php  if(isset($champs['nom'], $champs['id_formulaire']) && $champs['id_formulaire'] == 2) {?>
                                    <input class="input100" type="text" name="bouteille[nom]" id="nom" value = "<?php echo $champs['nom']?>">

                                <?php 
                                    }else{
                                ?>
                                    <input class="input100" type="text" name="bouteille[nom]" id="nom" >
                                <?php         
                                    } 
                                ?>
                                <span class="focus-input100" id="nomchamp"></span>
                                <!-- Afficher un message d'erreur s'il y'a lieu -->
                                <?php  if(isset($message['erreur_nom2'])) { ?>
                                    <small class="text-warning invali"><?php echo $message['erreur_nom2']?></small>
                                <?php 
                                    } 
                                ?>
                            </div>
                           <div class=" form-group col-md-3 wrap-input100 validate-input">
                                <span class="label-input100">Type</span>
                                <select class="input100 sele" name="bouteille[type_id]">
                                <?php foreach ($datas as $key => $type) { ?>
                                    <option value="<?php echo $type['id'] ?>"><?php echo $type['type'] ?></option>
                                    <?php } ?>
                                </select>
                            </div> 
                        </div>         
                        <div class="form-row justify-content-center">
                            <div class=" form-group col-md-3 wrap-input100 validate14 validate-input" data-validate="Millesime est invalide">
                                <!-- apres la validation il retourne les valeurs envoyés   -->
                                <span class="label-input100">Millesime</span>
                                <?php  if(isset($champs['millesime'], $champs['id_formulaire']) && $champs['id_formulaire'] == 2) {?>
                                    <input class="input100" type="text" name="bouteille[millesime]" id="millesime" value = "<?php echo $champs['millesime']?>">
                                <?php 
                                    }else{
                                ?>
                                    <input class="input100" type="text" name="bouteille[millesime]" id="millesime">
                                <?php         
                                    } 
                                ?>
                                <span class="focus-input100"></span>
                                <!-- Afficher un message d'erreur s'il y'a lieu -->
                                <?php  if(isset($message['erreur_millesime2'])) { ?>
                                    <small class="text-warning invali"><?php echo $message['erreur_millesime2']?></small>
                                <?php 
                                    } 
                                ?>
                            </div>    
                            <div class=" form-group col-md-3 wrap-input100 validate15 validate-input " data-validate="Quantite est invalide">
                                <!-- apres la validation il retourne les valeurs envoyés   -->
                                <span class="label-input100">Quantité</span>
                                <?php  if(isset($champs['quantite'], $champs['id_formulaire']) && $champs['id_formulaire'] == 2) {?>
                                    <input class="input100" type="text" name="bouteille[quantite]" id="quantite" value = "<?php echo $champs['quantite']?>">
                                <?php 
                                    }else{
                                ?>
                                    <input class="input100" type="text" name="bouteille[quantite]" id="quantite" >
                                <?php         
                                    } 
                                ?>
                                <span class="focus-input100"></span>
                                <!-- Afficher un message d'erreur s'il y'a lieu -->
                                <?php  if(isset($message['erreur_quantite2'])) { ?>
                                    <small class="text-warning invali"><?php echo $message['erreur_quantite2']?></small>
                                <?php 
                                    } 
                                ?>
                            </div>
                            <div class=" form-group col-md-3 wrap-input100 validate16 validate-input" data-validate="Pays est invalide">
                                <!-- apres la validation il retourne les valeurs envoyés   -->
                                <span class="label-input100">Pays</span>
                                <?php  if(isset($champs['pays'], $champs['id_formulaire']) && $champs['id_formulaire'] == 2) {?>
                                    <input class="input100" type="text" name="bouteille[pays]" id="pays" value = "<?php echo $champs['pays']?>">
                                <?php 
                                    }else{
                                ?>
                                    <input class="input100" type="text" name="bouteille[pays]" id="pays">
                                <?php         
                                    } 
                                ?>
                                <span class="focus-input100"></span>
                                <!-- Afficher un message d'erreur s'il y'a lieu -->
                                <?php  if(isset($message['erreur_pays2'])) { ?>
                                    <small class="text-warning invali"><?php echo $message['erreur_pays2']?></small>
                                <?php 
                                    } 
                                ?>
                            </div>
                        </div>
                        <div class="form-row justify-content-center">
                            <div class=" form-group col-md-3 wrap-input100 validate17 validate-input" data-validate="Prix est invalide">
                                <!-- apres la validation il retourne les valeurs envoyés   -->
                                <span class="label-input100">Prix</span>
                                <?php  if(isset($champs['prix'], $champs['id_formulaire']) && $champs['id_formulaire'] == 2) {?>
                                    <input class="input100" type="text" name="bouteille[prix_saq]" id="prix" value = "<?php echo $champs['prix']?>">
                                <?php 
                                    }else{
                                ?>
                                    <input class="input100" type="text" name="bouteille[prix_saq]" id="prix" >
                                <?php         
                                    } 
                                ?>
                                <span class="focus-input100"></span>
                                <!-- Afficher un message d'erreur s'il y'a lieu -->
                                <?php  if(isset($message['erreur_prix2'])) { ?>
                                    <small class="text-warning invali"><?php echo $message['erreur_prix2']?></small>
                                <?php 
                                    } 
                                ?>
                            </div>
                            <div class=" form-group col-md-3 wrap-input100 validate18 validate-input" data-validate="Notes est invalide">
                                <!-- apres la validation il retourne les valeurs envoyés   -->
                                <span class="label-input100">Notes</span>
                                <?php  if(isset($champs['notes'], $champs['id_formulaire']) && $champs['id_formulaire'] == 2) {?>
                                    <input class="input100" type="text" name="bouteille[notes]" id="notes" value = "<?php echo $champs['notes']?>">
                                <?php 
                                    }else{
                                ?>
                                    <input class="input100" type="text" name="bouteille[notes]" id="notes" >
                                <?php         
                                    } 
                                ?>
                                <span class="focus-input100"></span>
                                <!-- Afficher un message d'erreur s'il y'a lieu -->
                                <?php  if(isset($message['erreur_notes2'])) { ?>
                                    <small class="text-warning invali"><?php echo $message['erreur_notes2']?></small>
                                <?php 
                                    } 
                                ?>
                            </div>
                            <div class=" form-group col-md-3 wrap-input100 validate19 validate-input" data-validate="Format est invalide">
                                <!-- apres la validation il retourne les valeurs envoyés   -->
                                <span class="label-input100">Format</span>
                                <?php  if(isset($champs['format'], $champs['id_formulaire']) && $champs['id_formulaire'] == 2) {?>
                                    <input class="input100" type="text" name="bouteille[format]" id="format" value = "<?php echo $champs['format']?>">
                                <?php 
                                    }else{
                                ?>
                                    <input class="input100" type="text" name="bouteille[format]" id="format" >
                                <?php         
                                    } 
                                ?>
                                <span class="focus-input100"></span>
                                <!-- Afficher un message d'erreur s'il y'a lieu -->
                                <?php  if(isset($message['erreur_format2'])) { ?>
                                    <small class="text-warning invali"><?php echo $message['erreur_format2']?></small>
                                <?php 
                                    } 
                                ?>
                            </div>
                        </div>
                        <div class="form-row justify-content-center">
                             <div class=" form-group col-md-3 wrap-input100 validate20 validate-input">
                                <!-- apres la validation il retourne les valeurs envoyés   -->
                                <span class="label-input100">Date d'achat</span>
                                <?php  if(isset($champs['date_achat'], $champs['id_formulaire']) && $champs['id_formulaire'] == 2) {?>
                                    <input class="input100 sele" type="date" name="bouteille[date_achat]" id="date_achat" value = "<?php echo $champs['date_achat']?>">
                                <?php 
                                    }else{
                                ?>
                                    <input class="input100 sele" type="date" name="bouteille[date_achat]" id="date_achat" >
                                <?php         
                                    } 
                                ?>
                                <span class="focus-input100"></span>
                                <!-- Afficher un message d'erreur s'il y'a lieu -->
                                <?php  if(isset($message['erreur_date_achat2'])) { ?>
                                    <small class="text-warning invali"><?php echo $message['erreur_date_achat2']?></small>
                                <?php 
                                    } 
                                ?>
                            </div>
                            <div class=" form-group col-md-3 wrap-input100 validate21 validate-input">
                                <!-- apres la validation il retourne les valeurs envoyés   -->
                                <span class="label-input100">Garder jusqu'à</span>
                                <?php  if(isset($champs['garde_jusqua'], $champs['id_formulaire']) && $champs['id_formulaire'] == 2) {?>
                                <input class="input100 sele" type="date" name="bouteille[garde_jusqua]" id="garde_jusqua" value = "<?php echo $champs['garde_jusqua']?>">
                                <?php 
                                    }else{
                                ?>
                                    <input class="input100 sele" type="date" name="bouteille[garde_jusqua]" id="garde_jusqua" >
                                <?php         
                                    } 
                                ?>
                                <span class="focus-input100"></span>
                                <!-- Afficher un message d'erreur s'il y'a lieu -->
                                <?php  if(isset($message['erreur_garde_jusqua2'])) { ?>
                                    <small class="text-warning invali"><?php echo $message['erreur_garde_jusqua2']?></small>
                                <?php 
                                    } 
                                ?>
                                </div>                
                                <div class="imageupload form-group col-md-3 wrap-input100 validate27 validate-input">
                                    <!-- apres la validation il retourne les valeurs envoyés   -->
                                    <span class="label-input100">images</span>

                                    <?php  if(isset($champs['image'], $champs['id_formulaire']) && $champs['id_formulaire'] == 2) {?>

                                        <input type="text" class="input100" id="image" name="bouteille[image]" value = "<?php echo $champs['image']?>">
                                    <?php 
                                        }else{
                                    ?>
                                        <input type="text" class="input100" id="image"  name="bouteille[image]">
                                    <?php         
                                        } 
                                    ?>
                                <span class="focus-input100"></span>
                                <!-- Afficher un message d'erreur s'il y'a lieu -->
                                <?php  if(isset($message['erreur_image2'])) { ?>
                                    <small class="text-warning invali"><?php echo $message['erreur_image2']?></small>
                                <?php 
                                    } 
                                ?>
                            </div>
                          </div>
                         <div class="form-row justify-content-center">
                             <div class=" form-group col-md-9 wrap-input100 validate22 validate-input">
                                <!-- apres la validation il retourne les valeurs envoyés   -->
                                <span class="label-input100">Description</span>
                                <?php  if(isset($champs['description'], $champs['id_formulaire']) && $champs['id_formulaire'] == 2) {?>
                                    <input class="input100 sele" type="text" name="bouteille[description]" id="description" value = "<?php echo $champs['description']?>">
                                <?php 
                                    }else{
                                ?>
                                    <input class="input100 sele" type="text" name="bouteille[description]" id="description" placeholder="Description...">
                                <?php         
                                    } 
                                ?>
                                <span class="focus-input100"></span>
                                <!-- Afficher un message d'erreur s'il y'a lieu -->
                                <?php  if(isset($message['erreur_description2'])) { ?>
                                    <small class="text-warning invali"><?php echo $message['erreur_description2']?></small>
                                <?php 
                                    } 
                                ?>
                            </div>
                        </div>    
                        <div class="form-row justify-content-center">
                            <div class="form-group col-md-3">
                                <input type="hidden" class="form-control" id="code_saq" placeholder="code saq" name="bouteille[code_saq]">
                            </div>
                            <div class="form-group col-md-3">
                                <input type="hidden" class="form-control" id="url_saq" placeholder="url saq" name="bouteille[url_saq]">
                            </div>

                            <div class="form-group col-md-3">
                                <input type="hidden" class="form-control" id="url_img" placeholder="url img" name="bouteille[url_img]">
                            </div>
                        </div>
                        <div class="form-row justify-content-center">
                            <div class="form-row ajou col-md-4">
                                <input type="hidden" name="requete" value="ajouterBouteilleNonListe">
                                <input type="hidden" name="bouteille[id_formulaire]" value="2">
                                <button type="submit"  class=" btn btn-primary ajouform" id ="validfor2" >Ajouter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </div>
</div>
<script type="text/javascript">
    //Au chargement de la page : on active le menu 'Statistiques' et on désactive les autres
    window.addEventListener('load', function() {
      document.getElementById("ajouterBouteille").classList.add("active");
      document.getElementById("monCompte").classList.remove("active");
      document.getElementById("celliers").classList.remove("active");
      document.getElementById("statistiques").classList.remove("active");
      document.getElementById("indiquer").classList.remove("active");
      document.getElementById("erreurs").classList.remove("active");

    });
</script> 