function getReason(){
	document.getElementById("order").innerHTML =
						'<div class="row justify-content-around">'
                        +  '<div class="col-2 ">'
                        +    '<input type="text" name="reasonIgnore" class="form-control tailleInputReason" placeholder="Raison de la désactivation">'
                        +  '</div>'
                        +  '<div class="col-5">'
                        +    '<button type="button" class="btn btn-primary" name="ignoreProduct" onclick="document.forms.order.submit()">Ignorer</button>'
                        +  '</div>'
                        +'</div>';	
	document.getElementById("button").innerHTML = '<button type="button" class="btn btn-danger" name="ignoreProduct" onclick="getOrder()">X</button>';
}

function getOrder(){
	document.getElementById("order").innerHTML =
					'<div class="row justify-content-around">'	
						+'<div class="col-2 ">'
                        +    '<input type="number" name="order" min="1" class="form-control tailleInputOrder">'
                        +  '</div>'
                        +  '<div class="col-2 ">'
                        +    '<input type="text" name="nameProvider" class="form-control tailleInputNameProvider" placeholder="Nom du fournisseur">'
                        +  '</div>'
                        +  '<div class="col-5">'
                        +    '<button type="submit" class="btn btn-primary" name="orderProduct">Comfirmer la commande</button>'
                        +'</div>'
                    +'</div>';
	document.getElementById("button").innerHTML = '<button type="button" class="btn btn-danger" name="ignoreProduct" onclick="getReason()">X</button>';
}