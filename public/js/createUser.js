function myAccount(){
	var formulaire = document.getElementById("edit"); 
	var input = document.getElementsByTagName("input"); //on prend tout les input

	var n = input.length;
	for (i=0; i<n; i++)
	{
		if (input[i].value=="boss") // si c'est une case à cocher
		{
			if (input[i].checked) // case cochée donc on affiche la possibilité de modifier son profil et on decoche la casse employee
			{
				document.getElementById("employee").checked=false;

				var xhttp;
				xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() { //on recupere les informations du boss
				    if (this.readyState == 4 && this.status == 200){ // 4: request finished and response is ready
				    	var boss = JSON.parse(this.responseText);

				    	document.getElementById("account").innerHTML =
				    			'<div class="form-group form-check centrer">'
								+'	<label for="id">Identifiant : </label>' 
							 	+'	<input type="text" name="id" class="form-control" value="'+ boss[0].idBoss+'" disabled>'
							 	+'	<input type="hidden" name="id" class="form-control" value="'+ boss[0].idBoss+'">'
								+'</div>'
								+'<div class="form-group form-check centrer">'
								+'	<label for="name">Nom : </label>' 
							 	+'	<input type="text" name="name" class="form-control" value="'+ boss[0].name+'">'
								+'</div>'
							 	+'<div class="form-group form-check centrer">'
								+'	<label for="firstName">Prénom : </label>' 
							 	+'	<input type="text" name="firstName" class="form-control" value="'+ boss[0].firstName+'">'
							 	+'</div>'
							 	+'<div class="form-group form-check centrer">'
								+'	<label for="mail">Mail : </label>' 
							 	+'	<input type="email" name="mail" class="form-control" value="'+ boss[0].mail+'">'
							 	+'</div>'
							 	+'<div class="form-group form-check centrer" id="getPassword">'
								+'	<input type="checkbox" class="form-check-input" id="password" name="password" onclick="changePassword()" autocomplete="off">'
								+'    <label class="form-check-label" for="password"">Changer mon mot de passe</label>'
								+'</div>';
					}
				};
				xhttp.open("GET", "https://stockmanagementpw.herokuapp.com/boss", true);
				xhttp.send();

				
			}
			else // sinon
			{
				document.getElementById("account").innerHTML = "";
			}
		}
	} 
}

function changePassword(){
	var xhttp;
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() { //on recupere les informations du boss
	    if (this.readyState == 4 && this.status == 200){ // 4: request finished and response is ready
	    	var boss = JSON.parse(this.responseText);

	    	document.getElementById("account").innerHTML =
				 	'<input type="hidden" name="id" class="form-control" value="'+ boss[0].idBoss+'">'
					+'<div class="form-group form-check centrer">'
					+'	<label for="password">Nouveau mot de passe : </label>' 
				 	+'	<input type="password" name="password" class="form-control">'
					+'</div>'
				 	+'<div class="form-group form-check centrer">'
					+'	<label for="password_confirmation">Comfirmation mot de passe : </label>' 
				 	+'	<input type="password" name="password_confirmation" class="form-control">'
				 	+'</div>';
		}
	};
	xhttp.open("GET", "https://stockmanagementpw.herokuapp.com/boss", true);
	xhttp.send();

}

function getEmployees(){
	var formulaire = document.getElementById("edit"); 
	var input = document.getElementsByTagName("input"); //on prend tout les input

	var n = input.length;
	for (i=0; i<n; i++)
	{
		if (input[i].value=="employee") // si c'est une case à cocher
		{
			if (input[i].checked) // case cochée donc on affiche la possibilité de modifier son profil et on decoche la casse employee
			{
				document.getElementById("boss").checked=false;

				var xhttp;
			 	xhttp = new XMLHttpRequest();
			  	xhttp.onreadystatechange = function() {
				    if (this.readyState == 4 && this.status == 200){ // 4: request finished and response is ready
				    	var employees = JSON.parse(this.responseText);
			    		var html = '<label for="employee">Employés : </label>'
									+		 '<select name="employee" class="form-control" onclick="showEmployee()" id="selectEmployee">';
						var x;
						for (x in employees) {
						  html += '<option value="'+employees[x].idUser+'">'+employees[x].firstName+" "+employees[x].name+'</option>';
						}
						html +=  '</select>'
								+'</div>'
								+'<div class="form-group" id="employeeContent">';
						document.getElementById("account").innerHTML = html;

					}
			  	};
				xhttp.open("GET", "https://stockmanagementpw.herokuapp.com/employees", true);
			  	xhttp.send();

				
			}
			else // sinon
			{
				document.getElementById("account").innerHTML = "";
			}
		}
	} 
}



function showEmployee(){
	selectEmployee = document.getElementById("edit").elements["selectEmployee"].value; //l'employé choisie
 

	var xhttp;
 	xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() { //on recupere les information de l'employé selectionné
	    if (this.readyState == 4 && this.status == 200){ // 4: request finished and response is ready
	    	var employee = JSON.parse(this.responseText);
    		document.getElementById("employeeContent").innerHTML =
    							'<div class="form-group form-check centrer">'
								+'	<label for="id">Identifiant : </label>' 
							 	+'	<input type="text" name="id" class="form-control" value="'+ employee[0].idUser+'" disabled>'
							 	+'	<input type="hidden" name="id" class="form-control" value="'+ employee[0].idUser+'">'
								+'</div>'
								+'<div class="form-group form-check centrer">'
								+'	<label for="name">Nom : </label>' 
							 	+'	<input type="text" name="name" class="form-control" value="'+ employee[0].name+'">'
								+'</div>'
							 	+'<div class="form-group form-check centrer">'
								+'	<label for="firstName">Prénom : </label>' 
							 	+'	<input type="text" name="firstName" class="form-control" value="'+ employee[0].firstName+'">'
							 	+'</div>'
							 	+'<div class="form-group form-check centrer">'
								+'	<label for="mail">Mail : </label>' 
							 	+'	<input type="email" name="mail" class="form-control" value="'+ employee[0].mail+'">'
							 	+'</div>'
							 	+'<div class="form-group form-check centrer" id="getPassword">'
								+'	<input type="checkbox" class="form-check-input" id="password" name="password" onclick="changePasswordEmployee()" autocomplete="off">'
								+'    <label class="form-check-label" for="password"">Changer son mot de passe</label>'
								+'</div>'
								+'</div>';


		}
  	};
	xhttp.open("GET", "https://stockmanagementpw.herokuapp.com/employee/"+selectEmployee, true);
  	xhttp.send();
}



function changePasswordEmployee(){

	selectEmployee = document.getElementById("edit").elements["selectEmployee"].value; //l'employé choisie

	var xhttp;
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() { //on recupere les informations du boss
	    if (this.readyState == 4 && this.status == 200){ // 4: request finished and response is ready
	    	var employee = JSON.parse(this.responseText);

	    	document.getElementById("employeeContent").innerHTML =
				 	'<input type="hidden" name="id" class="form-control" value="'+ employee[0].idUser+'">'
					+'<div class="form-group form-check centrer">'
					+'	<label for="password">Nouveau mot de passe : </label>' 
				 	+'	<input type="password" name="password" class="form-control">'
					+'</div>'
				 	+'<div class="form-group form-check centrer">'
					+'	<label for="password_confirmation">Comfirmation mot de passe : </label>' 
				 	+'	<input type="password" name="password_confirmation" class="form-control">'
				 	+'</div>';
		}
	};
	xhttp.open("GET", "https://stockmanagementpw.herokuapp.com/employee/"+selectEmployee, true);
	xhttp.send();

}