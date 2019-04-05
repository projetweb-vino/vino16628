<div class="container-fluid listfooter">
    <div class="row listfooter2">
        <div class="col-md-12">
            <h3>Ce formulaire indique aux administrateurs les erreurs dans le catalogue</h3>
        </div>    
        <div class="col-md-12">
            <p>Vous pouvez indiquer une ou plusieurs erreurs dans le catalogue aux administrateurs à fin de régler ces problèmes.</p>
        </div>    
    </div>    
    <div class="row justify-content-md-center ">
        <div class="col-lg-4 ">
            <form method="GET">
                <div class="form-group">
                    <label for="username">Titre</label>    
                    <div class="input-group-prepend">
                        <input name="titre"  type="text" class="form-control" id="titre" value="" required/>
                    </div>    
                </div>
                <div class="form-group">
                   <label for="username">Description de l'erreur</label>    
                    <div class="input-group-prepend">
                        <textarea name="texteerreurs" class="form-control" rows="8" id="comment"></textarea>
                    </div>
                </div>               
                <div class="form-row  mt-2 col-md-3 indiq">
                    <div class="form-group wrap-login100-form-btn">
                        <input type="hidden" name="requete" value="sauvagrdeindication">
                        <button type="submit"  class=" btn btn-primary ">Envoyer</button>
                    </div>
                </div>
            </form>
        </div>    
    </div>
</div>


<script type="text/javascript">
    //Au chargement de la page : on active le menu 'Statistiques' et on désactive les autres
    window.addEventListener('load', function() {
      document.getElementById("indiquer").classList.add("active");
      document.getElementById("monCompte").classList.remove("active");
      document.getElementById("celliers").classList.remove("active");
      document.getElementById("statistiques").classList.remove("active");

    });
</script>       
