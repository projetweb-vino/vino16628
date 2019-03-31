/**
 * @file Script contenant les fonctions de base
 * @author Jonathan Martel (jmartel@cmaisonneuve.qc.ca)
 * @version 0.1
 * @update 2019-01-21
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 *
 */

// const BaseURL = "http://vino.jonathanmartel.info/";
const BaseURL = document.baseURI;
console.log(BaseURL);

// Fonction d'affichage du toggle
function toggle() {
  document.getElementById("navbarSupportedContent").classList.toggle("show");
}

window.addEventListener('load', function() {

  /*=================================================================*
  =                 Enlever la quantité dans le cellier              =
  ==================================================================*/
   
  document.querySelectorAll(".btnBoire").forEach(function(element){
      
    element.addEventListener("click", function(evt){
      console.log('boire');
      let id = evt.target.parentElement.dataset.id;
      console.log(id);
      let requete = new Request("index.php?requete=boireBouteilleCellier", {method: 'POST', body: '{"id": '+id+'}'});

      fetch(requete)
      .then(response => {
          if (response.status === 200) {
            return response.json();
          } else {
            throw new Error('Erreur');
          }
        })
        .then(response => {
          console.debug(response);
          // Stocker dans une variable le paragraphe 'Quantité' identifié par l'id bouteille
          let quantite = document.getElementById('item'+id);

          // Afficher la quantité retournée par la requête en l'injectant dans le paragraphe qu'elle appartienne
          quantite.innerHTML = 'Quantité : '+ response.quantite;
        }).catch(error => {
          console.error(error);
      });
    })

  });

  /*=================================================================*
  =                 Ajouter la quantité dans le cellier              =
  ==================================================================*/

  document.querySelectorAll(".btnAjouter").forEach(function(element){
      console.log(element);
      element.addEventListener("click", function(evt){
          let id = evt.target.parentElement.dataset.id;
          let requete = new Request("index.php?requete=ajouterBouteilleCellier", {method: 'POST', body: '{"id": '+id+'}'});

          fetch(requete)
          .then(response => {
              if (response.status === 200) {
                return response.json();
              } else {
                throw new Error('Erreur');
              }
            })
            .then(response => {
              console.debug(response);
              // Stocker dans une variable le paragraphe 'Quantité' identifié par l'id bouteille
              let quantite = document.getElementById('item'+id);
              // Afficher la quantité retournée par la requête en l'injectant dans le paragraphe qu'elle appartient
              quantite.innerHTML = 'Quantité : '+ response.quantite;
            }).catch(error => {
              console.error(error);
            });
      })

  });

  /*=================================================================*
  =                  Affichage du modal importation                  =
  ==================================================================*/
  var modal = document.getElementById('myModal');

  // Obtenir le bouton
  var btn = document.getElementById("myBtn");

  // Obtenir le bouton de fermeture
  var span = document.getElementsByClassName("close")[0];

  // Quand on clique sur le bouton importation, on affiche le modal
  btn.onclick = function() {
    modal.style.display = "block";
  }

  // Qaund on clique sur le bouton de fermeture, on ferme le modal
  span.onclick = function() {
    modal.style.display = "none";
  }

  // Quand on clique en dehors du modal, on ferme le modal
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }

    
    
    
  /*=================================================================*
  =               Retrait d'une bouteille dans un cellier            =
  ===================================================================*/
  
  document.querySelectorAll(".btnRetirer").forEach(function(element){
      console.log(element);
      element.addEventListener("click", function(evt){
        // Boite de dialogue 
        if ( confirm( "Voulez-vous retirer cette bouteille du cellier ?" ) ) {
          // Si l'usager clique sur OK           
          let id = evt.target.parentElement.dataset.id;
          let requete = new Request("index.php?requete=retirerBouteilleCellier", {method: 'POST', body: '{"id": '+id+'}'});

          fetch(requete)
          .then(response => {
              if (response.status === 200) {
                return response;
              } else {
                throw new Error('Erreur');
              }
            })
            .then(response => {
              console.debug(response);
              console.log('retrait');
              window.location = "index.php?requete=CellierParUsager";
              
            }).catch(error => {
              console.error(error);
            });
        } 

      })

  });

  /*=================================================================*
  =               Suppression d'un usager par l'Admin                =
  ===================================================================*/
  document.querySelectorAll(".btnSupprimerUsager").forEach(function(element){
      
    element.addEventListener("click", function(evt){
      // Boite de dialogue 
      if ( confirm( "Voulez-vous supprimer cet usager ?" ) ) {
      // Si l'usager clique sur OK
      
        let id = evt.target.dataset.id;
        console.log('suppression '+id);
        
        let requete = new Request("index.php?requete=supprimerUsagers", {method: 'POST', body: '{"id": '+id+'}'});
               
        fetch(requete).then(response => {
          if (response.status === 200) {
            const tr = this.parentNode.parentNode;
            tr.parentNode.removeChild(tr);
          } else {
            throw new Error('Erreur');
          }
        });
      }
    })

  });

  /*=================================================================*
  =                        Notation par étoiles                      =
  ==================================================================*/
  document.querySelectorAll('.reviewStars-input input').forEach(function(element) {
    element.addEventListener("click", function(evt) {
      var id = this.parentNode.getAttribute('data-id');
      let requete = new Request("index.php?requete=vote", {method: 'POST', body: '{"id": '+id+', "vote": '+this.value+'}'});
      fetch(requete);
    
    });
  });




    
  /*=================================================================*
  =                        Gérer l'accordéon                         =
  ==================================================================*/
  var coll = document.getElementsByClassName("collapsible");
  var i;

  for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var content = this.nextElementSibling;
      if (content.style.maxHeight){
        content.style.maxHeight = null;
      } else {
        content.style.maxHeight = content.scrollHeight + "px";
      } 
    });
  }

    
  // Méthode d'affichage du toogle
  window.onclick = function(event) {
    if (!event.target.matches('.navbar-toggler')) {
      var dropdowns = document.getElementsByClassName("collapse");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }

  // Afficher le toggle
  document.getElementById("toggle").addEventListener("click", function(evt){
    document.getElementById("navbarSupportedContent").classList.add("show");
         
  });

 
  // Selection de tous les boutons modifier
  document.querySelectorAll(".ajoutebouteille").forEach(function(element){

    element.addEventListener("click", function(evt){
      let id = evt.target.parentElement.dataset.id;
      //recuperer les information de la bouteille selectionné
      var nom = document.getElementById("nom"+id).innerHTML;
      var image = document.getElementById("image"+id).innerHTML;
      var code_saq = document.getElementById("code_saq"+id).innerHTML;
      var pays = document.getElementById("pays"+id).innerHTML;
      var description = document.getElementById("description"+id).innerHTML;
      var prix_saq = document.getElementById("prix_saq"+id).innerHTML;
      var url_saq = document.getElementById("url_saq"+id).innerHTML;
      var url_img = document.getElementById("url_img"+id).innerHTML;
      var format = document.getElementById("format"+id).innerHTML;
      //remplire le formulaire d'ajoute une bouteille 
      document.getElementById("nom").value = nom;
      document.getElementById("image").value = image;
      document.getElementById("code_saq").value = code_saq;
      document.getElementById("pays").value = pays;
      document.getElementById("description").value = description;
      document.getElementById("prix").value = prix_saq;
      document.getElementById("url_saq").value = url_saq;
      document.getElementById("url_img").value = url_img;
      document.getElementById("format").value = format;

    })

  });

    
   // Selection de tous les boutons modifier
  document.querySelectorAll(".btnModifier").forEach(function(element){

    element.addEventListener("click", function(evt){

      let id = evt.target.parentElement.dataset.id;
      console.log('id bouteille '+id);
      // Faire une redirection vers la page de modification 
      window.location = "index.php?requete=modifierBouteilleCellier&id="+id;
    })

  });

  /*=================================================================*
  = Gérer l'affichage des boutons de partage sur les réseaux sociaux =
  ==================================================================*/
  document.querySelectorAll(".fa-share-alt-square").forEach(function(element){

    element.addEventListener("click", function(evt){

      let id = evt.target.parentElement.dataset.share;
      console.log('share'+id);
      var x =document.getElementById('b-share'+id);
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    })

     element.addEventListener("mouseover", function(evt){

      let id = evt.target.parentElement.dataset.share;
      console.log('share'+id);
      var x =document.getElementById('b-share'+id);
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    })

  });

});
       
    let inputNomBouteille = document.querySelector("[name='nom_bouteille']");
    
    let liste = document.querySelector('.listeAutoComplete');

    if(inputNomBouteille){
      inputNomBouteille.addEventListener("keyup", function(evt){
        console.log(evt);
        let nom = inputNomBouteille.value;
        liste.innerHTML = "";
        if(nom){
          let requete = new Request(BaseURL+"index.php?requete=autocompleteBouteille", {method: 'POST', body: '{"nom": "'+nom+'"}'});
          fetch(requete)
              .then(response => {
                  if (response.status === 200) {
                    return response.json();
                  } else {
                    throw new Error('Erreur');
                  }
                })
                .then(response => {
                  console.log(response);
                  
                 
                  response.forEach(function(element){
                    liste.innerHTML += "<li data-id='"+element.id +"'>"+element.nom+"</li>";
                  })
                }).catch(error => {
                  console.error(error);
                });
        }
        
        
      });

      let bouteille = {
        nom : document.querySelector(".nom_bouteille"),
        millesime : document.querySelector("[name='millesime']"),
        quantite : document.querySelector("[name='quantite']"),
        date_achat : document.querySelector("[name='date_achat']"),
        prix : document.querySelector("[name='prix']"),
        garde_jusqua : document.querySelector("[name='garde_jusqua']"),
        notes : document.querySelector("[name='notes']"),
      };


      liste.addEventListener("click", function(evt){
        console.dir(evt.target)
        if(evt.target.tagName == "LI"){
          bouteille.nom.dataset.id = evt.target.dataset.id;
          bouteille.nom.innerHTML = evt.target.innerHTML;
          
          liste.innerHTML = "";
          inputNomBouteille.value = "";

        }
      });



   

      let btnAjouter = document.querySelector("[name='ajouterBouteilleCellier']");
      if(btnAjouter){
        btnAjouter.addEventListener("click", function(evt){
          var param = {
            "id_bouteille":bouteille.nom.dataset.id,
            "date_achat":bouteille.date_achat.value,
            "garde_jusqua":bouteille.garde_jusqua.value,
            "notes":bouteille.date_achat.value,
            "prix":bouteille.prix.value,
            "quantite":bouteille.quantite.value,
            "millesime":bouteille.millesime.value,
          };
          let requete = new Request(BaseURL+"index.php?requete=ajouterNouvelleBouteilleCellier", {method: 'POST', body: JSON.stringify(param)});
            fetch(requete)
                .then(response => {
                    if (response.status === 200) {
                      return response.json();
                    } else {
                      throw new Error('Erreur');
                    }
                  })
                  .then(response => {
                    console.log(response);
                  
                  }).catch(error => {
                    console.error(error);
                  });
        
        });
      } 


  }

    



