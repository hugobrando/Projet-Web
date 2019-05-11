function updateCriticalStock(){
	category = document.getElementById("create").elements["category"].value; //la categorie chosie
 

	var xhttp;
 	xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200){
			document.getElementById("create").elements["criticalStock"].value = this.responseText; 
		}
  	};
	xhttp.open("GET", "http://localhost/Projet-Web/public/createProduct/"+category, true);
  	xhttp.send();



}

function getOrder(){
	var formulaire = document.getElementById("create"); 
	var order = document.getElementsByTagName("input"); //on prend tout les input

	var n = order.length;
	for (i=0; i<n; i++)
	{
		if (order[i].type.toLowerCase()=="checkbox") // si c'est une case à cocher
		{
			if (order[i].checked) // case cochée donc on affiche la possibilité de commander
			{
				document.getElementById("getOrder").innerHTML =
					'<input type="checkbox" checked class="form-check-input" id="order" name="order" onclick="getOrder()">'
					+'<label class="form-check-label" for="order">Annuler la commande</label>'
					+'<div class="form-group form-check centrer">'
					+'	<label for="orderProduct">En commande : </label>' 
				 	+'	<input type="number" name="orderProduct" min="1" class="form-control">'
					+'</div>'
				 	+'<div class="form-group form-check centrer">'
					+'	<label for="nameProvider">Nom du fournisseur : </label>' 
				 	+'	<input type="text" name="nameProvider" class="form-control" placeholder="Nom du fournisseur">'
				 	+'</div>';
			}
			else // sinon
			{
				document.getElementById("getOrder").innerHTML =
					'<input type="checkbox" class="form-check-input" id="order" name="order" onclick="getOrder()">'
					+'<label class="form-check-label" for="order">Commande en cours</label>' ;
			}
		}
	} 
}