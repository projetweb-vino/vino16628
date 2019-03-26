window.addEventListener('load', function() {

 	document.querySelectorAll(".btn-remove-user").forEach(function(element){
        // console.log(element);
        element.addEventListener("click", function(evt){
          
            let id = evt.target.dataset.id;
            
            let requete = new Request("index.php?requete=removeUsager", {method: 'POST', body: '{"id": '+id+'}'});
                   
            fetch(requete).then(response => {
	            if (response.status === 200) {
	              const tr = this.parentNode.parentNode;
	              tr.parentNode.removeChild(tr);
	            } else {
	              throw new Error('Erreur');
	            }
	          });
        })

    });


});