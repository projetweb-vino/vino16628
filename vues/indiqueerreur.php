<div class="container-fluid min-101">
    <div class="row indique">
        <div class="col-md-12">
            <h3>Formulaire indique aux adminisrateurs les erreurs dans le catalogue</h3>
        </div>    
        <div class="col-md-12">
            <p>Voue pouvez indiquer une ou plusieurs erreurs dans le catalogue aux administrateurs à fin de régler ces problèmes et merci..</p>
        </div>    
    </div>    
    <div class="row justify-content-md-center indique">
        <div class="col-lg-4 ">
            <form method="GET">
                <div class="form-group">
                    <label for="username">Titre</label>    
                    <div class="input-group-prepend">
                        <input name="titre"  type="text" class="form-control validate" id="titre" value="" required/>
                    </div>    
                </div>
                <div class="form-group">
                   <label for="username">Texte</label>    
                    <div class="input-group-prepend">
                        <textarea name="texteerreurs" class="form-control" rows="8" id="comment"></textarea>
                    </div>
                </div>               
                <div class="form-row  mt-2 col-md-3 indiq">
                    <div class="form-group wrap-login100-form-btn">
                        <input type="hidden" name="requete" value="sauvagrdeindication">
                        <button type="submit"  class=" btn btn-primary ">Ajouter</button>
                    </div>
                </div>
            </form>
        </div>    
    </div>
</div>       
