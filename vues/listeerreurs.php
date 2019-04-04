<div class="container-fluid">
    <div class="row indique">
        <div class="col-md-12">
            <h3>La listes des erreurs indiqué par les usagers </h3>
        </div>    
        <div class="col-md-12">
            <p></p>
        </div>    
    </div>    
    <div class="row justify-content-md-center indique">
        <div class="table-responsive col-lg-8 min-100 ">
           <table class="table table-dark">
              <thead>
                <tr>
                    <th scope="col">index</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Titre d'erreurs</th>
                    <th scope="col">Message</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (!empty($data)) {
                    $i =1;
                     foreach ($data as $cle => $erreur) {
                        $i++
                    ?>
                    <tr>
                      <td ><?php echo $i ?></td>
                      <td ><?php echo $erreur['nom'] ?></td>
                      <td ><?php echo $erreur['prenom'] ?></td>
                      <td ><?php echo $erreur['titre'] ?></td>
                      <td ><?php echo $erreur['texteerreurs'] ?></td>
                  </td>
                    </tr>
                    <?php
                        } //Fin du foreach
                }
                // Sinon on affiche un message
                else{
                    echo "Votre liste est vide !";
                }

                ?>  
              </tbody>
            </table>
        </div>    
    </div>
</div>       
