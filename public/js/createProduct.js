function updateCriticalStock(){
	category = document.getElementById("create").elements["category"].value; //la categorie choisie
 

	var xhttp;
 	xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200){ // 4: request finished and response is ready
			document.getElementById("create").elements["criticalStock"].value = this.responseText; 
		}
  	};
	xhttp.open("GET", "https://stockmanagementpw.herokuapp.com/createProduct/"+category, true);
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

function updateProduct(){
	category = document.getElementById("modify").elements["category"].value; //la categorie choisie
 

	var xhttp;
 	xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200){ // 4: request finished and response is ready
	    	var products = JSON.parse(this.responseText);
    		var html = '<label for="product">Produit : </label>'
						+		 '<select name="product" class="form-control" onclick="showProduct()" id="product">';
			var x;
			for (x in products) {
			  html += '<option value="'+products[x].wordingProduct+'">'+products[x].wordingProduct+'</option>';
			}
			html +=  '</select>'
					+'</div>'
					+'<div class="form-group" id="productContent">';
			document.getElementById("wordingProduct").innerHTML = html;

		}
  	};
	xhttp.open("GET", "https://stockmanagementpw.herokuapp.com/modifyProduct/category/"+category, true);
  	xhttp.send();

							
}

function showProduct(){
	product = document.getElementById("modify").elements["product"].value; //la categorie choisie
 

	var xhttp;
 	xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() { //on recupere les information du produit
	    if (this.readyState == 4 && this.status == 200){ // 4: request finished and response is ready
	    	var result = JSON.parse(this.responseText);
    		var html = 	'<label for="newWordingProduct" class="vert">Libellé : </label>'
						+		'<input type="text" name="newWordingProduct" class="form-control" value="'+result[0].wordingProduct+'">'
    					+		'<input name="oldWordingProduct" type="hidden" value="'+result[0].wordingProduct+'">'
    					+'</div>'
    					+'<label for="newStockProduct" class="vert">En stock : </label>'
						+		'<input type="number" name="newStockProduct" class="form-control" value="'+result[0].stockProduct+'">'
    					+		'<input name="oldStockProduct" type="hidden" value="'+result[0].stockProduct+'">'
						+	'</div>'
						+	'<div class="form-group">'
						+		'<label for="newCriticalStockProcuct" class="vert">Stock Critique : </label>'
						+		'<input type="number" name="newCriticalStockProduct" class="form-control" min="0" value="'+result[0].criticalStockProduct+'">'
    					+		'<input name="oldCriticalStockProduct" type="hidden" value="'+result[0].criticalStockProduct+'">'
						+	'</div>'
						+	'<div class="form-group">'
						+		'<label for="newCategory" class="vert">Categorie : </label>'
						+		'<select name="newCategory" class="form-control">'
						+			'<option value="'+result[0].wordingCategory+'">'+result[0].wordingCategory+'</option>';




						var xhttp2;
					 	xhttp2 = new XMLHttpRequest();
					  	xhttp2.onreadystatechange = function() { //on recupere toutes les categories possible
						    if (this.readyState == 4 && this.status == 200){ // 4: request finished and response is ready
						    	var categories = JSON.parse(this.responseText);
								for (x in categories) {
								  html += '<option value="'+categories[x].wordingCategory+'">'+categories[x].wordingCategory+'</option>';
								}
								html +=  '</select>';
							}
							document.getElementById("productContent").innerHTML = html;
					  	};
						xhttp2.open("GET", "https://stockmanagementpw.herokuapp.com/category", true);
					  	xhttp2.send();
			

		}
  	};
	xhttp.open("GET", "https://stockmanagementpw.herokuapp.com/modifyProduct/product/"+product, true);
  	xhttp.send();
}