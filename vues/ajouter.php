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
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="cellier">Type :  </label>
                    <select class="form-control" name="cellier">
                    <?php foreach ($data as $key => $type) { ?>
                        <option value="<?php echo $type['id'] ?>"><?php echo $type['nom'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" id="nom" placeholder="Nom" name="nom">
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
            <div class="form-row col-md-4">
                <div class="form-group">
                    <input type="hidden" name="requete" value="ajouterBouteilleNonListe">
                    <button type="submit"  class="btn btn-primary">Ajouter</button>
                </div>
            </div>
     
        </form>

    </div>
    
</div>
