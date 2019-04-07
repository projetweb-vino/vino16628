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
      
      let id = evt.target.parentElement.dataset.id;
      
      let requete = new Request("index.php?requete=boireBouteilleCellier", {method: 'POST', body: '{"id": '+id+'}'});
      document.getElementById('reviewStars-input-' + id).style.display = 'block';
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
  if (btn) {
    btn.onclick = function() {
      modal.style.display = "block";
    }
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
     
      element.addEventListener("click", function(evt){
        // Boite de dialogue 
        confirmation = confirm( "Voulez-vous retirer cette bouteille du cellier ?" );
        if (confirmation) {
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

  /*=================================================================*
  =                 Afficher le nombre de bouteilles bu              =
  ==================================================================*/
  var date = document.getElementById("date");
  if (date != null) {
    
    date.addEventListener("change", function(evt){
      var id = document.getElementById("date").value;
      var nombreBu = document.getElementById("nombreBu");
      var nombreAjoute = document.getElementById("nombreAjoute");
         
      let requete = new Request("index.php?requete=nombreBouteillesBu", {method: 'POST', body: '{"id": '+id+'}'});
               
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
                // Injecter le résultat 
                nombreBu.innerHTML = response.nombreBu;
                nombreAjoute.innerHTML = response.nombreAjoute;
              
            }).catch(error => {
              console.error(error);
            });
           
    });
  }

  /*=============================================
  =       image de formulaire d'ajout      =
  =============================================*/
  var input = document.getElementById("image_uploads");
  var preview = document.querySelector('.preview');
  if (input !=null) {
    input.addEventListener('change', updateImageDisplay);

  }
  
  function updateImageDisplay() {
    var imagesuprimer = document.getElementById("image1");
    var curFiles = input.files;

    if(curFiles.length === 0) {
      var para = document.createElement('p');
      para.textContent = 'Aucun fichier sélectionné pour le moment';
    } else {

      for(var i = 0; i < curFiles.length; i++) {

        var para = document.createElement('p');
        para.setAttribute("id", "paga1")
        var divimage = document.getElementById("imagecharger");
        var paragsuprimer = document.getElementById("paga1");
        if(imagesuprimer) {
          imagesuprimer.remove();
        }
        if(paragsuprimer){
          paragsuprimer.remove();
        }
        if(validFileType(curFiles[i])) {
          para.textContent = 'File name ' + curFiles[i].name + ', file size ' + returnFileSize(curFiles[i].size) + '.';

          var image = document.createElement('img');
          console.log(image);
          image.src = window.URL.createObjectURL(curFiles[i]);
          
          image.style.width = '200px';
          image.style.height = '204px';
          image.setAttribute("id", "image1") 
          divimage.appendChild(image);
          
        } else {
          para.textContent = 'Nom de fichier ' + curFiles[i].name + ': le type pas valide .';
          divimage.appendChild(para);

        }
      }
    }
  }
  var fileTypes = [
    'image/jpeg',
    'image/pjpeg',
    'image/png'
  ]

  function validFileType(file) {
    for(var i = 0; i < fileTypes.length; i++) {
      if(file.type === fileTypes[i]) {
        return true;
      }
    }

    return false;
  }function returnFileSize(number) {
    if(number < 1024) {
      return number + ' octets';
    } else if(number >= 1024 && number < 1048576) {
      return (number/1024).toFixed(1) + ' Ko';
    } else if(number >= 1048576) {
      return (number/1048576).toFixed(1) + ' Mo';
    }
  }
  /*=============================================
  =      Recherche Bouteille listée de la saq    =
  =============================================*/
  var champrecherche = document.querySelector(".recherchesaq");
  var listerech = document.querySelector('.listeBouteilles');
  var image = document.getElementById("imagelistee");
  if (image) {
    var image = document.getElementById("imagelistee").childNodes[1];
    image.style.display = "none";  
  }
        
  if (champrecherche) {
    champrecherche.addEventListener("keyup", function(evt){
        
    let nomBouteille = champrecherche.value;
      
    listerech.innerHTML = "";

      if(nomBouteille){
        let requete = new Request( "index.php?requete=RechercheFormulaire", { method: 'POST', body: '{"nom": "' + nomBouteille + '", "nbResultats": 5}'}
        );
        fetch(requete).then(response => {
          if (response.status === 200) {
            return response.json();
          }
          else {
            throw new Error('Erreur');
          }
        })
        .then(response => {
          response.forEach(function(element){
              listerech.innerHTML += "<li data-idbouteille='"+ element.id +"'>"+element.nom+"</li>";
          })
        })
        .catch(error => {
            console.error(error);
        });
      }
    });
  }
    /*=============================================
    =      Remplire le formulaire     =
    =============================================*/

 if (listerech != null) {

    listerech.addEventListener("click", function(evt){
    
    if(evt.target.tagName == "LI"){
        let id= evt.target.dataset.idbouteille;

        let requete = new Request("index.php?requete=bouteilledelaSaq",{method: 'POST', body: '{"id": "'+id+'"}'});

        fetch(requete).then(response => {
            if (response.status === 200) {
                return response.json();
            }
            else {
                throw new Error('Erreur');
            }
        })
        .then(response => {
          //remplire le formulaire d'ajoute une bouteille 
          document.getElementById("nom").value = response.nom;
          document.getElementById("image").value = response.image;
          document.getElementById("code_saq").value = response.code_saq;
          document.getElementById("pays").value = response.pays;
          document.getElementById("description").value = response.description;
          document.getElementById("prix").value = response.prix_saq;
          document.getElementById("url_saq").value = response.url_saq;
          document.getElementById("url_img").value = response.url_img;
          document.getElementById("format").value = response.format;
          //afficher l'image dans le formulaire listées
          var image = document.getElementById("imagelistee").childNodes[1];
          image.setAttribute("src", response.url_img);
          image.style.display = "block";
          //vider le champ de recherche et la liste des bouteille          
          listerech.innerHTML = "";
          champrecherche.value = "";
        })
        .catch(error => {
            console.error(error);
        });        
      }
    });        
  }

  /*=============================================
  =       validation des deux formulaires      =
  =============================================*/
  
    document.querySelectorAll(".input100").forEach(function(element){
      
      
      element.addEventListener("change", function(evt){
        var formulaire =  document.getElementById("tab2-2");
        var formulaire1 =  document.getElementById("tab2-1");
        console.log(element.name)
        if (element.name == "bouteille[nom]") {
          var regex =/^[a-zA-Z0-9 ]+$/gm
          if (formulaire1.checked ) {
          validerformulaire(element.value, element.name,regex, 1 );
          }
          if (formulaire.checked ) {
            validerformulaire(element.value, element.name,regex, 13 );
          }
        }
        if (element.name == "bouteille[millesime]") {
          var regex =/^(1[89]\d\d|20[01]\d)$/ig
          if (formulaire1.checked ) {
          validerformulaire(element.value, element.name,regex, 2);
          }
          if (formulaire.checked ) {
            validerformulaire(element.value, element.name,regex, 14 );
          }
        }
        if (element.name == "bouteille[quantite]") {
          var regex =/^[0-9]+$/gm
          if (formulaire1.checked ) {
          validerformulaire(element.value, element.name,regex, 3);
          }
          if (formulaire.checked ) {
            validerformulaire(element.value, element.name,regex, 15 );
          }
        }
        if (element.name == "bouteille[pays]") {
          var regex =/^[A-Za-z \é\è\ê\-]+$/gm
          if (formulaire1.checked ) {
          validerformulaire(element.value, element.name,regex, 4);
          }
          if (formulaire.checked ) {
            validerformulaire(element.value, element.name,regex, 16 );
          }
        }
        if (element.name == "bouteille[prix_saq]") {
          var regex =/^\d+(,\d{3})*(\.\d{1,4})?$/gm
          if (formulaire1.checked ) {
          validerformulaire(element.value, element.name,regex, 5);
          }
          if (formulaire.checked ) {
            validerformulaire(element.value, element.name,regex, 17 );
          }
        }
        if (element.name == "bouteille[notes]") {
          var regex =/^[a-zA-Z0-9 /:,;.]+$/gm
          if (formulaire1.checked ) {
          validerformulaire(element.value, element.name,regex, 6);
          }
          if (formulaire.checked ) {
            validerformulaire(element.value, element.name,regex, 18 );
          }
        }
        if (element.name == "bouteille[description]") {
          var regex =/^[a-zA-Z0-9 /:,;.&]+$/gm
          if (formulaire1.checked ) {
          validerformulaire(element.value, element.name,regex, 10);
          }
          if (formulaire.checked ) {
            validerformulaire(element.value, element.name,regex, 22 );
          }
        }
        if (element.name == "bouteille[format]") {
          var regex =/^[a-zA-Z0-9 /,*.]+$/gm
          if (formulaire1.checked ) {
          validerformulaire(element.value, element.name,regex, 7);
          }
          if (formulaire.checked ) {
            validerformulaire(element.value, element.name,regex, 19 );
          }
        }
        if (element.name == "bouteille[date_achat]") {
          var regex =/([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/i
          if (formulaire1.checked ) {
          validerformulaire(element.value, element.name,regex, 8);
          }
          if (formulaire.checked ) {
            validerformulaire(element.value, element.name,regex, 20 );
          }
        }
        if (element.name == "bouteille[garde_jusqua]") {
          var regex =/([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/i
          if (formulaire1.checked ) {
          validerformulaire(element.value, element.name,regex, 9);
          }
          if (formulaire.checked ) {
            validerformulaire(element.value, element.name,regex, 21 );
          }
        }
      })
      
    });
    function validerformulaire(element, name, reg ,id){
      element =element.trim();
     var input = document.querySelector(".validate"+id);
     var validebar = input.childNodes[5];
        if (element !="") {
          var paragraph = element 
          var regex = reg
          var matcher = paragraph.match(regex)
          if (matcher) {
            input.classList.add('true-validate');
            input.classList.remove('alert-validate');
            validebar.classList.add('has-val');
          }else {
            input.classList.remove('true-validate');
            input.classList.add('alert-validate');
            validebar.classList.remove('has-val');
            }
        }else {
          input.classList.remove('true-validate');
          input.classList.remove('alert-validate');
          validebar.classList.remove('has-val');
        }
    }
    
  /*****************fin validation formulaire *********************/
    
   // Selection de tous les boutons modifier
  document.querySelectorAll(".btnModifier").forEach(function(element){

    element.addEventListener("click", function(evt){

      let id = evt.target.parentElement.dataset.id;
      
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

      x.addEventListener("mouseleave", function(evt){
      
        x.style.display = "none";
      
      })
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

    



