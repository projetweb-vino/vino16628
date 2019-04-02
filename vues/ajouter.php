<div class="ajouter container-fluid">
    <div class="tabscss">
    <div class="tab-2">
        <label for="tab2-1">Ajouter Une bouteille Non listées</label>
        <input id="tab2-1" name="tabs-two" type="radio" checked="checked">
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
                                <input class="input100" type="text" name="nom" id="nom1" placeholder="Nom...">
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
                                <input class="input100" type="text" name="millesime" id="millesime1" placeholder="Millesime">
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
                                <input class="input100" type="text" name="quantite" id="quantite1" placeholder="Quantité...">
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
                                <input class="input100" type="text" name="pays" id="pays1" placeholder="Pays...">
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
                                <input class="input100" type="text" name="prix_saq" id="prix1" placeholder="Prix...">
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
                                <input class="input100" type="text" name="notes" id="notes1" placeholder="Notes...">
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
                                <input class="input100" type="text" name="format" id="format1" placeholder="Format...">
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
                                <input class="input100 sele" type="date" name="date_achat" id="date_achat1" placeholder="Date d'achat...">
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
                                    <input class="input100 sele" type="date" name="garde_jusqua" id="garde_jusqua1" placeholder="Garder jusqu'à...">
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
                                <input class="input100 sele" type="text" name="description" id="description1" placeholder="Description...">
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
                                <button type="submit"  class=" btn btn-primary">Ajouter</button>
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
                    <th scope="col">prix de la saq</th>
                    <th scope="col">url saq</th>
                    <th scope="col">url image</th>
                    <th scope="col">format</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (!empty($data)) {
                    $i =0;
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
                      <td><div class="options btn-group" data-id="<?php echo $i ?>"><button type="button"  class="ajoutebouteille">Ajouter</button></div></td>
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