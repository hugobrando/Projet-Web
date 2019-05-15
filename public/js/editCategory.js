function getCriticalStock(){
	category = document.getElementById("edit").elements["category"].value; //la categorie choisie
 

	var xhttp;
 	xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200){ // 4: request finished and response is ready
	    	var criticalStockCategory = JSON.parse(this.responseText);
    		document.getElementById("wordingCategory").innerHTML =
					'<div class="form-group form-check centrer">'
					+'	<label for="newCategory" class="vert">Libellé : </label>' 
				 	+'	<input type="text" name="newCategory" class="form-control" value="'+category+'">'
					+'</div>'
				 	+'<div class="form-group form-check centrer">'
					+'	<label for="newCriticalStockCategory" class="vert">Stock critique : </label>' 
				 	+'	<input type="number" min="0" name="newCriticalStockCategory" class="form-control" value="'+criticalStockCategory+'">'
				 	+'</div>';
		}
  	};
	xhttp.open("GET", "http://localhost/Projet-Web/public/createProduct/"+category, true); // envoie le stock critique pour cette categorie
  	xhttp.send();
}