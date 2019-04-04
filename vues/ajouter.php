<div class="ajouter container-fluid">
    <div class="tabscss">
    <div class="tab-2">
        <label for="tab2-1">Ajouter Une bouteille Non listées</label>
        <?php
        // condition pour selectioner le formulaire il affiche listées si en travail avec sinon l'autre formulaire non listées
        if (!isset($champs['id_formulaire'])||(isset($champs['id_formulaire'])&& isset($champs['id_formulaire'])== 1)){ ?>
            <input id="tab2-1" name="tabs-two" type="radio" checked="checked">
        <?php }else{?>
            <input id="tab2-1" name="tabs-two" type="radio" >
        <?php }?>
         <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <form method="GET">
                        <div class="form-row">
                            <div class=" form-group col-md-3 wrap-input100 validate-input ">
                                <span class="label-input100 selec">Celliers :</span>
                                <select class="input100 sele" name="cellier_id">
                                <?php foreach ($data as $key => $cellier) { ?>
                                    <option value="<?php echo $cellier['id'] ?>"><?php echo $cellier['nom'];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                             <div id="nomchamp1" class=" form-group col-md-3 wrap-input100 validate1 validate-input" data-validate="Nom est invalide" >
                                <span class="label-input100">Nom</span>
                                <!-- apres la validation il retourne les valeurs envoyés   -->
                                <?php  if(isset($champs['nom'], $champs['id_formulaire']) && $champs['id_formulaire'] == 1) {?>
                                    <input class="input100" type="text" name="nom" id="nom1" value = "<?php echo $champs['nom']?>">
                                <?php 
                                    }else{
                                ?>
                                    <input class="input100" type="text" name="nom" id="nom1" placeholder="Nom...">
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
                                <select class="input100 sele" name="type_id">
                                <?php foreach ($datas as $key => $type) { ?>
                                    <option value="<?php echo $type['id'] ?>"><?php echo $type['type'] ?></option>
                                    <?php } ?>
                                </select>
                            </div> 
                        </div>         
                        <div class="form-row">
                            <div class=" form-group col-md-3 wrap-input100 validate2 validate-input" data-validate="Millesime est invalide">
                                <span class="label-input100">Millesime</span>
                                 <!-- apres la validation il retourne les valeurs envoyés   -->
                                <?php  if(isset($champs['millesime'], $champs['id_formulaire']) && $champs['id_formulaire'] == 1) {?>
                                    <input class="input100" type="text" name="millesime" id="millesime1" value = "<?php echo $champs['millesime']?>">
                                <?php 
                                    }else{
                                ?>
                                    <input class="input100" type="text" name="millesime" id="millesime1" placeholder="Millesime">
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
                                    <input class="input100" type="text" name="quantite" id="quantite1" value = "<?php echo $champs['quantite']?>">
                                <?php 
                                    }else{
                                ?>
                                    <input class="input100" type="text" name="quantite" id="quantite1" placeholder="Quantité...">
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
                                    <input class="input100" type="text" name="pays" id="pays1" value = "<?php echo $champs['pays']?>">
                                <?php 
                                    }else{
                                ?>
                                    <input class="input100" type="text" name="pays" id="pays1" placeholder="Pays...">
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
                         <div class="form-row">
                            <div class=" form-group col-md-3 wrap-input100 validate5 validate-input" data-validate="Prix est invalide">
                                <span class="label-input100">Prix</span>
                                 <!-- apres la validation il retourne les valeurs envoyés   -->
                                <?php  if(isset($champs['prix'], $champs['id_formulaire']) && $champs['id_formulaire'] == 1) {?>
                                    <input class="input100" type="text" name="prix_saq" id="prix1" value = "<?php echo $champs['prix']?>">
                                <?php 
                                    }else{
                                ?>
                                    <input class="input100" type="text" name="prix_saq" id="prix1" placeholder="Prix...">
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
                                    <input class="input100" type="text" name="notes" id="notes1" value = "<?php echo $champs['notes']?>">
                                <?php 
                                    }else{
                                ?>
                                    <input class="input100" type="text" name="notes" id="notes1" placeholder="Notes...">
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
                                    <input class="input100" type="text" name="format" id="format1" value = "<?php echo $champs['format']?>">
                                <?php 
                                    }else{
                                ?>
                                    <input class="input100" type="text" name="format" id="format1" placeholder="Format...">
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
                        <div class="form-row">
                             <div class=" form-group col-md-3 wrap-input100 validate8 validate-input">
                                <span class="label-input100">Date d'achat</span>
                                 <!-- apres la validation il retourne les valeurs envoyés   -->
                                <?php  if(isset($champs['date_achat'], $champs['id_formulaire']) && $champs['id_formulaire'] == 1) {?>
                                    <input class="input100 sele" type="date" name="date_achat" id="date_achat1" value = "<?php echo $champs['date_achat']?>">
                                <?php 
                                    }else{
                                ?>
                                    <input class="input100 sele" type="date" name="date_achat" id="date_achat1" placeholder="Date d'achat...">
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
                                    <span class="label-input100">Garder jusqu'à</span>
                                    <?php  if(isset($champs['garde_jusqua'], $champs['id_formulaire']) && $champs['id_formulaire'] == 1) {?>
                                    <input class="input100 sele" type="date" name="garde_jusqua" id="garde_jusqua1" value = "<?php echo $champs['garde_jusqua']?>">
                                    <?php 
                                        }else{
                                    ?>
                                        <input class="input100 sele" type="date" name="garde_jusqua" id="garde_jusqua1" placeholder="Garder jusqu'à...">
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
                            <div class="imageupload form-group col-md-3 wrap-input100 validate26 validate-input">
                                <span class="label-input100">images</span>
                                <input  type="file" class ="inputvalue" id="image_uploads" name="image" accept=".jpg, .jpeg, .png" multiple>
                                <span class="focus-input100"></span>
                                <!-- Afficher un message d'erreur s'il y'a lieu -->
                                <?php  if(isset($message['erreur_image'])) { ?>
                                    <small class="text-warning invali"><?php echo $message['erreur_image']?></small>
                                <?php 
                                    } 
                                ?>
                            </div>
                          </div>
                         <div class="form-row">
                             <div class=" form-group col-md-9 wrap-input100 validate10 validate-input">
                                <span class="label-input100">Description</span>
                                <?php  if(isset($champs['description'], $champs['id_formulaire']) && $champs['id_formulaire'] == 1) {?>
                                    <input class="input100 sele" type="text" name="description" id="description1" value = "<?php echo $champs['description']?>">
                                <?php 
                                    }else{
                                ?>
                                    <input class="input100 sele" type="text" name="description" id="description1" placeholder="Description...">
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
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <input type="hidden" class="form-control" id="code_saq1" placeholder="code saq" name="code_saq">
                            </div>
                            <div class="form-group col-md-3">
                                <input type="hidden" class="form-control" id="url_saq1" placeholder="url saq" name="url_saq">
                            </div>

                            <div class="form-group col-md-3">
                                <input type="hidden" class="form-control" id="url_img1" placeholder="url img" name="url_img">
                            </div>
                        </div>
                        <div class="form-row col-md-3">
                            <div class="form-group wrap-login100-form-btn">
                                <input type="hidden" name="requete" value="ajouterBouteilleNonListe">
                                <input type="hidden" name="id_formulaire" value="1">
                                <button type="submit"  class=" btn btn-primary ajouform">Ajouter</button>
                            </div>
                        </div>
                    </form>
                </div>
                 <div class="col-md-3 imagesuprimer" >
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
            </div>
        </div>    
    </div>
 <div class="tab-2">
    <label for="tab2-2">Ajouter Une bouteille listées</label>
        <?php 
        if (isset($champs['id_formulaire']) && $champs['id_formulaire'] == 2) { ?>
            <input id="tab2-2" name="tabs-two" type="radio" checked="checked">
        <?php }else{?>
            <input id="tab2-2" name="tabs-two" type="radio">
        <?php }?>
    
    <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <form method="GET">
                        <div class="form-row">
                            <div class=" form-group col-md-3 wrap-input100 validate-input ">
                                <span class="label-input100 selec">Celliers :</span>
                                <select class="input100 sele" name="cellier_id">
                                <?php foreach ($data as $key => $cellier) { ?>
                                    <option value="<?php echo $cellier['id'] ?>"><?php echo $cellier['nom'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                             <div id="nomchamp1" class=" form-group col-md-3 wrap-input100 validate13 validate-input" data-validate="Nom est invalide" >
                                <span class="label-input100">Nom</span>
                                <?php  if(isset($champs['nom'], $champs['id_formulaire']) && $champs['id_formulaire'] == 2) {?>
                                    <input class="input100" type="text" name="nom" id="nom" value = "<?php echo $champs['nom']?>">

                                <?php 
                                    }else{
                                ?>
                                    <input class="input100" type="text" name="nom" id="nom" placeholder="Nom...">
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
                                <select class="input100 sele" name="type_id">
                                <?php foreach ($datas as $key => $type) { ?>
                                    <option value="<?php echo $type['id'] ?>"><?php echo $type['type'] ?></option>
                                    <?php } ?>
                                </select>
                            </div> 
                        </div>         
                        <div class="form-row">
                            <div class=" form-group col-md-3 wrap-input100 validate14 validate-input" data-validate="Millesime est invalide">
                                <span class="label-input100">Millesime</span>
                                <?php  if(isset($champs['millesime'], $champs['id_formulaire']) && $champs['id_formulaire'] == 2) {?>
                                    <input class="input100" type="text" name="millesime" id="millesime" value = "<?php echo $champs['millesime']?>">
                                <?php 
                                    }else{
                                ?>
                                    <input class="input100" type="text" name="millesime" id="millesime" placeholder="Millesime">
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
                                <span class="label-input100">Quantité</span>
                                <?php  if(isset($champs['quantite'], $champs['id_formulaire']) && $champs['id_formulaire'] == 2) {?>
                                    <input class="input100" type="text" name="quantite" id="quantite" value = "<?php echo $champs['quantite']?>">
                                <?php 
                                    }else{
                                ?>
                                    <input class="input100" type="text" name="quantite" id="quantite" placeholder="Quantité...">
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
                                <span class="label-input100">Pays</span>
                                <?php  if(isset($champs['pays'], $champs['id_formulaire']) && $champs['id_formulaire'] == 2) {?>
                                    <input class="input100" type="text" name="pays" id="pays" value = "<?php echo $champs['pays']?>">
                                <?php 
                                    }else{
                                ?>
                                    <input class="input100" type="text" name="pays" id="pays" placeholder="Pays...">
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
                        <div class="form-row">
                            <div class=" form-group col-md-3 wrap-input100 validate17 validate-input" data-validate="Prix est invalide">
                                <span class="label-input100">Prix</span>
                                <?php  if(isset($champs['prix'], $champs['id_formulaire']) && $champs['id_formulaire'] == 2) {?>
                                    <input class="input100" type="text" name="prix_saq" id="prix" value = "<?php echo $champs['prix']?>">
                                <?php 
                                    }else{
                                ?>
                                    <input class="input100" type="text" name="prix_saq" id="prix" placeholder="Prix...">
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
                                <span class="label-input100">Notes</span>
                                <?php  if(isset($champs['notes'], $champs['id_formulaire']) && $champs['id_formulaire'] == 2) {?>
                                    <input class="input100" type="text" name="notes" id="notes" value = "<?php echo $champs['notes']?>">
                                <?php 
                                    }else{
                                ?>
                                    <input class="input100" type="text" name="notes" id="notes" placeholder="Notes...">
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
                                <span class="label-input100">Format</span>
                                <?php  if(isset($champs['format'], $champs['id_formulaire']) && $champs['id_formulaire'] == 2) {?>
                                    <input class="input100" type="text" name="format" id="format" value = "<?php echo $champs['format']?>">
                                <?php 
                                    }else{
                                ?>
                                    <input class="input100" type="text" name="format" id="format" placeholder="Format...">
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
                        <div class="form-row">
                             <div class=" form-group col-md-3 wrap-input100 validate20 validate-input">
                                <span class="label-input100">Date d'achat</span>
                                <?php  if(isset($champs['date_achat'], $champs['id_formulaire']) && $champs['id_formulaire'] == 2) {?>
                                    <input class="input100 sele" type="date" name="date_achat" id="date_achat" value = "<?php echo $champs['date_achat']?>">
                                <?php 
                                    }else{
                                ?>
                                    <input class="input100 sele" type="date" name="date_achat" id="date_achat" placeholder="Date d'achat...">
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
                                <span class="label-input100">Garder jusqu'à</span>
                                <?php  if(isset($champs['garde_jusqua'], $champs['id_formulaire']) && $champs['id_formulaire'] == 2) {?>
                                <input class="input100 sele" type="date" name="garde_jusqua" id="garde_jusqua" value = "<?php echo $champs['garde_jusqua']?>">
                                <?php 
                                    }else{
                                ?>
                                    <input class="input100 sele" type="date" name="garde_jusqua" id="garde_jusqua" placeholder="Garder jusqu'à...">
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
                                <span class="label-input100">images</span>

                                <?php  if(isset($champs['image'], $champs['id_formulaire']) && $champs['id_formulaire'] == 2) {?>

                                    <input type="text" class="input100" id="image" placeholder="image" name="image" value = "<?php echo $champs['image']?>">
                                <?php 
                                    }else{
                                ?>
                                    <input type="text" class="input100" id="image" placeholder="image" name="image">
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
                         <div class="form-row">
                             <div class=" form-group col-md-9 wrap-input100 validate22 validate-input">
                                <span class="label-input100">Description</span>
                                <?php  if(isset($champs['description'], $champs['id_formulaire']) && $champs['id_formulaire'] == 2) {?>
                                    <input class="input100 sele" type="text" name="description" id="description" value = "<?php echo $champs['description']?>">
                                <?php 
                                    }else{
                                ?>
                                    <input class="input100 sele" type="text" name="description" id="description" placeholder="Description...">
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
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <input type="hidden" class="form-control" id="code_saq" placeholder="code saq" name="code_saq">
                            </div>
                            <div class="form-group col-md-3">
                                <input type="hidden" class="form-control" id="url_saq" placeholder="url saq" name="url_saq">
                            </div>

                            <div class="form-group col-md-3">
                                <input type="hidden" class="form-control" id="url_img" placeholder="url img" name="url_img">
                            </div>
                        </div>
                        <div class="form-row col-md-3">
                            <div class="form-group wrap-login100-form-btn">
                                <input type="hidden" name="requete" value="ajouterBouteilleNonListe">
                                <input type="hidden" name="id_formulaire" value="2">
                                <button type="submit"  class=" btn btn-primary ajouform" id ="validfor2" >Ajouter</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-3 imagesuprimer" >
                    <div class="form-group ">
                        <a class="btn btn-primary btnliste" href="#popup1">Liste des bouteilles</a>
                    </div>
                    <div id="imagelistee">
                        <img  height="360px" width="300px" >
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
            </div>
        </div>    
    </div>
</div>
<!-- Popup de liste des bouteilles -->
<div id="popup1" class="overlay">
    <div class="popup">
        <h5>La liste des bouteilles</h5>
        <a class="close" href="#">&times;</a>
        <div class="content">
            <table class="table table-dark">
              <thead>
                <tr>
                    <th scope="col">index</th>
                    <th scope="col">Nom</th>
                    <th scope="col">La photo</th>
                    <th scope="col">Image</th>
                    <th scope="col">Code de la saq</th>
                    <th scope="col">pays</th>
                    <th scope="col">description</th>
                    <th scope="col">prix</th>
                    <th scope="col">url saq</th>
                    <th scope="col">url image</th>
                    <th scope="col">format</th>
                    <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (!empty($data)) {
                    $i =1;
                     foreach ($dat as $cle => $bouteille) {
                        $i++
                    ?>
                    <tr>
                      <td class="index"><?php echo $i ?></td>
                      <td id="nom<?php echo $i ?>"><?php echo $bouteille['nom'] ?></td>
                      <td><img class = "imageliste" src="https:<?php echo $bouteille['image'] ?>"></td>
                      <td id="image<?php echo $i ?>"><?php echo $bouteille['image'] ?></td>
                      <td id="code_saq<?php echo $i ?>"><?php echo $bouteille['code_saq'] ?></td>
                      <td id="pays<?php echo $i ?>"><?php echo $bouteille['pays'] ?></td>
                      <td id="description<?php echo $i ?>"><?php echo $bouteille['description'] ?></td>
                      <td id="prix_saq<?php echo $i ?>"><?php echo $bouteille['prix_saq'] ?></td>
                      <td id="url_saq<?php echo $i ?>"><?php echo $bouteille['url_saq'] ?></td>
                      <td id="url_img<?php echo $i ?>"><?php echo $bouteille['url_img'] ?></td>
                      <td id="format<?php echo $i ?>"><?php echo $bouteille['format'] ?></td>
                      <td><div  data-id="<?php echo $i ?>"><button type="button"  class="ajoutebouteille">Ajouter</button></div></td>
                    </tr>
                    <?php
                        } //Fin du foreach
                }
                // Sinon on affiche un message
                else{
                    echo "Votre Cellier est vide !";
                }

                ?>  
              </tbody>
            </table>
        </div>
    </div>
</div>
<!-- fin popup -->