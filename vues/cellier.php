<!-- Load Facebook SDK for JavaScript -->
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
  
<div class="container">
    <!-- Le nom du Cellier -->
    <div class="row">
        <div class="col">
            <p class="text-dark mt-5 mb-5 text-cellier">
                <b>
                <?php 
                echo $dat['nomCellier']['nomCellier'];
                ?>
                </b>
                <br>
                Mes bouteilles
            </p>
        </div>
    </div>

    <!-- Le formulaire de filtre -->
    <div class="container mt-5 ">
        <form>

            <div class="form-row row tm-content-row tm-bg-primary-dark tm-block tm-block-h-auto">
                <div class="form-group col-md-2">
                    <input type="hidden" value="bouteilleParCellier" name="requete" />
                    <input type="hidden" value="<?php echo $dat['nomCellier']['id']; ?>" name="id" />
                
                   <label>Année</label> 
                   <select name="filter[year]" class="custom-select"><option value="">Tout</option>
                   <?php for($i = date('Y'); $i >= 1930; $i--) echo '<option '.(isset($filter['year']) && $filter['year'] == $i ? 'selected' : '').' value="'.$i.'">'.$i.'</option>'; ?>
                    </select>
                </div> 
                <div class="form-group col-md-2">
                    <label>Type</label> 
                    <select name="filter[type]" class="custom-select">
                        <option value="">Tout</option>
                        <option value="1" <?php echo isset($filter['type']) && $filter['type'] == 1 ? 'selected' : ''; ?>>Rouge</option>
                        <option value="2" <?php echo isset($filter['type']) && $filter['type'] == 2 ? 'selected' : ''; ?>>Blanc</option>   
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label>Pays</label> 
                    <select name="filter[country]" class="custom-select"><option value="">Tout</option>
                    <?php foreach($pays as $c) echo '<option '.(isset($filter['country']) && $filter['country'] == $c ? 'selected' : '').' value="'.$c.'">'.$c.'</option>'; ?>
                    </select>
                </div>
                
                <div class="form-group col-md-2">
                    <label>Tri par</label> 
                    <select class="custom-select search-slt" id="exampleFormControlSelect1" name="filter[filtre]">
                        <option value = "nom">nom </option>
                        <option value = "pays">pays </option>
                        <option value = "millesime">Millesime </option>
                        <option value = "quantite">Quantite </option>
                        <option value = "prix_saq">Prix </option>
                        <option value = "date_achat">Date d'achat </option>
                        <option value = "type">Type </option>
                    </select>
                </div>
                
                <div class="form-group col-md-2">
                    <label class="tm-hide-sm">&nbsp;</label>
                    <input type="submit"  class="btn btn-danger wrn-btn" value="Appliquer">
                    <input type="hidden" name="requete" value="bouteilleParCellier">
                    <input type="hidden" value="<?php echo $dat['nomCellier']['id'];?>" name="id" />
                
                </div>
            </div>
        </form>  

        <div class="form-row">
       
            <div class="form-group col-md-2 form-inline">

            </div> 
            
        </div>
            
        </form>
    </div>


    <!-- Fin du filtre -->

    <!-- row -->
    <div class="row tm-content-row">
    <?php
        // Parcourir le tableau data
        foreach ($data as $cle => $bouteille) {
                 
    ?>
        <div class="col-md-2 col-sm-6 col-md-4 col-lg-3 col-xl-3 tm-block-col bouteilles">

            <!-- Le conteneur overlay -->
            <div class="middle">
                <br>
                <br>
                <!-- Le pays -->
                <h2><small class="pays text-muted">Pays : <?php echo $bouteille['pays'] ?></small></h2>
                <!-- Le type -->
                <h2><small class="type text-muted">Type : <?php echo $bouteille['type'] ?></small></h2>
                <!-- Le millesime -->
                <h2><small class="millesime text-muted">Millesime : <?php echo $bouteille['millesime'] ?></small></h2>
            </div>

            <!-- Conteneur de partage sur les réseaux sociaux -->
            <div class="tm-bg-primary-dark tm-block tm-block-taller bouteille" data-quantite="" data-share="<?php echo $bouteille['id_bouteille_cellier'] ?>">

                <!-- Bouton de partage -->
                <i class="fas fa-share-alt-square btnPartager text-white" id="<?php echo 'share'.$bouteille['id_bouteille_cellier'] ?>"></i>

                <!-- Les réseaux sociaux -->
                <div class="b-share" id="<?php echo 'b-share'.$bouteille['id_bouteille_cellier'] ?>">
                   <div id="carre"></div>
                     <!--Bouton Facebook -->
                    <div class="icon-bar" data-href="https://www.foudil-benzaid.com/vino16628-newDesign/index.php?requete=bouteille&id=<?php echo $bouteille['id_bouteille_cellier'] ?>" data-layout="button" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?kid_directed_site=0&sdk=joey&u=https%3A%2F%2Fwww.foudil-benzaid.com%2Fvino16628-foudil-benzaid%2Findex.php%3Frequete%3Dbouteille%26id%3D<?php echo $bouteille['id_bouteille_cellier'] ?>&display=popup&ref=plugin&src=share_button" class="fb-xfbml-parse-ignore facebook"><i class="fab fa-facebook-f"></i></a></div>
                    
                    
                    <!-- Bouton Twitter -->
                    <div class="icon-bar"  data-layout="button" data-size="small">
                    <a target="_blank" href="<?php echo 'https://twitter.com/share?ref_src=https://www.foudil-benzaid.com/vino16628-newDesign/index.php?requete=bouteille&id='.$bouteille['id_bouteille_cellier'] ?>" class="fb-xfbml-parse-ignore twitter" data-show-count="false"><i class="fab fa-twitter"></i></a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script></div>
                    
                    <!-- Bouton LinkedIn -->
                    <div class="icon-bar"  data-layout="button" data-size="small">
                        <a class="fb-xfbml-parse-ignore linkedin" href="<?php echo 'https://www.linkedin.com/sharing/share-offsite/?url=https%3A%2F%2Fwww.foudil-benzaid.com%2Fvino16628-newDesign%2Findex.php%3Frequete%3Dbouteille%26id%3D'.$bouteille['id_bouteille_cellier'] ?>" onclick="javascript:window.open(this.href,
                          '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fab fa-linkedin-in"></i></a>
                          
                    </div>
                    

                </div>
                <!-- Image de la bouteille -->
                
                <!-- une condition qui choisire d'afficher l'image de la saq si il a lieu sinon elle affiche la photo ajouter bouteille non listées -->
                <img class="rounded-circle image" <?php if(substr($bouteille['image'],0,2) == "//"){ ?> src="https:<?php  echo $bouteille['image'];?>" <?php }else{ ?> src="images/<?php  echo $bouteille['image'];?>"<?php }?> >    
                

                <!-- Le nom de la bouteille -->
                <p class="tm-block-title text-danger nom"><?php echo $bouteille['nom'] ?></p>
                
                <!-- La notation par étoiles -->
                <div data-vote="<?php echo $bouteille['vote']; ?>" class="reviewStars-input" id="reviewStars-input-<?php echo $bouteille['id_bouteille_cellier'] ?>" data-id="<?php echo $bouteille['id_bouteille_cellier'] ?>" style="display:<?php echo $bouteille['vote'] ? 'block' : 'none'; ?>">
                    <?php for($i = 4; $i >= 0; $i--) { ?>
                    <input <?php echo $bouteille['vote'] == $i + 1 ? 'checked' : '';  ?> id="star-<?php echo $i; ?>-<?php echo $bouteille['id_bouteille_cellier'] ?>" class="star-<?php echo $i; ?>" type="radio" name="reviewStars[<?php echo $bouteille['id_bouteille_cellier'] ?>]" value="<?php echo $i+1; ?>" />
                    <label title="gorgeous" for="star-<?php echo $i; ?>-<?php echo $bouteille['id_bouteille_cellier'] ?>"></label>
                    <?php } ?>
                </div>

                <!-- Quantité -->
                <p><small class="quantite text-muted" id="<?php echo 'item'.$bouteille['id_bouteille_cellier'] ?>">Quantité : <?php echo $bouteille['quantite'] ?></small></p>

               <!-- Les boutons Modifier, Ajouter, Boire et Supprimer -->
                <div class="options btn-group" data-id="<?php echo $bouteille['id_bouteille_cellier'] ?>">
                    
                    <button class="btnModifier btn-sm fas fa-edit" title="Modifier"></button>
                    <button type="button" class='btnAjouter btn-sm' title="Ajouter">+</button>
                    <button class='btnBoire btn-sm' title="Boire">-</button>
                    <button class='btnRetirer btn-sm' title="Retirer cette bouteille"><i class="fas fa-trash-alt"></i></button>
                </div>
                             
            </div>
        </div>
       

    <?php
        } //Fin du foreach
     
    ?>  
                      
    </div>
</div>