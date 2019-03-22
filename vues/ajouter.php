<div class="ajouter">

    <!-- <div class="nouvelleBouteille" vertical layout>
        Recherche : <input type="text" name="nom_bouteille">
        <ul class="listeAutoComplete">

        </ul>
            <div >
                <p>Nom : <span data-id="" class="nom_bouteille"></span></p>
                <p>Millesime : <input name="millesime"></p>
                <p>Quantite : <input name="quantite" value="1"></p>
                <p>Date achat : <input name="date_achat"></p>
                <p>Prix : <input name="prix"></p>
                <p>Garde : <input name="garde_jusqua"></p>
                <p>Notes <input name="notes"></p>
            </div>
            <button name="ajouterBouteilleCellier">Ajouter la bouteille</button>
        </div>
    </div> -->
    <div class="container contact-form col-md-6">

        <form method="GET">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="cellier">Celliers :  </label>
                    <select class="form-control" name="cellier">
                    <?php foreach ($data as $key => $cellier) { ?>
                        <option value="<?php echo $cellier['id'] ?>"><?php echo $cellier['nom'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <br>
                    <a class="btn btn-primary" href="#popup1">Liste des bouteilles</a>
                </div>
            </div>         
           
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" id="nom" placeholder="Nom" name="nom">
                </div>
                <div class="form-group col-md-6">
                    <label for="type">Type :  </label>
                    <select class="form-control" name="type">
                    <?php foreach ($datas as $key => $type) { ?>
                        <option value="<?php echo $type['type'] ?>"><?php echo $type['type'] ?></option>
                        <?php } ?>
                    </select>
                </div>    
            </div>
    
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="millesime">Millesime</label>
                    <input type="text" class="form-control" id="millesime" placeholder="Millesime" name="millesime">
                </div>

                <div class="form-group col-md-4">
                    <label for="quantite">Quantité</label>
                    <input type="number" class="form-control" id="quantite" placeholder="Quantité" name="quantite">
                </div>

                <div class="form-group col-md-4">
                    <label for="date_achat">Date d'achat</label>
                    <input type="date" class="form-control" id="date_achat" placeholder="Date d'achat" name="date_achat">
                </div>
          
            </div>
             <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="prix">Prix</label>
                        <input type="text" class="form-control" id="prix" name="prix" name="prix_saq">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="garde_jusqua">Garder jusqu'à</label>
                        <input type="date" class="form-control" id="garde_jusqua" name="garde_jusqua">
                    </div>
            
                    <div class="form-group col-md-6">
                        <label for="notes">Notes</label>
                        <input type="text" class="form-control" id="notes" name="notes">
                    </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="image">Image</label>
                    <input type="text" class="form-control" id="image" placeholder="image" name="image">
                </div>

                <div class="form-group col-md-4">
                    <label for="code_saq">code saq</label>
                    <input type="text" class="form-control" id="code_saq" placeholder="code saq" name="code_saq">
                </div>

                <div class="form-group col-md-4">
                    <label for="pays">Pays</label>
                    <input type="text" class="form-control" id="pays" placeholder="Pays" name="pays">
                </div>
          
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="format">Format</label>
                    <input type="text" class="form-control" id="format" placeholder="Format" name="format">
                </div>
                <div class="form-group col-md-4">
                    <label for="url_saq">url saq</label>
                    <input type="text" class="form-control" id="url_saq" placeholder="url saq" name="url_saq">
                </div>

                <div class="form-group col-md-4">
                    <label for="url_img">url img</label>
                    <input type="text" class="form-control" id="url_img" placeholder="url img" name="url_img">
                </div>
          
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" placeholder="description" name="description">
                </div>
            </div>    
            <div class="form-row col-md-4">
                    <div class="form-group">
                        <input type="hidden" name="requete" value="ajouterBouteilleNonListe">
                        <button type="submit"  class="btn btn-primary">Ajouter</button>
                    </div>
                </div>
        </form>

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