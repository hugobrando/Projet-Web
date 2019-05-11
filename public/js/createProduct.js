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